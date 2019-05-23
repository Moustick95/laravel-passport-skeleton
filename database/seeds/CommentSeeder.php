<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Ticket;
use App\Comment;

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

        factory(Comment::class, 3) -> create([
            'owner' => $users -> random(1) -> first() -> id,
            'ticket' => $tickets -> random(1) -> first() -> id,
        ]); 
    }
}
