<?php

namespace Database\Seeders;

use App\Foundation\Lib\UserType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       return User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'address' => 'balkumari',
            'mobile' => '9814578965',
            'city' => 'lalitpur',
            'pin' => '97748',
            'password' => Hash::make('secret'),
            'user_type' => UserType::TEACHER,
        ]);
    }
}
