<?php

use App\Models\Job;
use App\Models\Setting;

function getFontawsomeIcons()
{
    if ($setting = Setting::query()->first()
        ->first()) {
        return json_decode($setting->fontawsome_icons);
    } else {
        return [];
    }
}

function test_created($status, $time)
{
    $t = Job::where('status', $status)->payment()->whereMonth('created_at', $time)->count();
    return $t;
}