<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $setting;

    public function __construct()
    {
        $settings = Setting::first();
        $this->setting = $settings;
        $this->viewShare();
    }

    public function viewShare(){


        $this->viewShare['setting'] = $this->setting;

        View::share($this->viewShare);
    }
}
