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
use Illuminate\Http\Request;
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
        if (\request()->filter == 'newest') {
            $posts = Job::query()->orderByDesc('created_at')->paginate(5);
        } elseif (\request()->filter == 'salary') {
            $posts = Job::query()->orderByDesc('salary')->paginate(5);
        } elseif (\request()->filled('category')) {
            $posts = Job::query()->where('category_id', \request()->category)->paginate(5);
        } elseif (\request()->filled('city')) {
            $posts = Job::query()->where('city_id', \request()->city)->paginate(5);
        } elseif (\request()->filled('type')) {
            $posts = Job::query()->where('type_id', \request()->type)->paginate(5);
        } elseif (\request()->filled('keywords')) {
            $keywords = \request()->keywords;
            $posts = Job::query()->whereRaw('(title like ?)', ["%$keywords%"])->paginate(5)->appends(['keywords' => $keywords]);
        } elseif (\request()->filled('salary')) {
            $posts = Job::query()->where('salary', \request('salary'))->paginate(5);
        } else {
            $posts = Job::query()->paginate(5);
        }
        $posts_company = Job::query()->where('company_id', auth('companies')->id())->paginate(5);
        $categories = Category::query()->where('status', 1)->get();
        $cities = City::query()->where('status', 1)->get();
        $types = Type::query()->where('status', 1)->get();
        $min_salary = Job::query()->min('salary');
        $max_salary = Job::query()->max('salary');
        return view('Front.Jobs', compact('posts', 'categories', 'cities', 'types', 'min_salary', 'max_salary', 'posts_company'));
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
        $cvs = auth('job_seekers')->user()->cvs;
        return view('Front.Single-job', compact('post', 'bookmarked', 'created_at','similar','cvs'));
    }

    public function apply($id)
    {
        JobSeekerJob::query()->create([
            'job_seeker_id' => auth('job_seekers')->id(),
            'job_id' => $id,
            'job_seeker_cv_id' => \request('ApplyForJobCV'),
        ]);
        return back()->with('applied','you have applied successfully');
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
        JobSeekerBookmark::query()->where('id',$id)->delete();
        return redirect()->back()->with('msgBookmarked', 'Job removed from bookmarks successfully!');
    }

    public function deleteCv($id)
    {
        JobSeekerCv::query()->where('id',$id)->delete();
        return redirect()->back()->with('msgBookmarked', 'Job Cv removed successfully!');
    }

    public function uploadCv(Request $request){
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
}
