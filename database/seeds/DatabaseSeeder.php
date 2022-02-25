<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // $this->call(UserSeeder::class);
        $user = new \App\User();
        $user->Fname = 'Ace';
        $user->Lname = 'Suttipong';
        $user->id_role = 0;
        $user->gender = 1;
        $user->tel = '09852652567';
        $user->email = 'admin@admin.com';
        $user->password = Hash::make('123456789');
        $user->save();
    }
}
