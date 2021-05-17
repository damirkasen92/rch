<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'KryaSEf90TbeLeoc',
            'email' => 'KryaSEf90TbeLeoc@KryaSEf90TbeLeoc.com',
            'password' => Hash::make('DYQmyqxrP57yC7HLmVIq')
        ]);
    }
}
