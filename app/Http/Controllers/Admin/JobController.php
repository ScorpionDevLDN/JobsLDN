<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AcceptJob;
use App\Mail\ApplyToJob;
use App\Mail\DeclineJob;
use App\Models\Category;
use App\Models\City;
use App\Models\Currency;
use App\Models\Job;
use App\Models\Notification;
use App\Models\Per;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $cities = City::all();
        $types = Type::all();
        $categories = Category::all();
        $currencies = Currency::all();
        $pers = Per::all();
        $jobs = Job::query()->payment()->orderBy('status')->orderByDesc('updated_at')->get();
        return view('dashboard.admin.jobs.index', compact('jobs', 'cities', 'types', 'categories', 'currencies', 'pers'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();

//        if($request->pdf_details){
//            $filename= $request->pdf_details->store('public');
//            $imagename= $request->pdf_details->hashName();
//            $requestData['pdf_details'] = $imagename;
//        }
        Job::query()->findOrFail($id)->update($requestData);

        return redirect()->route('admin.get-jobs.index')->with('success', 'Job updated successfully');
    }

    public function accept($id)
    {
        $job = Job::query()->where('id', $id)->first();
        $job->update([
            'status' => 1
        ]);

        Notification::query()->create([
            'company_id' => $job->company_id,
            'job_id' => $id,
            'type' => 3
        ]);
        Mail::to($job->job_post_email)->send(new AcceptJob('Job Accepted', $job));
        return redirect()->route('admin.get-jobs.index')->with('success', 'Job accepted successfully');
    }

    public function reject($id)
    {
        $job = Job::query()->where('id', $id)->first();

        $job->update([
            'status' => 2
        ]);

        Notification::query()->create([
            'company_id' => $job->company_id,
            'job_id' => $id,
            'type' => 4
        ]);
        Mail::to($job->job_post_email)->send(new DeclineJob('Job Declined', $job));
        return redirect()->route('admin.get-jobs.index')->with('success', 'Job rejected successfully');
    }

    public function changePostStatusTest(Request $request)
    {
        $ca = Job::find($request->id);
        $ca->shown = $request->shown;
        dd($request->shown);
        $ca->save();
        return response()->json(['success' => 'Status change successfully.']);
    }
}
