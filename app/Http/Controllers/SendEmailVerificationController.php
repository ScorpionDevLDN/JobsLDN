<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\emailVertification;
use App\Mail\VerificationURL;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SendEmailVerificationController extends Controller
{

    // TODO: Send verification will be from Model where we simply call the function or either in controller we let this work happen

    public function Verify($hash)
    {
        $string = $this->encrypt_decrypt('decrypt', $hash);
        $data = Str::of($string)->explode('__')->toArray();
        if (isset($data[0]) && isset($data[1])) {
            $emailVertification = emailVertification::where('entity_type', $data[0])->where('entity_id', $data[1])->orderby('id', 'DESC')->first();
            if ($emailVertification && Carbon::now()->lte(Carbon::create($emailVertification->expire_on))) {
                $verifyModel = new $data[0]();
                $verifyModel = $verifyModel->find($data[1]);
                $emailVertification->approve();
                $verifyModel->approve();
                return redirect()->route('myHome')->with('success', 'Your Email has been verified');
            }
        }
        return redirect()->route('myHome')->with('error', 'Verification link expired');
    }

    public function resendCompanyVerfication()
    {
        $check = $this->SendVerification([
            'entity_id' => auth('companies')->user()->id,
            'entity_type' => "App\Models\Company",
            'expire_on' => Carbon::now()->addHour(),
            'verification_subject' => "Email Verification",
            'email' => auth('companies')->user()->email,
            'intro_subject' => "Please verify email with clicking the button below",

        ]);
        return redirect()->route('myHome')->with('success', 'We have sent you email verification link! please check your Email');

    }


    public function resendSeekerVerfication()
    {

        $check = $this->SendVerification([
            'entity_id' => auth('job_seekers')->user()->id,
            'entity_type' => "App\Models\JobSeeker",
            'expire_on' => Carbon::now()->addHour(),
            'verification_subject' => "Email Verification",
            'email' => auth('job_seekers')->user()->email,
            'intro_subject' => "Please verify email with clicking the button below",

        ]);
        return redirect()->route('myHome')->with('success', 'We have sent you email verification link! please check your Email');
    }
}
