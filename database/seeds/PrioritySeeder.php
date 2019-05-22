<?php

use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{

    private $priorities = [
        "LOW",
        "NORMAL",
        "HIGHT"
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this -> priorities as $priority)
            factory(Priority::class) -> create([
                'name' => $priority
            ]);
    }
}
