<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PaymentSetting;
use Illuminate\Http\Request;

class PaymentConteroller extends Controller
{
    public function index(){
        $payment = PaymentSetting::query()->first();
        return view('dashboard.admin.payments.index',compact('payment'));
    }


    public function update(Request $request,$id)
    {
//        $request->validate([
//            'title' => 'required',
//            'image' => 'required',
//            'description' => 'required',
//            'days_count' => 'required',
//            'text' => 'required',
//        ]);

        PaymentSetting::query()->findOrFail($id)->update($request->all());


        return redirect()->route('admin.get-payments.index')->with('success', 'settings created successfully');
    }
}
