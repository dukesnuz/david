<?php

use Illuminate\Database\Seeder;
use David\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Define the users you want to add
        $users = [
  ['david@ajaxtransport.com','david','999999999'],
];

        # Get existing users to prevent duplicates
        $existingUsers = User::all()->keyBy('email')->toArray();

        foreach ($users as $user) {

  # If the user does not already exist, add them
            if (!array_key_exists($user[0], $existingUsers)) {
                $user = User::create([
          'email' => $user[0],
          'name' => $user[1],
          //'password' => Hash::make($user[2]),
          'password' => '$2y$10$w47LQDacYI5frPglV6n0K.U3WjDjuPwZOfIQWEN4yWBQngxsEZ56C',
      ]);
            }
        }
    }
}
