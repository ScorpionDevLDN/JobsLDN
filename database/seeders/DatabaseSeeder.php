<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);

        // \App\Models\User::factory(10)->create();

        $user = Admin::query()->create([
            'name' => 'Nishan Admin',
            'email' => 'nishan@admin.com',
            'password' => 'nishan',
//            'is_super_admin' => 1
        ]);
        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','name')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        $this->call(CategorySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(PerSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(JobSeeder::class);
    }
}
