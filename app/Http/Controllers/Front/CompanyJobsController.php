<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Job;
use App\Models\Type;
use Illuminate\Http\Request;

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
        }
        elseif (\request()->filter =='salary') {
            $posts = Job::query()->orderByDesc('salary')->paginate(5);
        }
        elseif (\request()->filled('category')){
            $posts = Job::query()->where('category_id',\request()->category)->paginate(5);
        }
        elseif (\request()->filled('city')){
            $posts = Job::query()->where('city_id',\request()->city)->paginate(5);
        }
        elseif (\request()->filled('type')){
            $posts = Job::query()->where('type_id',\request()->type)->paginate(5);
        }
        elseif (\request()->filled('keywords')){
            $keywords = \request()->keywords;
            $posts = Job::query()->whereRaw('(title like ?)',["%$keywords%"])->paginate(5)->appends(['keywords'=>$keywords]);
        }
        elseif (\request()->filled('salary')){
            $posts = Job::query()->where('salary',\request('salary'))->paginate(5);
        }
        else{
            $posts = Job::query()->paginate(5);
        }
        $categories = Category::query()->where('status',1)->get();
        $cities = City::query()->where('status',1)->get();
        $types = Type::query()->where('status',1)->get();
        $min_salary = Job::query()->min('salary');
        $max_salary = Job::query()->max('salary');
        return view('Front.Jobs', compact('posts','categories','cities','types','min_salary','max_salary'));
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

    public function search(){}
}
