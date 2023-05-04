<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\MailMailableSend;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ContactfrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('frontend.Contacts');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $setting = Setting::first();
        $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'attachment' => 'sometimes|mimes:pdf',
        ]);
        $contact = Contact::query()->create($request->all());
        //dd(asset('storage/' . $contact->attachment));

        $path = $this->getDisk() == 's3' ? Storage::disk('s3')->url($contact->attachment) : asset('storage/' . $contact->attachment);

        $attachment = [
            "path" => $path,
            "as" => "contacts.pdf",
            "mime" => "application/pdf",
        ];
        //$setting->email_from
        Mail::to($setting->email_from)->send(new MailMailableSend($request->subject, $request->message, $attachment));
        return redirect()->route('contacts.index')->with('success', 'We received your query!');
    }
}
