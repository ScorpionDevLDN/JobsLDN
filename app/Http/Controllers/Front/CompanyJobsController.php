<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ApplyToJob;
use App\Mail\MailMailableSend;
use App\Mail\newApplied;
use App\Mail\Retracted;
use App\Mail\RetractFromJob;
use App\Models\Category;
use App\Models\City;
use App\Models\Job;
use App\Models\JobSeekerBookmark;
use App\Models\JobSeekerCv;
use App\Models\JobSeekerJob;
use App\Models\Setting;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompanyJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Job::query()->active()->FilterStatus()->paginate(5);
        $min_salary = Job::query()->min('salary');
        $max_salary = Job::query()->max('salary');
//        return view('Front.Jobs', compact('posts', 'categories', 'cities', 'types', 'min_salary', 'max_salary', 'posts_company'));
        return view('frontend.jobsldn.jobs', compact('posts', 'min_salary', 'max_salary'));
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function jobDetails($id)
    {
        $post = Job::query()->where('id', $id)->first();
        $created_at = Job::query()->where('id', $id)->whereDate('expired_at', '>', now())->exists();
        $dont_applied = auth('job_seekers')->check() ? JobSeekerJob::query()->where('job_seeker_id', auth('job_seekers')->id())->doesntExist() : null;
        $bookmarked = JobSeekerBookmark::query()->where('job_id', $id)->where('job_seeker_id', auth('job_seekers')->id())->doesntExist();
        $similar = Job::query()->active()->inRandomOrder()->take(4)->get();
        $cvs = auth('job_seekers')->check() ? auth('job_seekers')->user()->cvs : null;
        $shareComponent = \Share::page(
            \request()->url(),
            $post->title,
        )
            ->whatsapp();
        $post->update([
            'views_count' => $post->views_count + 1
        ]);
        return view('frontend.jobsldn.job', compact('post', 'dont_applied', 'bookmarked', 'created_at', 'similar', 'cvs', 'shareComponent'));
    }

    public function job_details_company($id)
    {
        $post = Job::query()->where('id', $id)->first();
        $created_at = Job::query()->where('id', $id)->whereDate('created_at', '<', now())->exists();
        return view('Front.Company-Single-job', compact('post', 'created_at'));
    }

    public function apply(Request $request, $id)
    {
        $request->validate([
            'job_seeker_cv_id' => 'required'
        ], [
            'job_seeker_cv_id.required' => 'Please choose a cv to apply for this Job!'
        ]);
        //dd($request->all());
        $setting = Setting::first();
        $job = Job::query()->where('id', $id)->first();
        $attachment1 = JobSeekerCv::query()->where('id', $request->job_seeker_cv_id)->first()->pdf;

        $attachment = [
            "path" => asset('storage/' . $attachment1),
            "as" => "my_cv.pdf",
            "mime" => "application/pdf",
        ];

        JobSeekerJob::query()->create([
            'job_seeker_id' => auth('job_seekers')->id(),
            'job_id' => $id,
            'job_seeker_cv_id' => $request->job_seeker_cv_id,
        ]);

        $job->update([
            'applicants_count' => $job->applicants_count + 1
        ]);

        //$setting->email_from
        Mail::to(auth('job_seekers')->user()->email)->send(new ApplyToJob('Apply to ' . $job->title, $job, auth('job_seekers')->user(), $attachment));

        Mail::to($setting->email_from)->send(new newApplied('New job Seeker has applied to' . $job->title, $job, auth('job_seekers')->user(), $attachment));
        return back()->with('applied', 'you have applied successfully');
    }


    public function retract($id)
    {
        $setting = Setting::first();

        $job = Job::query()->where('id', $id)->first();

        JobSeekerJob::query()->where('job_id', $id)->delete();

        //$setting->email_from
        //auth('job_seekers')->user()->email
        Mail::to('ayakhomar@gmail.com')->send(new RetractFromJob('Retract from ' . $job->title, $job, auth('job_seekers')->user()));

        Mail::to('ayakhomar@gmail.com')->send(new Retracted('job Seeker has retract from' . $job->title, $job, auth('job_seekers')->user()));
        return back()->with('success', 'you have retracted successfully');
    }

    public function download($id)
    {
        //$post = Job::query()->where('id', $id)->first()->pdf_details;
        //return Storage::download($post);

        $post = Job::query()->where('id', $id)->first();
        if ($post and isset($post->pdf_details)) {
            $extensions = explode('.', $post->pdf_details);
            $ext = $extensions[count($extensions) - 1];
            // return $ext;
            return Storage::disk('public')->download($post->pdf_details, $post->title . '.' . $ext);
        }
        return redirect()->back();
    }

    public function bookmark($id)
    {
        JobSeekerBookmark::query()->create([
            'job_seeker_id' => 1,
            'job_id' => $id,
        ]);
        return redirect()->back()->with('msgBookmarked', 'Job Booked marked successfully!');
    }

    public function un_bookmark($id)
    {
        JobSeekerBookmark::query()->where('job_id', $id)->delete();
        return redirect()->back()->with('msgBookmarked', 'Job removed from bookmarks successfully!');
    }

    public function downloadCv($id)
    {
        $cv = JobSeekerCv::query()->where('id', $id)->first();
        if ($cv and isset($cv->pdf)) {
            $extensions = explode('.', $cv->pdf);
            $ext = $extensions[count($extensions) - 1];
            // return $ext;
            return Storage::disk('public')->download($cv->pdf, 'cv' . '.' . $ext);
        }
        return redirect()->back();
    }

    public function deleteCv($id)
    {
        JobSeekerCv::query()->where('id', $id)->delete();
        return redirect()->back()->with('msgBookmarked', 'Job Cv removed successfully!');
    }

    public function uploadCv(Request $request)
    {
        /*$request->validate([
            'pdf' => 'required|mimes:pdf|max:10000',
        ],[
           'pdf.required' => 'Please upload your pdf cv'
        ]);*/

        $data = $request->only(['job_seeker_id', 'cv_name', 'pdf']);
        if ($request->hasFile('pdf')) {
            $filename = $request->pdf->store('public');
            $imagename = $request->pdf->hashName();
            //$data['pdf'] = $imagename;
            $data['pdf'] = $request->file('pdf')->store('');
        }

        $data['job_seeker_id'] = auth('job_seekers')->id();
        $data['cv_name'] = $request->pdf;
        JobSeekerCv::query()->create($data);
        return redirect()->back()->with('cvSuccess', 'Cv Uploaded successfully!');
    }

    public function myAppliedJobs()
    {
        $posts = JobSeekerJob::query()->where('job_seeker_id', auth('job_seekers')->id())->paginate(5);
        return view('frontend.jobsldn.job_seeker.JobSeekerJobs', compact('posts'));
    }

    public function myBookmarks()
    {
        $posts = JobSeekerBookmark::query()->where('job_seeker_id', auth('job_seekers')->id())->paginate(5);
        return view('frontend.jobsldn.job_seeker.bookmark', compact('posts'));
    }

    public function deleteJob($id)
    {
        Job::query()->where('id', $id)->delete();
        return redirect()->back()->with('msgBookmarked', 'Job removed successfully!');
    }

    public function editJob($id)
    {
        $post = Job::query()->where('id', $id)->first();
        return view('Front.PostJob', compact('post'));
    }

    public function editJobUpdate($id)
    {
//        dd(\request()->all());
        Job::query()->where('id', $id)->update(\request()->only(
            'title',
            'summery',
            'pdf_details',
            'city_id',
            'type_id',
            'category_id',
            'currency_id',
            'per_id',
            'salary',
            'expired_at',
            'job_post_email',));
        return redirect()->back()->with('msgBookmarked', 'Job removed successfully!');
    }
}
