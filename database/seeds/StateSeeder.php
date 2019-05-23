<?php

use Illuminate\Database\Seeder;

use App\State;

class StateSeeder extends Seeder
{

    private $states = [
        "PENDING",
        "WAITING",
        "IN_PROGRESS",
        "DONE"
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this -> states as $name) {
            $state = new State;
            $state->name = $name;
            $state->save();
        }
    }
}
