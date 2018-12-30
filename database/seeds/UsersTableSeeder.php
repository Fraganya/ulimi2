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
        User::create([
            'username'=>'admin',
            'firstname'=>'Francis',
            'surname'=>'Ganya',
            'type'=>'administrator',
            'specialization'=>'farming',
            'phone_number'=>'+265882370345',
            'email'=>'slimgaxienza@live.com',
            'pref_lang'=>"English",
            'password'=>bcrypt('@12345678!'),
        ]);
    }
}
