<?php

use App\Email;
use App\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emails = Email::all();

        factory(Event::class, 100)->create([
            'creator_id' => function () use ($emails) {
                return $emails->random()->id;
            }
        ])->each(function ($event) use ($emails) {
            $event->partecipants()->saveMany($emails->random(15));
        });
    }
}
