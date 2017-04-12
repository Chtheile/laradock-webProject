<?php

use Illuminate\Database\Seeder;

class TextTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('texts')->insert([
              'name' => str_random(10),
              'body' => str_random(25),
              'author' => str_random(10),
              'type' => str_random(10),
              'media' => str_random(10),
              'filepath' => str_random(10),
          ]);
    }
}
