<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Priority;
use App\State;
use App\Ticket;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $priorities = Priority::all();
        $states = State::all();
        
        for($i = 0; $i < 3; $i++)
            factory(Ticket::class) -> create([
                'owner' => $users -> random(1) -> first() -> id,
                'assigned' => $users -> random(1) -> first() -> id,
                'priority' => $priorities -> random(1) -> first() -> id,
                'state' => $states -> random(1) -> first() -> id
            ]); 
    }
}
