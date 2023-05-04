<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Jobs\EndSuperPost;
use App\Models\Admin\PaymentSetting;
use App\Models\Job;
use App\Models\JobSeekerBookmark;
use App\Models\JobSeekerJob;
use App\Models\Notification;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Support\Facades\Storage;

class CompanyJobController extends Controller
{
    public function index()
    {
        $posts = Job::query()->payment()->active()->where('company_id', auth('companies')->id())->orderByDesc('id')->paginate(10);
        return view('frontend.company.Jobs', compact('posts'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required',
            'summery' => 'required',
            'city_id' => 'required',
            'type_id' => 'required',
            'category_id' => 'required',
            'currency_id' => 'required',
            'per_id' => 'required',
            'salary' => 'required',
            'job_post_email' => 'required',
        ], [
            'title.required' => 'Title field are required',
            'summery.required' => 'Summary field are required',
            'city_id.required' => 'City field are required',
            'type_id.required' => 'Type field are required',
            'category_id.required' => 'Category field are required',
            'currency_id.required' => 'Currency field are required',
            'salary.required' => 'Salary field are required',
            'salary.numeric' => 'Salary field should be integer',
            'per_id.required' => 'Per field are required',
            'expired_at.required' => 'Expire date field are required',
            'job_post_email.required' => 'Email field are required',
        ]);

        if (str_contains($request->salary, '-')){
            return back()->withInput()->with('salary',"Salary should be positive number");
        }
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
            'job_post_email',
            'is_super_post',
        ]);

        if ($request->has('pdf_details')) {
            $data['pdf_details'] = Storage::disk($this->getDisk())->put('', $request->file('pdf_details'));
        }

        $data['salary'] = $request->salary;
        $data['company_id'] = auth('companies')->id();
        $data['expired_at'] = $request->is_super_post ? today()->addDays(29)->format('d-m-Y') : today()->addDays(8)->format('d-m-Y');
        $job = Job::query()->create($data);
        if ($request->is_super_post) {
            return $this->payment($job->id);
        }
        return redirect()->route('company-jobs.index')->with('success', 'Your job posting is on the way! It normally takes up to 24hrs for us to review & approve it. Thank you for your patience. ');
    }

    public function edit($id)
    {
        $job = Job::query()->payment()->where('id', $id)->where('status', 1)->first();
        if (!$job) {
            return back();
        }
        return view('frontend.company.EditPostJob', compact('job'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required',
            'summery' => 'required',
//            'pdf_details'=> 'required',
            'city_id' => 'required',
            'type_id' => 'required',
            'category_id' => 'required',
            'currency_id' => 'required',
            'per_id' => 'required',
            'salary' => 'required',
//            'expired_at' => 'required',
            'job_post_email' => 'required',
        ], [
            'title.required' => 'Title field are required',
            'summery.required' => 'Summery field are required',
            'city_id.required' => 'City field are required',
            'type_id.required' => 'Type field are required',
            'category_id.required' => 'Category field are required',
            'currency_id.required' => 'Currency field are required',
            'salary.required' => 'Salary field are required',
            'salary.integer' => 'Salary field should be integer',
            'per_id.required' => 'Per field are required',
            'expired_at.required' => 'Expire date field are required',
            'job_post_email.required' => 'Email field are required',
        ]);
        if (str_contains($request->salary, '-')){
            return back()->withInput()->with('salary',"Salary should be positive number");
        }
        //dd($request->all(),$request->filled('pdf_details'));
        $data = $request->only([
            'company_id',
            'title',
            'summery',
            'city_id',
            'type_id',
            'category_id',
            'currency_id',
            'per_id',
            'salary',
//            'expired_at',
            'job_post_email',
            'is_super_post',
        ]);

        if ($request->has('pdf_details')) {
            //Storage::disk('public_storage')->delete($setting->data);
            $filename = $request->pdf_details->store('public');
            $imagename = $request->pdf_details->hashName();
            $data['pdf_details'] = $imagename;
        }

        if ($request->is_super_post) {
            $this->payment($id);
            return Job::query()->where('id', $id)->update($data + [
                    'status' => 0,
                    'is_super_post' => 1,
                ]);
        } else {
            Job::query()->where('id', $id)->update($data + [
                    'is_super_post' => 0,
                    'status' => 0,
                ]);
        }


        return redirect()->route('company-jobs.index')->with('success', 'Your job posting is on the way! It normally takes up to 24hrs for us to review & approve it. Thank you for your patience. ');
    }


    public function destroy($id)
    {
        JobSeekerBookmark::query()->where('job_id', $id)->delete();
        JobSeekerJob::query()->where('job_id', $id)->delete();
        Notification::query()->where('job_id', $id)->delete();
        Job::query()->findOrFail($id)->delete();

        return redirect()->route('company-jobs.index')->with('success', 'Job Deleted successfully!');
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    private function payment($job_id)
    {
        $price = PaymentSetting::query()->first()->price;
        $data['items'] = [
            [
                'name' => "JOB #: $job_id",
                'price' => $price,
                'desc' => "JOB #: $job_id",
                'qty' => 1
            ]
        ];

        $data['invoice_id'] = $job_id;
        $data['invoice_description'] = "Job #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success', $job_id);
        $data['cancel_url'] = route('payment.cancel', $job_id);
        $data['total'] = $price;

        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);
        $response = $provider->setExpressCheckout($data, true);

        return redirect($response['paypal_link']);
    }
}
