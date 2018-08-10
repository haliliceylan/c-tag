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
            'email'    => 'erdenay@peakloop.com',
            'password' => 'peakloop@12345',
            'first_name' => 'Erdenay',
            'last_name' => 'ÖZKANLI'
        ]);
        Sentinel::registerAndActivate([
            'email'    => 'halil@peakloop.com',
            'password' => 'peakloop@12345',
            'first_name' => 'Halil İbrahim',
            'last_name' => 'CEYLAN'
        ]);
        Sentinel::registerAndActivate([
            'email'    => 'nihat@peakloop.com',
            'password' => 'peakloop@12345',
            'first_name' => 'Nihat Yılmaz',
            'last_name' => 'ŞİMŞEK'
        ]);
    }
}
