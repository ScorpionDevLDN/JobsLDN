<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminGetContactUsController extends Controller
{
    public function getContactUs(){
        $contacts = Contact::query()->get();
        return view('dashboard.admin.contact.index', compact('contacts'));
    }
}
