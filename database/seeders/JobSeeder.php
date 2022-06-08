<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Job;
use App\Models\JobSeeker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobSeeker::query()->create([
            'first_name' => 'aya',
            'last_name' => 'omar',
            'email' => 'aya@gmail.com',
            'password' => 12345678,
            'read_conditions' => 1,
        ]);

        JobSeeker::query()->create([
            'first_name' => 'yota',
            'last_name' => 'oma',
            'email' => 'yota@gmail.com',
            'password' => 12345678,
            'read_conditions' => 1,
        ]);

        $c1 = Company::query()->create([
            'first_name' => 'Ans',
            'last_name' => 'Omran',
            'email' => 'anas@gmail.com',
            'password' => 12345678,
            'read_conditions' => 1,
            'company_name' => 'Nishan',
            'employee_count' => 20,
            'industry'=> 'Tech',
            'website_url' => 'www.fb.com',
            'overview'=> 'anassss',
        ]);

        Job::query()->create([
            'company_id' => $c1->id,
            'title' => 'Graphic Designer',
            'summery' => 'we neeed a ',
//            'pdf_details' =>,
            'city_id' => 1,
            'type_id' => 1,
            'category_id' => 1,
            'currency_id' => 1,
            'per_id' => 1,
            'salary' => 200,
            'expired_at' => '2022-12-30',
            'job_post_email' => 'ans@nishan.com',
            'is_super_post' => 1,
        ]);

        Job::query()->create([
            'company_id' => $c1->id,
            'title' => 'Developer',
            'summery' => 'we neeed a ',
//            'pdf_details' =>,
            'city_id' => 1,
            'type_id' => 1,
            'category_id' => 1,
            'currency_id' => 1,
            'per_id' => 1,
            'salary' => 200,
            'expired_at' => '2022-12-5',
            'job_post_email' => 'ans@nishan.com',
            'is_super_post' => 1,
        ]);
    }
}
