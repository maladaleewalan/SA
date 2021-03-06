<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->password = Hash::make('admin123');
        $user->username = "Administrator";
        $user->firstname = "Administrator";
        $user->lastname = "Administrator";
        $user->email = "admin123@hotmail.com";
        $user->role = "admin";
        $user->tel = "1234567890";
        $user->email_verified_at = now();
        $user->save();

        // $user = new User;
        // $user->password = Hash::make('kelvin123');
        // $user->username = "Kelvin";
        // $user->firstname = "เคลวิน";
        // $user->lastname = "ดีดีล";
        // $user->email = "kelvin123@hotmail.com";
        // $user->role = "user";
        // $user->tel = "0987654321";
        // $user->email_verified_at = now();
        // $user->save();
    }
}
