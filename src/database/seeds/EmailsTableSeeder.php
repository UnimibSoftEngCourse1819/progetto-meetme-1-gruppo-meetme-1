<?php

use App\User;
use App\Company;
use App\Email;

use Illuminate\Database\Seeder;

class EmailsTableSeeder extends Seeder
{
    /**
     * Generate emails' table seed
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $users->each(function ($user) {
            $user->emails()->saveMany(factory(Email::class, 3)->make());
        });

        $companies = Company::all();
        $companies->each(function ($company) use ($users){
            $emails = $users-> random(3)->pluck('emails.0');
            $company->emails()->saveMany($emails);
        });
    }
}
