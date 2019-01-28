<?php

use App\User;
use App\Company;

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Generate 10 companies associated to 10 random users
     *
     * @return void
     */
    public function run()
    {
        User::all()->random(10)->each(function ($user) {
            $user->company()->save(factory(Company::class)->make());
        });
    }
}
