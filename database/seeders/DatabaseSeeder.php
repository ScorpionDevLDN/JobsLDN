<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Newsletter;
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
        $role = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Editor']);

        $user = Admin::query()->create([
            'name' => 'Nishan Admin',
            'email' => 'nishan@admin.com',
            'password' => 'nishan',
            'is_super_admin' => 1
        ]);
        $user2 = Admin::query()->create([
            'name' => 'Aya Omar',
            'email' => 'ayakhomar@gmail.com',
            'password' => 'nishan',
        ]);

        $permissions = Permission::pluck('id','name')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
        $user2->assignRole([$role2->id]);

        \App\Models\Job::factory(50)->create();
        $this->call(CategorySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(PerSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(JobSeeder::class);
        $this->call(SliderSeeder::class);

        foreach (range(0,10) as $i){
            Newsletter::query()->create([
                'email' => 'name'.$i.'@gmail.com'
            ]);
        }
    }
}
