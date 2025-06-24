<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           User::create([
            'name' => 'Zainab Harraz',
            'email' => 'zainab@example.com',
            'password' => Hash::make('password123'),
            'job' => 'Developer',
            'phoneNumber' => '01012345678',
            'address' => '123 Main St',
            'image' => null,
            'city' => 'Cairo',
        ]);

        User::create([
            'name' => 'Ahmed Ali',
            'email' => 'ahmed@example.com',
            'password' => Hash::make('password456'),
            'job' => 'Designer',
            'phoneNumber' => '01087654321',
            'address' => '456 Side St',
            'image' => null,
            'city' => 'Alexandria',
        ]);

             User::create([
            'name' => 'Mona Samir',
            'email' => 'mona@example.com',
            'password' => Hash::make('pass789'),
            'job' => 'Project Manager',
            'phoneNumber' => '01234567890',
            'address' => '789 Project Rd',
            'image' => null,
            'city' => 'Giza',
        ]);

        User::create([
            'name' => 'Youssef Gamal',
            'email' => 'youssef@example.com',
            'password' => Hash::make('pass1011'),
            'job' => 'QA Engineer',
            'phoneNumber' => '01598765432',
            'address' => '22 Testing Ave',
            'image' => null,
            'city' => 'Mansoura',
        ]);

        User::create([
            'name' => 'Sara Nabil',
            'email' => 'sara@example.com',
            'password' => Hash::make('sara12345'),
            'job' => 'Marketing',
            'phoneNumber' => '01122334455',
            'address' => 'Marketing St',
            'image' => null,
            'city' => 'Tanta',
        ]);


                User::create([
            'name' => 'Omar Khaled',
            'email' => 'omar@example.com',
            'password' => Hash::make('omarpass'),
            'job' => 'Backend Developer',
            'phoneNumber' => '01099887766',
            'address' => 'Backend St',
            'image' => null,
            'city' => 'Aswan',
        ]);

        User::create([
            'name' => 'Layla Hassan',
            'email' => 'layla@example.com',
            'password' => Hash::make('layla456'),
            'job' => 'UI/UX Designer',
            'phoneNumber' => '01233445566',
            'address' => 'Design Blvd',
            'image' => null,
            'city' => 'Zagazig',
        ]);

        User::create([
            'name' => 'Mahmoud Adel',
            'email' => 'mahmoud@example.com',
            'password' => Hash::make('mahmoud789'),
            'job' => 'Full Stack Developer',
            'phoneNumber' => '01155667788',
            'address' => 'Stack Road',
            'image' => null,
            'city' => 'Fayoum',
        ]);

        User::create([
            'name' => 'Fatma Yehia',
            'email' => 'fatma@example.com',
            'password' => Hash::make('fatma123'),
            'job' => 'HR Manager',
            'phoneNumber' => '01011223344',
            'address' => 'HR Lane',
            'image' => null,
            'city' => 'Ismailia',
        ]);

        User::create([
            'name' => 'Kareem Mostafa',
            'email' => 'kareem@example.com',
            'password' => Hash::make('kareempass'),
            'job' => 'DevOps Engineer',
            'phoneNumber' => '01566778899',
            'address' => 'DevOps St',
            'image' => null,
            'city' => 'Suez',
        ]);





    }
}
