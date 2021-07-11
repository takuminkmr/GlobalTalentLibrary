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
        DB::table('users')->insert([
            'entity_name'       => Str::random(10),
            'position'          => Str::random(10),
            'name'              => 'user',
            'email'             => 'user@example.com',
            'tel'               => Str::random(10),
            'password'          => Hash::make('12345678'),
            'remember_token'    => Str::random(10),
        ]);
    }
}
