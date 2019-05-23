<?php

use Illuminate\Database\Seeder;

use App\Priority;

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
        foreach($this -> priorities as $name){
            $priority = new Priority;
            $priority -> name = $name;
            $priority -> save();
        }
    }
}
