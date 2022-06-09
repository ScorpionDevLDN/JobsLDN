<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentConteroller extends Controller
{
    public function index(){
//        $newsletters = Newsletter::query()->get();
        return view('dashboard.admin.payments.index');
    }
}
