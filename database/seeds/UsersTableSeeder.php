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
      App\User::create([
       'name'=>'Daniel Ngungath',
       'email'=>'daniel2ngungath@gmail.com',
       'password'=>bcrypt('ericky123'),
       'admin'=>1,
       'avatar'=>'1.jpg',
      ]);

      App\User::create([
       'name'=>'Ayubu Sukurieti',
       'email'=>'ayubu@gmail.com',
       'password'=>bcrypt('ayubu123'),
       'avatar'=>'1.jpg',
      ]);
    }
}
