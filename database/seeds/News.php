<?php

use Carbon\Carbon;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class News extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('webserver')->table('news')->insert([
          'id'         => 1,
          'title'      => 'Hello',
          'slug'       => 'hello',
          'text'       => 'If you have a issue, please contact mathieu.letyrant@gmail.com',
          'account_id' => 1,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);
    }
}
