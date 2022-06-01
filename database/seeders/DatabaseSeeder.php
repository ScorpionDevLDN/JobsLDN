<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Admin::query()->create([
            'name' => 'Nishan Admin',
            'email' => 'nishan@admin.com',
            'password' => 'nishan',
            'is_super_admin' => 1
        ]);

        $this->call(CategorySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(PerSeeder::class);
        $this->call(TypeSeeder::class);
    }
}
