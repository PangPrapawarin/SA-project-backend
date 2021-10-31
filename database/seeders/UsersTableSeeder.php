<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Prapawarin',
                'email' => 'prapawarin.k@ku.th',
                'address' => "Pathumthani",
                'sex' => 'Female',
                'salary' => 15000,
                'phone' => '094-558-9164'
            ],
            [
                'name' => 'Naphatsorn',
                'email' => 'naphatsorn.ki@ku.th',
                'address' => "Chonburi",
                'sex' => 'Female',
                'salary' => 18000,
                'phone' => '062-535-4922'
            ],
            [
                'name' => 'Thanakit',
                'email' => 'thanakit.kit@ku.th',
                'address' => "Bangkok",
                'sex' => 'Male',
                'salary' => 15000,
                'phone' => '096-659-6700'
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
