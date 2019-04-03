<?php

use Illuminate\Database\Seeder;

class ChapterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chapters')->insert([
            'guruid' => 1,
            'materialid' => 1,
            'chapter' => "Lingkaran Dasar",
            'url' => "lingkaran_dasar.pdf",
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('chapters')->insert([
            'guruid' => 2,
            'materialid' => 1,
            'chapter' => "Lingkaran Lanjut",
            'url' => "lingkaran_lanjut.pdf",
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('chapters')->insert([
            'guruid' => 1,
            'materialid' => 2,
            'chapter' => "Bangun Datar Dasar",
            'url' => "bangun_datar_dasar.pdf",
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('chapters')->insert([
            'guruid' => 2,
            'materialid' => 2,
            'chapter' => "Bangun Datar Lanjut",
            'url' => "bangun_datar_lanjut.pdf",
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('chapters')->insert([
            'guruid' => 1,
            'materialid' => 3,
            'chapter' => "Bangun Ruang Dasar",
            'url' => "bangun_ruang_dasar.pdf",
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('chapters')->insert([
            'guruid' => 2,
            'materialid' => 3,
            'chapter' => "Bangun Ruang Lanjut",
            'url' => "bangun_ruang_lanjut.pdf",
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
