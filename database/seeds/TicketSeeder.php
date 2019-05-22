<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Priority;
use App\State;

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
                'owner' => $users -> random(1),
                'assigned' => $users -> random(1),
                'priority' => $priorities -> random(1),
                'state' => $states -> random(1)
            ]); 
    }
}
