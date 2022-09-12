<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' =>'Mobarok',
            'email' => 'mubarok@gmail.com',
            'password' => bcrypt('12345'), // password
            'status' => 1,
            'parmanent_address'=>'Chaiterpara, kaligonj, gazipur',
            'present_address'=>'As Above',
            'DOB'=>'01/01/2000',
            'gender'=>'Male',
            'mertal_satus'=>'Married',
            'nationality'=>'Bangladesh',
            'photo'=>'upload/mubarok.png',
            
        ]);
    }
}