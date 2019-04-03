<?php

use Illuminate\Database\Seeder;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
            'subjectid' => 1,
            'material' => "Lingkaran"
        ]);
        DB::table('materials')->insert([
            'subjectid' => 1,
            'material' => "Bangun Datar"
        ]);
        DB::table('materials')->insert([
            'subjectid' => 1,
            'material' => "Bangun Ruang"
        ]);
    }
}
