<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\DeleteAccount;
use App\Mail\MailMailableSend;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\JobSeekerBookmark;
use App\Models\JobSeekerJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CompanyProfileController extends Controller
{
    public function index()
    {
        if (auth()->guard('job_seekers')->check()) {
            $user = auth('job_seekers')->user();
            return view('frontend.job_seeker.profile', compact('user'));
        } elseif (auth()->guard('companies')->check()) {
            $user = auth('companies')->user();
            return view('frontend.company.profile', compact('user'));
        }
        return redirect('home');
    }


    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'job_seeker_first_name' => 'required',
            'job_seeker_last_name' => 'required',
            'jobseeker_email' => 'required|email',
            'confirm_email' => 'email|unique:job_seekers|unique:companies',
            'overview' => 'required',
        ], [
            'job_seeker_first_name.required' => 'First name is required',
            'job_seeker_last_name.required' => 'Last name is required',
            'jobseeker_email.required' => 'Email field is required',
            'jobseeker_email.email' => 'Email field should be email type',
            'jobseeker_email.unique' => 'This email already exists',
            'confirm_email.email' => 'Confirm Email field should be email type',
            'confirm_email.unique' => 'This email already exists',
            'overview.required' => 'Overview field is required',
        ]);
        if ($request->photo) {
            $filename = $request->photo->store('public');
            $imagename = $request->photo->hashName();
            $requestData['photo'] = $imagename;
        }
        JobSeeker::query()->where('id', $id)->update([
            'f_name' => $request->job_seeker_first_name,
            'l_name' => $request->job_seeker_last_name,
            'email' => $request->jobseeker_email,
            'confirm_email' => $request->confirm_email,
            'overview' => $request->overview,
            'photo' => @$requestData['photo'],
        ]);

        return redirect()->route('my-profile.index')->with('success', 'Profile Updated Successfully');
    }

    public function destroy($id)
    {
        if (auth('job_seekers')->check()) {
            Mail::to(auth('job_seekers')->user()->email)->send(new DeleteAccount());
            JobSeekerJob::query()->where('job_seeker_id', auth('job_seekers')->id())->delete();
            JobSeekerBookmark::query()->where('job_seeker_id', auth('job_seekers')->id())->delete();
            JobSeeker::query()->where('id', auth('job_seekers')->id())->delete();
            auth('job_seekers')->logout();
        } elseif (auth('companies')->check()) {
            $company_id = auth('companies')->id();
            JobSeekerJob::query()->whereIn('job_id', auth('companies')->user()->jobs->pluck('id'))->delete();
            JobSeekerBookmark::query()->whereIn('job_id', auth('companies')->user()->jobs->pluck('id'))->delete();
            Mail::to(auth('companies')->user()->email)->send(new DeleteAccount());
            Company::query()->where('id', $company_id)->delete();
            Job::query()->where('company_id', $company_id)->toBase()->delete();
            auth('companies')->logout();
            return redirect()->route('home.index')->with('success', 'Profile Deleted Successfully');
        }
        return redirect()->back()->with('success', 'Profile Deleted Successfully');;
    }

    public function updatePassword(Request $request)
    {
        if (auth()->guard('job_seekers')->check()) {
            $validatedData = $request->validate([
                'currPassword' => function ($attribute, $value, $fail) {
                    $user = auth()->guard('job_seekers')->user();
                    if (!Hash::check($value, $user->password)) {
                        return redirect()->route('my-profile.index')->with('msg', 'Your current password doesnt match our records');
                    }
                },
                'password' => 'required|min:8|confirmed',
            ], [
                'password.required' => 'Password is required',
                'password.min' => 'Password must be at least 8 characters',
                'password.confirmed' => "New password didn't match",
            ]);
            JobSeeker::query()->where('id', auth('job_seekers')->id())->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('my-profile.index')->with('success', 'Your password has been successfully updated!');
        } else {

            $validatedData = $request->validate([
                'currPassword' => function ($attribute, $value, $fail) {
                    $user = auth()->guard('companies')->user();
                    if (!Hash::check($value, $user->password)) {
                        return redirect()->route('my-profile.index')->with('msg', 'Your current password doesnt match our records');
                    }
                },
                'password' => 'required|min:8|confirmed',
            ], [
                'password.required' => 'Password is required',
                'password.min' => 'Password must be at least 8 characters',
                'password.confirmed' => "New password didn't match",
            ]);
            Company::query()->where('id', auth('companies')->id())->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('my-profile.index')->with('success', 'Your password has been successfully updated!');
        }
    }

    public function updateCompanyFront(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'company_name' => 'required',
            'industry' => 'required',
            'website_url' => 'required',
            'employee_count' => 'required|gt:0',
            'overview' => 'required',
        ],[
            'company_name.required' => 'Company filed is required',
            'industry.required' => 'Industry filed is required',
            'website_url.required' => 'Website filed is required',
            'employee_count.required' => 'Number of Employees filed is required',
            'employee_count.gt' => 'Number of Employees should be integer',
            'overview.required' => 'Overview filed is required',
        ]);

        if ($validator->fails()){
            return back()->with('fail',$validator->messages()->first());
        }

        if ($request->photo) {
            $filename = $request->photo->store('public');
            $imagename = $request->photo->hashName();
            $requestData['photo'] = $imagename;
        }
        Company::query()->where('id', auth('companies')->id())->update([
            'photo' => @$requestData['photo'],
            'company_name' => $request->company_name,
            'industry' => $request->industry,
            'website_url' => $request->website_url,
            'employee_count' => $request->employee_count,
            'overview' => $request->overview,
        ]);
        return redirect()->route('my-profile.index')->with('success', 'Profile Updated Successfully');
    }
}
