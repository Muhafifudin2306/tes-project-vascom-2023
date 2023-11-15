<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $users = [
            [
                'name' => 'Muhammad Afifudin',
                'email' => 'muhafifudin2306@gmail.com',
                'telephone' => '083866678086',
                'password' => Hash::make('admin123'),
                'status' => 'active'
            ],
            [
                'name' => 'Muhammad Afifudin',
                'email' => 'muhafifudin66@gmail.com',
                'telephone' => '083862414847',
                'password' => Hash::make('admin123'),
                'status' => 'non-active'
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
