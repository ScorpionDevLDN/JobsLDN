<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class JobSeekerProfileController extends Controller
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
        } else {
            $user = auth('companies')->user();
        }
        return view('Front.profile-company', compact('user'));
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
        $user = JobSeeker::query()->findOrFail($id);
        $validator = Validator::make($request->all(), [
            'job_seeker_first_name' => 'required',
            'job_seeker_last_name' => 'required',
            'jobseeker_email' => ['required','email'],
            'confirm_email' => ['nullable','email'],
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

        if ($validator->fails()) {
            return back()->with('error',$validator->messages()->first());
        }

        if (
            (JobSeeker::query()
            ->where('email',$request->jobseeker_email)
            ->orWhere('confirm_email',$request->jobseeker_email)
            ->exists() ||
            Company::query()
                ->where('email',$request->jobseeker_email)
                ->orWhere('confirm_email',$request->jobseeker_email)
                ->exists())
            && $user->email != $request->jobseeker_email
        ){
            return back()->with('error','This email already exists');
        }

        if ($request->photo) {
            $filename = $request->photo->store('public');
            $imagename = $request->photo->hashName();
            $requestData['photo'] = $imagename;
        }
        $user->update([
            'first_name' => $request->job_seeker_first_name,
            'last_name' => $request->job_seeker_last_name,
            'email' => $request->jobseeker_email,
            'confirm_email' => $request->confirm_email,
            'overview' => $request->overview,
            'photo' => @$requestData['photo'],
        ]);

        return redirect()->route('my-profile.index')->with('success', 'Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
