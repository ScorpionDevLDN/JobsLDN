<?php

namespace Database\Seeders;

use App\Models\Admin\PaymentSetting;
use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::query()->create([
            'website_name' => 'JOBSLDN',
            'logo' => new UploadedFile(public_path('assets/media/svg/logo.svg'), 'logo.svg'),
            'cover' => new UploadedFile(public_path('assets/media/svg/logo.svg'), 'logo.svg'),
            'address' => '425 Berry Street, CA 93584',
            'bio' => 'bio',
            'contact_email' => 'Nishan@gmail.com',
            'phone' => '(+00) - 00 0000000',
//            'social_links' => 'www.fd.com', //
            'slogan_text' => 'You apply, we hire!',
            'copy_right_text' => 'Copyright © 2022 - JOBSLDN',
            'main_color' => '#2900ff',
            'secondary_color' => '#f0eded',

            'phone2' => '(+00) - 00 0000000',
            'whatsapp_phone' => 'ww.whatsapp.com',
            'facebook_link'=> 'ww.fb.com',
            'twitter_link'=> 'ww.tw.com',
            'instagram_link'=> 'ww.intsa.com',
            'youtube_link'=> 'ww.yout.com',
            'telegram_link'=> 'ww.teleg.com',
            'site_key' => 'test site_key',
            'secret_key' => 'test secret_key',
            'email_from' => 'email@gmail.com',
        ]);

        PaymentSetting::query()->create([
            'title' => 'test',
            'description'  => 'test',
            'days_count' => 5,
            'text'  => 'test',
            'price' => 16,
            'support_by' => 'paypal',
        ]);
    }
}
