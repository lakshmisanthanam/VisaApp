<?php

use Illuminate\Database\Seeder;

class VisaCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visa_categories')->insert([
            'country_code' => 'USA',
            'visa_category_code' => 'H1B',
            'visa_category_desc' => 'H1B Primary VISA'
        ]);

        DB::table('visa_categories')->insert([
            'country_code' => 'USA',
            'visa_category_code' => 'H4',
            'visa_category_desc' => 'H1B Dependent VISA'
        ]);

        DB::table('visa_categories')->insert([
            'country_code' => 'USA',
            'visa_category_code' => 'L1A',
            'visa_category_desc' => 'L1A Primary VISA'
        ]);

        DB::table('visa_categories')->insert([
            'country_code' => 'USA',
            'visa_category_code' => 'L1B',
            'visa_category_desc' => 'L1B Primary VISA'
        ]);

        DB::table('visa_categories')->insert([
            'country_code' => 'USA',
            'visa_category_code' => 'L2',
            'visa_category_desc' => 'L1 Dependent VISA'
        ]);
    }
}
