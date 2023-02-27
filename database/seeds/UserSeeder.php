<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $role_admin = Role::where('name','admin')->first();
        $role_staff = Role::where('name','staff')->first();
        $role_customer = Role::where('name','customer')->first();

        $user_admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin21@hoofey.id',
            'username' =>'superadmin21',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
            'remember_token' => Str::random(10),
        ]);
        $user_admin->assignRole($role_admin->name);

        $user_staff = User::create([
            'name' => 'staff',
            'email' => 'staff@hoofey.id',
            'username' => 'staff.hoofey',
            'email_verified_at' => now(),
            'password' => bcrypt('staff123'),
            'remember_token' => Str::random(10),
        ]);
        $user_staff->assignRole($role_staff->name);

        $user_customer = User::create([
            'name' => 'Anto Joko',
            'email' => 'customer@gmail.com',
            'username' => 'anto.joko',
            'email_verified_at' => now(),
            'password' => bcrypt('namasaya'),
            'remember_token' => Str::random(10),
        ]);
        $user_customer->assignRole($role_customer->name);
    }
}
