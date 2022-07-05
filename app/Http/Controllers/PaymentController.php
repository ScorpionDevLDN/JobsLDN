<?php

namespace App\Http\Controllers;

use App\Models\Admin\PaymentSetting;
use App\Models\Job;
use App\Models\Payment;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
//        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
//        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $paymentVar = PaymentSetting::query()->first();
        $this->gateway->setClientId($paymentVar->client_id);
        $this->gateway->setSecret($paymentVar->secret_id);
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request, $id)
    {
        try {
            Job::query()->where('id', $id)->update(\request()->only(
                'title',
                'summery',
                'pdf_details',
                'city_id',
                'type_id',
                'category_id',
                'currency_id',
                'per_id',
                'salary',
                'expired_at',
                'job_post_email',));

            if ($request->is_super_post == 1) {
                $response = $this->gateway->purchase(array(
                    'amount' => $request->amount,
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('success'),
                    'cancelUrl' => url('error')
                ))->send();

                if ($response->isRedirect()) {
                    $response->redirect();
                } else {
                    return $response->getMessage();
                }
            }
            return redirect()->back()->with('msgBookmarked', 'Job updated successfully!');

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];

                $payment->save();

                return redirect()->back()->with('msgBookmarked', 'Job updated successfully!');

//                return "Payment is Successfull. Your Transaction Id is : " . $arr['id'];

            } else {
                return $response->getMessage();
            }
        } else {
            return 'Payment declined!!';
        }
    }

    public function error()
    {
        return 'User declined the payment!';
    }

}
