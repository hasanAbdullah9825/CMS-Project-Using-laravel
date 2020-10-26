<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $user =User::where('email','hasan.techtoday@gmail.com')->first();
        if(!$user){

            User::create([
          'name'=>'Hasan',
          'email'=>'hasan.techtoday@gmail.com',
          'password'=>Hash::make('password'),
          'role'=>'admin'
            ]);
        }
    }
}
