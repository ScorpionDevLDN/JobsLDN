<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\DeleteAccount;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\JobSeekerBookmark;
use App\Models\JobSeekerJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function getCompanies()
    {
        $companies = Company::query()->get();
        return view('dashboard.admin.users.companies', compact('companies'));
    }

    public function editCompany($id)
    {
        Company::query()->where('id', $id)->update(\request()->all());
        return redirect()->route('admin.get_companies')->with('success', 'Company updated successfully');
    }

    public function DeleteCompany($id)
    {
        $company = Company::query()->where('id', $id)->first();
        Job::query()->where('company_id', $id)->delete();
        JobSeekerJob::query()->whereIn('job_id', $company->jobs->pluck('id'))->delete();
        JobSeekerBookmark::query()->whereIn('job_id', $company->jobs->pluck('id'))->delete();
        $company->delete();
        return back()->with('success', 'Company deleted successfully');
    }

    public function getJobSeekers(Request $request)
    {
        $job_seekers = JobSeeker::query()->get();
        return view('dashboard.admin.users.jobSeekers', compact('job_seekers'));
    }

    public function editJobSeeker($id)
    {
        JobSeeker::query()->where('id', $id)->update(\request()->all());
        return redirect()->route('admin.get_job_seekers')->with('success', 'JobSeeker updated successfully');
    }

    public function deleteJobSeeker($id)
    {
        JobSeeker::query()->where('id', $id)->delete();
        return redirect()->route('admin.get_job_seekers')->with('success', 'JobSeeker deleted successfully');
    }

    public function index()
    {
        $roles = Role::all();
        $admins = Admin::query()->get();
        return view('dashboard.admin.users.admins', compact('admins', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $roles = Role::pluck('id', 'name')->all();
        return view('users.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
            'roles' => 'required'
        ]);


        $user = Admin::query()->create($validatedData);
        $user->syncRoles($request->input('roles'));

        return redirect()->route('admin.admins.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
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
        $input = $request->all();

        $admin = Admin::find($id);
        $admin->update($input);
        if (!$admin->is_super_admin) {
            $admin->syncRoles($request->input('role'));
        }

        return redirect()->route('admin.admins.index')->with('success', 'Admin Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if ($id == 1) {
            return back()->with('msg', 'Super Admin Cant be deleted!');
        }
        Admin::find($id)->delete();
        return redirect()->route('admin.admins.index')->with('success', 'Admin Deleted successfully');
    }

    public function editProfile()
    {
        $user = auth('admins')->user();
        return view('dashboard.admin.users.profile')->withUser($user);
    }

    public function updateProfile(Request $request)
    {
        $user = auth('admins')->user();
        $filename = "";
        $requestData = $request->all();

        if ($request->image) {
            $filename = $request->image->store('public');
            $imagename = $request->image->hashName();
            $requestData['image'] = $imagename;
        }
        $user->fill($requestData);
        $user->save();
        $customerDB = Admin::find($request->id);
        if ($customerDB) {
            $customerDB->update($requestData);
        }
//        session()->flash('msg', 'Profile Updated Successfully');
        return redirect(route("admin.profile.edit"))->with('success', 'Profile Updated Successfully');
    }

    public function forgetPassword()
    {
        return view('dashboard.admin.forget_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        Auth::guard('admins')->user()->update([
            'password' => $request->new_password
        ]);
//        session()->flash('msg', 'Password Updated Successfully');

        return redirect(route("admin.profile.edit"))->with('success', 'Password Updated Successfully');
    }

    public function DeleteJobSeekers($job_seeker)
    {
        JobSeeker::query()->findOrFail($job_seeker)->delete();
        return back()->with('success', 'JobSeeker Deleted Successfully');
    }
}
