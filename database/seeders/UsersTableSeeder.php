<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'role'=>'admin',
            'phone'=>'01931150014',
            'address'=>'Tangail',
            'password'=>bcrypt('123456'),
            'otp'=>'1234',
            'is_verified'=>true,
            'otp_expired_at'=> Null,
            'email_verified_at'=> Null,
        ]);
    }
}
