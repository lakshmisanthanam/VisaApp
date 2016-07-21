<?php

use Illuminate\Database\Seeder;

class DigitalDocsTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('digital_docs_types')->insert([
            'doc_type' => 'pdf'
        ]);

		DB::table('digital_docs_types')->insert([
            'doc_type' => 'jpg'
        ]);

        DB::table('digital_docs_types')->insert([
            'doc_type' => 'jpeg'
        ]); 

        DB::table('digital_docs_types')->insert([
            'doc_type' => 'gif'
        ]);       
    }
}
