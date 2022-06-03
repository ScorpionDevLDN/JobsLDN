<?php

namespace Database\Seeders;

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
            'social_links' => 'www.fd.com', //
            'slogan_text' => 'You apply, we hire!',
            'copy_right_text' => 'Copyright © 2022 - JOBSLDN',
            'main_color' => '#2900ff',
            'secondary_color' => '#f0eded',
        ]);
    }
}
