<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {

        $admin = User::create([
            'name' => 'Test User Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('1234'),
        ]);

        $admin->assignRole('admin');

        $comum = User::create([
            'name' => 'Test User Comum',
            'email' => 'comum@example.com',
            'password' => Hash::make('1234'),
        ]);

        $comum->assignRole('comum');


    }
}
