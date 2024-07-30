<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Seats;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Test User',
            'username' => 'test',
            'password' => Hash::make('123'),
        ]);

        $seats = [

            ['seats_name' => 'A1', 'status' => 'Available'],
            ['seats_name' => 'A2', 'status' => 'Taken'],

        ];
        Seats::insert($seats);
    }
}
