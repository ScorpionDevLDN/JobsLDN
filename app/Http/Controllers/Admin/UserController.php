<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Company;
use App\Models\JobSeeker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function getCompanies()
    {
        $companies = Company::query()->get();
        return view('dashboard.admin.users.companies', compact('companies'));
    }

    public function editCompany($id){
        Company::query()->where('id',$id)->update(\request()->all());
        return redirect()->route('admin.get_companies');
    }

    public function deleteCompany($id){
        Company::query()->where('id',$id)->delete();
        return redirect()->route('admin.get_companies');
    }

    public function getJobSeekers(Request $request)
    {
//        $listId = 'a7c2d8d8e4';
//
//        $mailchimp = new \Mailchimp('d713eb5c6555e5ae6e46f1a3174c3d35-us8');
//
//        $campaign = $mailchimp->campaigns->create('regular', [
//            'list_id' => $listId,
//            'subject' => 'Example Mail',
//            'from_email' => 'rajeshgajjar1997@gmail.com',
//            'from_name' => 'Rajesh',
//            'to_name' => 'Rajesh Subscribers'
//
//        ], [
//            'html' => $request->input('content'),
//            'text' => strip_tags($request->input('content'))
//        ]);
//
//        //Send campaign
//        $mailchimp->campaigns->send($campaign['id']);

//        dd('Campaign send successfully.');
        $job_seekers = JobSeeker::query()->get();
        return view('dashboard.admin.users.jobSeekers', compact('job_seekers'));
    }

    public function editJobSeeker($id){
        JobSeeker::query()->where('id',$id)->update(\request()->all());
        return redirect()->route('admin.get_job_seekers');
    }

    public function deleteJobSeeker($id){
        JobSeeker::query()->where('id',$id)->delete();
        return redirect()->route('admin.get_job_seekers');
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

    public function editProfile(){
        $user = auth('admins')->user();
        return view('dashboard.admin.users.profile')->withUser($user);
    }

    public function updateProfile(Request $request)
    {
        $user = auth('admins')->user();
        $filename="";
        $requestData= $request->all();

        if($request->image){
            $filename= $request->image->store('public');
            $imagename= $request->image->hashName();
            $requestData['image'] = $imagename;
        }
        $user->fill($requestData);
        $user->save();
        $customerDB= Admin::find($request->id);
        if($customerDB){
            $customerDB->update($requestData);
        }
        session()->flash('msg','Profile Updated Successfully');
        return redirect(route("admin.profile.edit"));
    }

    public function forgetPassword(){
        return view('dashboard.admin.forget_password');
    }
    
    public function updatePassword(Request $request){
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        Auth::guard('admins')->user()->update([
           'password' =>  $request->new_password
        ]);
        session()->flash('msg','Password Updated Successfully');

        return redirect(route("admin.profile.edit"));
    }
}
