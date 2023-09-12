<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $candidates = [
            ['full_name' => 'Fawaid Syamsul Arifin', 'dob' => '2001-04-11', 'gender' => 'Male'],
            ['full_name' => 'Agusbudi Purnomo', 'dob' => '1977-08-05', 'gender' => 'Male'],
            ['full_name' => 'Johan Lolong', 'dob' => '1968-01-09', 'gender' => 'Male'],
            ['full_name' => 'Faradilah Yunita', 'dob' => '1989-06-04', 'gender' => 'Female'],
            ['full_name' => 'Jimmy Bandi', 'dob' => '1978-10-29', 'gender' => 'Male'],
            ['full_name' => 'Janice Devina Tirtautama', 'dob' => '1991-06-07', 'gender' => 'Female'],
            ['full_name' => 'Rudy Rudy', 'dob' => '1989-03-07', 'gender' => 'Male'],
            ['full_name' => 'Jefri Yusuf', 'dob' => '1985-08-14', 'gender' => 'Male'],
            ['full_name' => 'Djarot Waskita', 'dob' => '1972-03-05', 'gender' => 'Male'],
            ['full_name' => 'Diah Permata', 'dob' => '1973-12-23', 'gender' => 'Female'],
        ];
    
        // Loop through the data and insert into the "candidates" table
        foreach ($candidates as $candidate) {
            DB::table('candidates')->insert($candidate);
        }
    }
}
