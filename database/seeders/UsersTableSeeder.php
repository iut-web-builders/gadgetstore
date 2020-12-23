<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $userString = 'user';
        $userNumber = 0;
        $user = $userString.$userNumber;
        $userNumber++;
        DB::table('users')->insert([
            'name' => $user,
            'email' => $user.'@user.com',
            'password' => Hash::make($user.'@user.com'),
        ]);
    }
}
