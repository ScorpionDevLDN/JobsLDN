<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Job;
use App\Models\JobSeekerBookmark;
use App\Models\JobSeekerCv;
use App\Models\JobSeekerJob;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $posts = Job::query()->accepted()->FilterStatus()->paginate(5);
        $categories = Category::query()->where('status', 1)->get();
        $cities = City::query()->where('status', 1)->get();
        $types = Type::query()->where('status', 1)->get();
        $min_salary = Job::query()->min('salary');
        $max_salary = Job::query()->max('salary');
//        return view('Front.Jobs', compact('posts', 'categories', 'cities', 'types', 'min_salary', 'max_salary', 'posts_company'));
        return view('frontend.jobsldn.jobs', compact('posts', 'categories', 'cities', 'types', 'min_salary', 'max_salary'));
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
        $created_at = Job::query()->where('id', $id)->whereDate('created_at', '<', now())->exists();
        $bookmarked = JobSeekerBookmark::query()->where('job_id', $id)->where('job_seeker_id', auth('job_seekers')->id())->doesntExist();
        $similar = Job::query()->inRandomOrder()->take(4)->get();
//        $cvs = auth('job_seekers')->user()->cvs;
        return view('frontend.jobsldn.job', compact('post', 'bookmarked', 'created_at','similar'));
    }

    public function job_details_company($id)
    {
        $post = Job::query()->where('id', $id)->first();
        $created_at = Job::query()->where('id', $id)->whereDate('created_at', '<', now())->exists();
        return view('Front.Company-Single-job', compact('post', 'created_at'));
    }

    public function apply($id)
    {
        JobSeekerJob::query()->create([
            'job_seeker_id' => auth('job_seekers')->id(),
            'job_id' => $id,
            'job_seeker_cv_id' => \request('ApplyForJobCV'),
        ]);
//        Job::query()->where('job_id',$id)->update([
//
//        ]);
        return back()->with('applied','you have applied successfully');
    }


    public function retract($id)
    {
        JobSeekerJob::query()->where('job_id',$id)->delete();
        return back()->with('msgBookmarked','you have applied successfully');
    }
    public function download($id)
    {
        $post = Job::query()->where('id', $id)->first()->pdf_details;
        return Storage::download($post);
//        return response()->download($file_path_full, $basename, ['Content-Type' => 'application/force-download']);
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
        JobSeekerBookmark::query()->where('job_id',$id)->delete();
        return redirect()->back()->with('msgBookmarked', 'Job removed from bookmarks successfully!');
    }

    public function deleteCv($id)
    {
        JobSeekerCv::query()->where('id',$id)->delete();
        return redirect()->back()->with('msgBookmarked', 'Job Cv removed successfully!');
    }

    public function uploadCv(Request $request){
        dd($request->all());
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:10000',
        ],[
           'pdf.required' => 'Please upload your pdf cv'
        ]);
        JobSeekerCv::query()->create(array_merge(\request()->all(),[
            'cv_name' => $request->pdf->getClientOriginalName(),
            'job_seeker_id' => auth('job_seekers')->id(),
        ]));
        return redirect()->back()->with('cvSuccess', 'Cv Uploaded successfully!');
    }

    public function myAppliedJobs(){
        $posts = JobSeekerJob::query()->where('job_seeker_id',auth('job_seekers')->id())->paginate(5);
        return view('frontend.jobsldn.job_seeker.JobSeekerJobs',compact('posts'));
    }

    public function myBookmarks(){
        $posts = JobSeekerBookmark::query()->where('job_seeker_id',auth('job_seekers')->id())->paginate(5);
        return view('frontend.jobsldn.job_seeker.bookmark',compact('posts'));
    }

    public function deleteJob($id)
    {
        Job::query()->where('id',$id)->delete();
        return redirect()->back()->with('msgBookmarked', 'Job removed successfully!');
    }

    public function editJob($id)
    {
        $post = Job::query()->where('id',$id)->first();
        return view('Front.PostJob',compact('post'));
    }

    public function editJobUpdate($id)
    {
//        dd(\request()->all());
        Job::query()->where('id',$id)->update(\request()->only(
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
