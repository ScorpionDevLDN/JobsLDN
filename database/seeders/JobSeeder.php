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
            'first_name' => 'Ali',
            'last_name' => 'Ali',
            'email' => 'Ali@gmail.com',
            'password' => 12345678,
            'read_conditions' => 1,
        ]);

        JobSeeker::query()->create([
            'first_name' => 'Mahmoud',
            'last_name' => 'Elh',
            'email' => 'mahmoud@gmail.com',
            'password' => 12345678,
            'read_conditions' => 1,
        ]);

        $c1 = Company::query()->create([
            'first_name' => 'Anas',
            'last_name' => 'Omran',
            'email' => 'anas@gmail.com',
            'password' => 12345678,
            'read_conditions' => 1,
            'company_name' => 'Nishan',
            'employee_count' => 20,
            'industry'=> 'Software solution',
            'website_url' => 'www.fb.com',
            'overview'=> 'Some text',
        ]);

        $c1 = Company::query()->create([
            'first_name' => 'Sergy',
            'last_name' => 'Omran',
            'email' => 'Sergy@gmail.com',
            'password' => 12345678,
            'read_conditions' => 1,
            'company_name' => 'Trillum',
            'employee_count' => 20,
            'industry'=> 'Tech',
            'website_url' => 'www.fb.com',
            'overview'=> 'This is trillum soft',
        ]);

        $c1 = Company::query()->create([
            'first_name' => 'Eslam',
            'last_name' => 'Omran',
            'email' => 'eslam@gmail.com',
            'password' => 12345678,
            'read_conditions' => 1,
            'company_name' => 'techshef',
            'employee_count' => 20,
            'industry'=> 'software,programming',
            'website_url' => 'www.fb.com',
            'overview'=> 'it soloutions',
        ]);

    }
}
