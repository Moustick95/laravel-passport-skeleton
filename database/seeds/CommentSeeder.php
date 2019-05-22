<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Ticket;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $tickets = Ticket::all();

        for($i = 0; $i < 3; $i++)
            factory(Comment::class) -> create([
                'owner' => $users -> random(1),
                'ticket' => $tickets -> random(1),
            ]); 
    }
}
