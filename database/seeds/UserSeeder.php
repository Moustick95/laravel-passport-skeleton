<?php

use Illuminate\Database\Seeder;
Use Illuminate\Support\Facades\Hash;

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
        factory(User::class, 5) -> create(); 
        factory(User::class) -> create([
            "email" => "admin@admin.com",
            "password" => Hash::make('admin')
        ]);

    }
}
