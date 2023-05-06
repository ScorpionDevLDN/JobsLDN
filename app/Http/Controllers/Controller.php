<?php

namespace App\Http\Controllers;

use App\Models\Admin\PaymentSetting;
use App\Models\Category;
use App\Models\City;
use App\Models\Currency;
use App\Models\Payment;
use App\Models\Per;
use App\Models\Setting;
use App\Models\Type;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use App\Traits\EmailVerification;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests , EmailVerification;

    public $setting, $payment_setting, $currencies, $categories, $cities, $pers, $types,$disk , $viewShare;

    public function __construct()
    {
        $settings = Setting::first();
        $payment_setting = PaymentSetting::first();

        $currencies = Currency::active()->get();
        $categories = Category::active()->orderBy('name')->get();
        $cities = City::active()->get();
        $pers = Per::active()->get();
        $types = Type::active()->get();

        $this->setting = $settings;
        $this->payment_setting = $payment_setting;

        $this->currencies = $currencies;
        $this->categories = $categories;
        $this->cities = $cities;
        $this->pers = $pers;
        $this->types = $types;
        $this->disk = config('filesystems.default') == 's3' ? 's3' : 'public';
        $this->viewShare();
    }

    public function viewShare()
    {


        $this->viewShare['setting'] = $this->setting;
        $this->viewShare['payment_setting'] = $this->payment_setting;

        $this->viewShare['currencies'] = $this->currencies;
        $this->viewShare['categories'] = $this->categories;
        $this->viewShare['cities'] = $this->cities;
        $this->viewShare['pers'] = $this->pers;
        $this->viewShare['types'] = $this->types;
        $this->viewShare['disk'] = $this->disk;

        View::share($this->viewShare);
    }

    public function getDisk(){
        return config('filesystems.default') == 's3' ? 's3' : 'public';
    }

}

