<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run App\User entity seeder
     *
     * @return void
     */
    public function run()
    {
        factory(User::class) -> create([
            "email" => "admin@admin.admin",
            "password" => Hash::make('admin')
        ]); 
        factory(User::class, 4) -> create(); 
    }
}
