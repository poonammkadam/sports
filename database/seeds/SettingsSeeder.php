<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_settings')->insert([
            'terms' => 'terms',
            'about_us' => 'about_us',
            'policy' => ('policy'),
        ]);
    }
}
