<?php

use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'country_code' => 'USA',
            'description' => 'United States of America',
            'enabled' => 'true'
        ]);

        DB::table('countries')->insert([
            'country_code' => 'CANADA',
            'description' => 'Canada',
            'enabled' => 'true'
        ]);

        DB::table('countries')->insert([
            'country_code' => 'HONKONG',
            'description' => 'Honkong',
            'enabled' => 'true'
        ]);
    }
}
