<?php

use Illuminate\Database\Seeder;

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
        foreach($this -> states as $state)
            factory(State::class) -> create([
                'name' => $state
            ]);
    }
}
