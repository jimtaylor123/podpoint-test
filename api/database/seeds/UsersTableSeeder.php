<?php

use App\User;
use Illuminate\Support\Str;
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
        // Create user for development log in
        factory(User::class)->create([
            'name' => 'Jim Taylor',
            'email' => 'jim@jimtaylor.space',
            'password' => bcrypt('Password123'),
            'remember_token' => Str::random(10),
        ]);

        // Create other example users, all with the same example password
        factory(User::class, 50)->create();
    }
}
