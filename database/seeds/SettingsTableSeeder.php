<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name'=>"Laravel's Blog",
            'contact_number'=>'090288',
            'contact_email'=>'abejidefemi1@gmail.com',
            'address'=>'Nigeria'
        ]);
    }
}
