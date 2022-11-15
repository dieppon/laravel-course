<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User([
            'name' => 'admin',
            'email' => 'developer@company.co.uk',
            'email_verified_at' => now(),
            'password' => Hash::make('changeme123'), // password
            'remember_token' => Str::random(10),
            'role' => 'admin',
        ]);
        $admin->save();
    }
}
