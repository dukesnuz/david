<?php

use Illuminate\Database\Seeder;

class EmailsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('emails')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'email' => 'david@ajaxtransport.com',
      'name' => 'Heavy D',
    ]);

        DB::table('emails')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'email' => 'david@davidpetringa.com',
      'name' => 'David',
    ]);

        DB::table('emails')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'email' => 'hello@dukesnuz.com',
      'name' => 'Duke',
    ]);
    }
}
