<?php

use Illuminate\Database\Seeder;

class RelationshipCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relationship')->insert([
            'relation_type' => 'SPOUSE',
            'relation_description' => 'SPOUSE'
        ]);

        DB::table('relationship')->insert([
            'relation_type' => 'CHILD',
            'relation_description' => 'CHILD'
        ]);
    }
}
