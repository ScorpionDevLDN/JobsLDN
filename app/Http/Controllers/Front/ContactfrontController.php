<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactfrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $setting = Setting::query()->first();
        return view('JobsLdn.Contacts', compact('setting'));
//        return view('Front.Contacts', compact('setting'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'attachment' => 'required|mimes:pdf|max:10000',
        ]);
        Contact::query()->create($request->all());

        //send email
        $data = array('name' => Setting::query()->first()->email_from,
            'msgtst' => \request('message'));

        Mail::send('mail', $data, function ($message) {
            $message->to(Setting::query()->first()->email_from, Setting::query()->first()->website_name)
                ->subject(\request('subject'));

            $message->attach(\request('attachment'));

            $message->from(\request('email'), \request('full_name'));
        });
        return redirect()->route('contacts.index')->with('message', 'Message Send successfully!');
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
}
