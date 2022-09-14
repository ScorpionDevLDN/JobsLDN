<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::query()->get();
        return view('dashboard.admin.newsletters.index', compact('newsletters'));
    }

    public function destroy(Newsletter $newsletter)
    {
        \Newsletter::unsubscribe($newsletter->email);
        $newsletter->delete();
        return redirect()->route('admin.newsletter.index')->with('msg', 'Newsletter Deleted Successfully');
    }
}
