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
      'ip' => '123.111'
    ]);

        DB::table('emails')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'email' => 'david@davidpetringa.com',
      'name' => 'David',
      'ip' => '223.111'
    ]);

        DB::table('emails')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'email' => 'hello@dukesnuz.com',
      'name' => 'Duke',
      'ip' => '323.111'
    ]);
    }
}
