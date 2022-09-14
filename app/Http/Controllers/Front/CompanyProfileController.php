<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        if (auth()->guard('job_seekers')->check()) {
            $user = auth('job_seekers')->user();
            return view('frontend.jobsldn.job_seeker.profile', compact('user'));
        } else {
            $user = auth('companies')->user();
            return view('frontend.jobsldn.company.profile', compact('user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if (auth()->guard('job_seekers')->check()) {
            JobSeeker::query()->where('id', auth('job_seekers')->id())->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'confirm_email' => $request->confirm_email,
                'overview' => $request->overview,
                'photo' => $request->photo,
            ]);

            session()->flash('msgProfile', 'Profile Updated Successfully');
            return redirect()->route('my-profile.index');
        } else {
            Company::query()->where('id', auth('companies')->id())->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'confirm_email' => $request->confirm_email,
            ]);
            session()->flash('msgProfile', 'Profile Updated Successfully');
            return redirect()->route('my-profile.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if (auth('job_seekers')->check()) {
            JobSeeker::query()->where('id', auth('job_seekers')->id())->update([
                'is_deleted' => 1
            ]);
            auth('job_seekers')->logout();
        } elseif (auth('companies')->check()) {
            $company_id = auth('companies')->id();
            Company::query()->where('id', $company_id)->update([
                'is_deleted' => 1
            ]);
            Job::query()->where('company_id', $company_id)->toBase()->update([
                'is_deleted' => 1,
                'shown' => 0,
            ]);
            auth('companies')->logout();
            return redirect()->route('home.index');
        }
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        if (auth()->guard('job_seekers')->check()) {
            $validatedData = $request->validate([
                'currPassword' => function ($attribute, $value, $fail) {
                    $user = auth()->guard('job_seekers')->user();
                    if (!Hash::check($value, $user->password)) {
                        $fail('Your current password doesnt match our records');
                    }
                },
                'password' => 'required|min:6|confirmed',
            ]);
            JobSeeker::query()->where('id', auth('job_seekers')->id())->update([
                'password' => Hash::make($request->password),
            ]);
            session()->flash('msg', 'Password Updated Successfully');
            return redirect()->route('my-profile.index');
        } else {
            $validatedData = $request->validate([
                'currPassword' => function ($attribute, $value, $fail) {
                    $user = auth()->guard('companies')->user();
                    if (!Hash::check($value, $user->password)) {
                        $fail('Your current password doesnt match our records');
                    }
                },
                'password' => 'required|min:6|confirmed',
            ]);
            Company::query()->where('id', auth('companies')->id())->update([
                'password' => Hash::make($request->password),
            ]);
            session()->flash('msg', 'Password Updated Successfully');
            return redirect()->route('my-profile.index');
        }
    }

    public function updateCompanyFront(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'industry' => 'required',
            'website_url' => 'required',
            'overview' => 'required',
        ]);
        Company::query()->where('id', auth('companies')->id())->update([
            'photo' => $request->photo,
            'company_name' => $request->company_name,
            'employee_count' => $request->employee_count,
            'industry' => $request->industry,
            'website_url' => $request->website_url,
            'overview' => $request->overview,
        ]);
        session()->flash('msgCompany', 'Profile Updated Successfully');
        return redirect()->route('my-profile.index');
    }
}
