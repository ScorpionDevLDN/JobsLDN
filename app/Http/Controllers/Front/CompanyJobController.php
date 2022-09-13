<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class CompanyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Job::query()->where('company_id',auth('companies')->id())->paginate(5);
        return view('frontend.jobsldn.company.jobs',compact('posts'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'title' => 'required',
            'summery'=> 'required',
            'pdf_details'=> 'required',
            'city_id'=> 'required',
            'type_id'=> 'required',
            'category_id'=> 'required',
            'currency_id'=> 'required',
            'per_id'=> 'required',
            'salary'=> 'required',
            'expired_at'=> 'required',
            'job_post_email'=> 'required',
        ]);*/
        //dd($request->all());
        $data = $request->only([
            'company_id',
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
            'job_post_email',
            'is_super_post',
        ]);

        /*if ($request->has('pdf_details')){
            $filename = $request->pdf_details->store('public');
            $imagename = $request->pdf_details->hashName();
            $data['pdf_details'] = $request->file('pdf_details')->store('');
        }*/

        $data['company_id'] = auth('companies')->id();

        Job::query()->create($data);
        return redirect()->route('company-jobs.index')->with('success', 'Job Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
