<?php

namespace Database\Seeders;

use App\Models\Per;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Per::query()->create([
           'per' => 'hourly'
       ]);

        Per::query()->create([
            'per' => 'monthly'
        ]);

        Per::query()->create([
            'per' => 'annually'
        ]);
    }
}
