<?php

use Illuminate\Database\Seeder;
use App\UserAcess;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 500)->create();
    }
}
