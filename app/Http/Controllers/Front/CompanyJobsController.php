<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ApplyToJob;
use App\Mail\newApplied;
use App\Mail\Retracted;
use App\Models\Job;
use App\Models\JobSeekerBookmark;
use App\Models\JobSeekerCv;
use App\Models\JobSeekerJob;
use App\Models\Notification;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CompanyJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        /*$job = Job::query()->latest()->first();
        dd($job,$job->salary,(int)$job->salary);*/
        //$posts = Job::query()->payment()->orderByDesc('is_super_post')->orderByDesc('created_at')->FilterStatus()->paginate(10);
        $posts = Job::query()
            ->payment()
            ->orderBy('created_at','desc')
            ->FilterStatus()
            ->paginate();

        if ($request->sort_field == 'salary') {
            $posts = Job::query()
                ->payment()
                ->orderByRaw('LENGTH(salary) desc')
                ->orderBy('salary', 'desc')
//                ->orderByRaw("DATE_FORMAT('d-m-Y',created_at) desc")
                ->paginate();
        }

        if ($request->sort_field == 'type') {
            $posts = Job::query()
                ->payment()
                ->orderBy('type_id')
                ->paginate();
        }
        if ($request->sort_field == 'title') {
            $posts = Job::query()
                ->payment()
                ->orderBy('title')
                ->paginate();
        }

        if ($request->sort_field == 'created_at') {
            $posts = Job::query()
                ->payment()
                ->orderBy('created_at','desc')
                ->paginate();
        }


        $min_salary = Job::query()->min('salary');
        $max_salary = Job::query()->max('salary');
        return view('frontend.jobs', compact('posts', 'min_salary', 'max_salary'));
    }

    public function jobDetails($id,$name = null)
    {
        // dd($id, $name);
        $checkpost = Job::query()->where('id', $id);

        if($name == null){
            if ($checkpost->accepted()->doesntExist()) {
                return redirect()->back();
            }else{
                $checkpost = $checkpost->first();
                return redirect()->route('job_details',[$checkpost->id,Str::slug($checkpost->title)]);
            }
        }
        if (Job::query()->where('id', $id)->accepted()->doesntExist()) {
            return redirect()->back();
        }
        $post = Job::query()->where('id', $id)->first();
        $created_at = Job::query()->where('id', $id)->whereDate('expired_at', '>', now())->exists();
        $dont_applied = auth('job_seekers')->check() ?
            JobSeekerJob::query()->where('job_seeker_id', auth('job_seekers')->id())
                ->where('job_id', $id)
                ->doesntExist() : null;
        //dd($created_at,$dont_applied);
        $bookmarked = JobSeekerBookmark::query()->where('job_id', $id)->where('job_seeker_id', auth('job_seekers')->id())->doesntExist();
        $similar = Job::query()->active()->payment()->inRandomOrder()->take(4)->get();
        $cvs = auth('job_seekers')->check() ? auth('job_seekers')->user()->cvs : null;
        $shareComponent = \Share::page(
            \request()->url(),
            $post->title,
        )
            ->facebook()
            ->twitter()
            ->linkedin('Extra linkedin summary can be passed here');
        $post->update([
            'views_count' => $post->views_count + 1
        ]);
        return view('frontend.job', compact('post', 'dont_applied', 'bookmarked', 'created_at', 'similar', 'cvs', 'shareComponent'));
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
            'job_seeker_cv_id.required' => 'You must upload your CV in order to apply for jobs.'
        ]);

        $job = Job::query()->where('id', $id)->first();
        $attachment1 = JobSeekerCv::query()->where('id', $request->job_seeker_cv_id)->first()->pdf;

        $path = $this->getDisk() == 's3' ? Storage::disk('s3')->url($attachment1) : asset('storage/' . $attachment1);
        $attachment = [
            "path" => $path,
            "as" => "my_cv.pdf",
            "mime" => "application/pdf",
        ];

        JobSeekerJob::query()->create([
            'job_seeker_id' => auth('job_seekers')->id(),
            'job_id' => $id,
            'job_seeker_cv_id' => $request->job_seeker_cv_id,
        ]);


        Notification::query()->create([
            'job_seeker_id' => auth('job_seekers')->id(),
            'company_id' => $job->company_id,
            'job_id' => $id,
            'type' => 1
        ]);

        try {
            Mail::to(auth('job_seekers')->user()->email)
                ->send(new ApplyToJob('Application confirmation: ' . $job->title, $job,
                    auth('job_seekers')->user(), $attachment));

            Mail::to($job->job_post_email)
                ->send(new newApplied('New application received! - ' . $job->title, $job,
                    auth('job_seekers')->user(), $attachment));
        } catch (\ErrorException $e) {
            return back()->with('fail', 'Email fail to send');
        }
        return back()->with('success', 'you have applied successfully');
    }


    public function uploadApply(Request $request, $id)
    {
        $request->validate([
            'pdf' => 'required'
        ], [
            'pdf.required' => 'You must upload your CV in order to apply for jobs.'
        ]);

        $data = $request->only(['job_seeker_id', 'cv_name', 'pdf']);
        if ($request->hasFile('pdf')) {
            $filename = $request->pdf->store('public');
            $imagename = $request->pdf->hashName();
            //$data['pdf'] = $imagename;
            $data['pdf'] = $request->file('pdf')->store('');
        }

        $data['job_seeker_id'] = auth('job_seekers')->id();
        $data['cv_name'] = $request->file('pdf')->getClientOriginalName();
        $cv = JobSeekerCv::query()->create($data);

        $job = Job::query()->where('id', $id)->first();
        $attachment1 = JobSeekerCv::query()->where('id', $cv->id)->first()->pdf;

        $attachment = [
            "path" => asset('storage/' . $attachment1),
//            "path" => asset('storage/' . $attachment1),
            "as" => "cv.pdf",
            "mime" => "application/pdf",
        ];

        JobSeekerJob::query()->create([
            'job_seeker_id' => auth('job_seekers')->id(),
            'job_id' => $id,
            'job_seeker_cv_id' => $cv->id,
        ]);


        Notification::query()->create([
            'job_seeker_id' => auth('job_seekers')->id(),
            'company_id' => $job->company_id,
            'job_id' => $id,
            'type' => 1
        ]);

        //$setting->email_from
        //Mail::to(auth('job_seekers')->user()->email)->send(new ApplyToJob('Apply to ' . $job->title, $job, auth('job_seekers')->user(), $attachment));

        try {
            Mail::to($job->job_post_email)->send(new newApplied('New applied to' . $job->title, $job, auth('job_seekers')->user(), $attachment));
        } catch (\ErrorException $e) {
            return back()->with('fail', 'Email fail to send');
        }
        return back()->with('success', 'you have applied successfully');
    }


    public function retract($id)
    {
        $setting = Setting::first();

        $job = Job::query()->where('id', $id)->first();
        //dd($job->email);

        try {
            Mail::to($job->job_post_email)->send(new Retracted("One applicant is no longer interested in the job.", $job, auth('job_seekers')->user()));
        } catch (\ErrorException $e) {
            return back()->with('fail', 'Email fail to send');
        }

        JobSeekerJob::query()->where('job_id', $id)->delete();

        Notification::query()->create([
            'job_seeker_id' => auth('job_seekers')->id(),
            'company_id' => $job->company_id,
            'job_id' => $id,
            'type' => 2
        ]);

        //Mail::to(auth('job_seekers')->user()->email)->send(new RetractFromJob('Retract from ' . $job->title, $job, auth('job_seekers')->user()));


        return back()->with('success', "You've successfully retracted your interest in the job.");
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
            return Storage::disk($this->getDisk())->download($post->pdf_details, $post->title . '.' . $ext);
        }
        return redirect()->back();
    }

    public function bookmark($id)
    {
        JobSeekerBookmark::query()->create([
            'job_seeker_id' => auth('job_seekers')->id(),
            'job_id' => $id,
        ]);
        return back()->with('success', "You've saved this job for later!");
    }

    public function un_bookmark($id)
    {
        JobSeekerBookmark::query()->where('job_seeker_id', auth('job_seekers')->id())->where('job_id', $id)->delete();
        return back()->with('success', 'Job removed from bookmarks successfully!');
    }

    public function downloadCv($id)
    {
        $cv = JobSeekerCv::query()->where('id', $id)->first();
        if ($cv and isset($cv->pdf)) {
            $extensions = explode('.', $cv->pdf);
            $ext = $extensions[count($extensions) - 1];
            // return $ext;
            return Storage::disk($this->getDisk())->download($cv->pdf, 'cv' . '.' . $ext);
        }
        return redirect()->back();
    }

    public function deleteCv($id)
    {
        JobSeekerCv::query()->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Your CV has been removed.');
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
            /*$filename = $request->pdf->store('public');
            $imagename = $request->pdf->hashName();
            //$data['pdf'] = $imagename;
            $data['pdf'] = $request->file('pdf')->store('');*/
            $data['pdf'] = Storage::disk($this->getDisk())->put('', $request->file('pdf'));
        }

        $data['job_seeker_id'] = auth('job_seekers')->id();
        $data['cv_name'] = $request->pdf->getClientOriginalName();
        JobSeekerCv::query()->create($data);
        return redirect()->back()->with('success', 'Your CV has been saved. ');
    }

    public function myAppliedJobs()
    {
        $posts = JobSeekerJob::query()->where('job_seeker_id', auth('job_seekers')->id())->paginate(5);
        return view('frontend.job_seeker.JobSeekerJobs', compact('posts'));
    }

    public function myBookmarks()
    {
        $posts = JobSeekerBookmark::query()->where('job_seeker_id', auth('job_seekers')->id())->paginate(5);
        return view('frontend.job_seeker.bookmark', compact('posts'));
    }

    public function deleteJob($id)
    {
        Job::query()->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Job removed successfully!');
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

    public function show(Request $request)
    {

    }
}
