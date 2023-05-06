<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Slider;
use App\Models\Advertise;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\Newsletter;
use App\Models\Partner;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Traits\EmailVerification;

class HomeFrontController extends Controller
{
    use EmailVerification;

    public function index()
    {
        return redirect()->route('myHome');
        $sliders = Slider::query()->where('status', 1)->get();
        $partners = Partner::query()->where('status', 1)->get();
        $advertise = Advertise::query()->where('status', 1)->inRandomOrder()->take(1)->first();
        $companies = Company::query()->count() < 458 ? 458 : Company::query()->count();
        $job_seekers = JobSeeker::query()->count() > 1090 ? JobSeeker::query()->count() : 1090;
        $posts_count = Job::query()->payment()->count();
        $posts = Job::query()->active()->payment()->take(9)->orderByDesc('is_super_post')->orderByDesc('created_at')->get();

        $setting = Setting::query()->first();
        return view('frontend.home',
            compact('sliders', 'posts',
                'companies', 'job_seekers', 'posts_count', 'partners', 'advertise', 'setting'));
    }

    public function home()
    {
        $sliders = Slider::query()->where('status', 1)->get();
        $partners = Partner::query()->where('status', 1)->get();
        $advertise = Advertise::query()->where('status', 1)->inRandomOrder()->take(1)->first();
        $companies = Company::query()->count() < 458 ? 458 : Company::query()->count();
        $job_seekers = JobSeeker::query()->count() > 1090 ? JobSeeker::query()->count() : 1090;
        $posts_count = Job::query()->payment()->count();
        $posts = Job::query()->active()->payment()->take(9)->orderByDesc('is_super_post')->orderByDesc('created_at')->get();

        $setting = Setting::query()->first();
        return view('frontend.home',
            compact('sliders', 'posts',
                'companies', 'job_seekers', 'posts_count', 'partners', 'advertise', 'setting'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters'
        ], [
            'email.required' => 'Please Enter a valid Email',
            'email.unique' => 'You have already subscribed',
            'email.email' => 'You have already subscribed',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages(),
            ]);
        }

        $letter = Newsletter::query()->firstOrCreate([
            'email' => $request->email,
        ]);
        \Newsletter::subscribe($request->email);

        $this->SendVerification([
            'entity_id' => $letter->id,
            'entity_type' => "App\Models\Newsletter",
            'expire_on' => Carbon::now()->addHour(),
            'verification_subject' => "Newsletter Subscription",
            'email' => $request->email,
            'intro_subject' => "You are receiving this email because we received newsletter subscription from this email.
            Please verify email with clicking button below",

        ]);


        return response()->json([
            'subscribed' => 'Thanks for subscribing to our newsletter!. Please check your mailbox for verification',
        ]);
        return back()->with('subscribed', 'Thanks for subscribing to our newsletter!. Please check your mailbox for verification');
    }

    public function logout(Request $request)
    {
        if (auth()->guard('job_seekers')->check()) {
            auth()->guard('job_seekers')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        } else {
            auth()->guard('companies')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        return redirect()->route('myHome');
    }

    public function setCookies(Request $request)
    {

        if ($request->has('accept')) {
            $response = new Response('Set Cookie');
            $response->cookie(cookie('nishan-cookie', 'MyValue', 129500));
            return $response;
        }

        return false;
    }

    public function privacyPolicy()
    {
        $page = Setting::query()->first();
        return view('frontend.privacy', compact('page'));
    }

    public function termsAndConditions()
    {
        $page = Setting::query()->first();
        return view('frontend.terms', compact('page'));
    }

    public function showForgetPasswordForm()
    {
        return view('auth.frontforgetPassword');
    }


    public function submitForgetPasswordForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ], [
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field should be email type.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages(),
            ]);
        }

        if (JobSeeker::query()->where('email', $request->email)->doesntExist() &&
            Company::query()->where('email', $request->email)->doesntExist()) {
            return response()->json([
                'error' => [
                    'email' => 'This email does not exist!'
                ]
            ]);
        }

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.frontforgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->route('myHome')->with('success', 'We have sent you password reset link! please check your Email');
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.frontforgetPasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ], [
            'email.required' => 'Email field is required',
            'password.required' => 'Password field is required',
            'password.min' => 'Password field Must be at least 8 characters',
            'password.confirmed' => 'Password Confirmation Must match Password',
            'password_confirmation.required' => 'Password Confirmation field is required',
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }
        if ($user = JobSeeker::query()->where('email', $request->email)->exists()) {
            JobSeeker::query()->where('email', $request->email)->update(['password' => bcrypt($request->password)]);
        } elseif ($user = Company::query()->where('email', $request->email)->exists()) {
            Company::query()->where('email', $request->email)->update(['password' => bcrypt($request->password)]);
        }

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect(route('myHome'))->with('success', 'Your password has been successfully updated!');
    }

}
