<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'fname'=>'admin',
            'lname'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('admin'),
            'role'=>'admin',
            'phone'=>'01123445345'
        ]);
    }
}
