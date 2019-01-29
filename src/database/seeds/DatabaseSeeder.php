<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(EmailsTableSeeder::class);
        $this->call(CalendarsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(TimeSlotsTableSeeder::class);
    }
}
