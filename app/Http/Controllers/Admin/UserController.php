<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Company;
use App\Models\JobSeeker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function getCompanies()
    {
        $companies = Company::query()->get();
        return view('dashboard.admin.users.companies', compact('companies'));
    }

    public function getJobSeekers()
    {
        $job_seekers = JobSeeker::query()->get();
        return view('dashboard.admin.users.jobSeekers', compact('job_seekers'));
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
        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.admins.index')->with('msg', 'User created successfully');
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
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $admin->assignRole($request->input('roles'));

        return redirect()->route('admin.admins.index')->with('msg', 'Admin Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();
        return redirect()->route('admin.admins.index')->with('msg', 'Admin Deleted successfully');
    }
}
