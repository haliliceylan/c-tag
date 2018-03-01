<?php

use Illuminate\Database\Seeder;
use App\ConnectionTag;
class DefaultDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      ConnectionTag::create(['action_url' => 'http://ridvandayanc.com']);
      ConnectionTag::create(['action_url' => 'http://haliliceylan.com']);
    }
}
