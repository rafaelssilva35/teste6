<?php

use Illuminate\Database\Seeder;

class UserAcess extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::get();

        foreach($users as $user) {  
            factory(App\UserAccess::class, rand(5, 15))->create([
                'user_id' => $user->id
            ]);
        }
    }
}
