<?php

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
        $users=App\User::create([
            'name'=>'abejide femi',
            'email'=>'oluwafemiabejde@hotmail.com',
            'password'=>'password',
            'admin'=>1
        ]);
        App\Profile::create([
            'user_id'=>$users->id,
            'avatar'=>'uploads/avatars/avatar.png',
            'about'=>'avid book reader',
            'facebook'=>'facebook.com',
            'youtube'=>'youtube.com'
        ]);
    }
}
