<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobSeeker;

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
}
