<?php

use App\User;
use App\Email;

use Illuminate\Database\Seeder;

class EmailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function ($user) {
            $user->emails()->save(factory(Email::class)->make());
        });
    }
}
