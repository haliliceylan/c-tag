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
        ConnectionTag::create(['action_url' => 'http://itucekirdek.com/']);
        Sentinel::registerAndActivate([
            'email'    => 'ridvan@peakloop.com',
            'password' => 'peakloop@12345',
            'first_name' => 'Rıdvan',
            'last_name' => 'DAYANÇ'
        ]);
        Sentinel::registerAndActivate([
            'email'    => 'halil@peakloop.com',
            'password' => 'peakloop@12345',
            'first_name' => 'Halil İbrahim',
            'last_name' => 'CEYLAN'
        ]);
    }
}
