<?php

namespace App\Http\Controllers;

use App\Jobs\EndSuperPost;
use App\Mail\MailMailableSend;
use App\Mail\newApplied;
use App\Models\Admin\PaymentSetting;
use App\Models\Admin\Transaction;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\JobSeekerBookmark;
use App\Models\JobSeekerCv;
use App\Models\JobSeekerJob;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mockery\Matcher\Not;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaymentController extends Controller
{
    public function payment()
    {
        $price = $this->getPostPrice();
        $data['items'] = [
            [
                'name' => 'Apple',
                'price' => $price,
                'desc' => 'Macbook pro 14 inch',
                'qty' => 1
            ]
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success', 20);
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $price;

        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);
        $response = $provider->setExpressCheckout($data, true);

        return redirect($response['paypal_link']);
    }

    public function success(Request $request, $job_id)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $job = Job::query()->where('id', $job_id)->first();

            $job->update([
                'success_payment' => 1
            ]);
            $this->createTransaction($job_id, $this->getPostPrice());
            dispatch(new EndSuperPost($job_id))->delay(now()->addDays($this->getPostDaysCount()));
            return redirect()->route('company-jobs.index')->with('success', 'Your job has been created successfully! Our Admins will review it before posting');
            dd('Your payment was successfully.', session()->get('job_data' . $session_job_id));
        }

        return back();
    }

    public function cancel($job_id)
    {
        Job::query()->where('id', $job_id)->delete();
        return redirect(route('company-jobs.index'));
    }

    public function goPayment()
    {
        Job::query()->delete();
        JobSeekerBookmark::query()->delete();
        Notification::query()->delete();
        Notification::query()->delete();
        JobSeekerCv::query()->delete();
        JobSeekerJob::query()->delete();
        Transaction::query()->delete();
        dd('tst');
        dd($job,$job->salary,(float)$job->salary);
        /*dd(config('filesystems.default'));
        $job = Job::query()->first();
        Mail::to($job->email)->send(new newApplied('New job Seeker has applied to' . $job->title, $job, auth('job_seekers')->user()));
        dd(config('paypal.mode'));
        Mail::to('ayakhomar@gmail.com')->send(new MailMailableSend('test', 'Hi Aya This test'));
        /*$job = Job::query()->where('id', 1)->first();
        dd($job->payment()->exists());*/
        //dd(config('mail.mailers.smtp.username'));
        //dd(session()->forget('job_data'.session()->get('session_job_id')));*/
        $job_seeker = JobSeeker::first();
        $job = Job::first();
        return view('email.DeleteAccount',compact('job_seeker','job'));
    }

    private function createTransaction($job_id, $price)
    {
        return Transaction::query()->create([
            'company_id' => auth('companies')->id(),
            'job_id' => $job_id,
            'amount' => $price,
            'symbol' => config('paypal.currency')
        ]);
    }

    private function getPostPrice()
    {
        return PaymentSetting::query()->first()->price;
    }

    private function getPostDaysCount()
    {
        return PaymentSetting::query()->first()->days_count;
    }

}
