<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Add roles
        $roles = [['name' => 'admin'], ['name' => 'user'], ['name' => 'editor']];
        foreach ($roles as $role) {
            $role['created_at'] = Carbon::now();
            $role['updated_at'] = Carbon::now();
            Role::create($role);
        }

        // Assign user role to random generated users
        User::factory(10)->create();
        $users = User::all();
        foreach ($users as $user) {
            $user->assignRole('user');
        }

        // Add admin user with admin role
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
        $admin->assignRole('admin');
    }
}
