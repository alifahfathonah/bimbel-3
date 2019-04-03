<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'jenis_user' => 0,
            'nama_lengkap' => 'Admin',
            'alamat' => Str::random(20),
            'email' => Str::random(10).'@gmail.com',
            'no_hp' => '081212121212',
            'status' => 0,
            'username' => 'admin',
            'password' => Hash::make('admin'),
        ]);
        DB::table('users')->insert([
            'jenis_user' => 1,
            'nama_lengkap' => 'Guru 1',
            'alamat' => Str::random(20),
            'email' => Str::random(10).'@gmail.com',
            'no_hp' => '081212121212',
            'status' => 0,
            'username' => 'guru1',
            'password' => Hash::make('guru1'),
        ]);
        DB::table('users')->insert([
            'jenis_user' => 1,
            'nama_lengkap' => 'Guru 2',
            'alamat' => Str::random(20),
            'email' => Str::random(10).'@gmail.com',
            'no_hp' => '081212121212',
            'status' => 0,
            'username' => 'guru2',
            'password' => Hash::make('guru2'),
        ]);
        DB::table('users')->insert([
            'jenis_user' => 2,
            'nama_lengkap' => 'Siswa 1',
            'alamat' => Str::random(20),
            'email' => Str::random(10).'@gmail.com',
            'no_hp' => '081212121212',
            'status' => 0,
            'username' => 'siswa1',
            'password' => Hash::make('siswa1'),
        ]);
        DB::table('users')->insert([
            'jenis_user' => 2,
            'nama_lengkap' => 'Siswa 2',
            'alamat' => Str::random(20),
            'email' => Str::random(10).'@gmail.com',
            'no_hp' => '081212121212',
            'status' => 0,
            'username' => 'siswa2',
            'password' => Hash::make('siswa2'),
        ]);
        DB::table('users')->insert([
            'jenis_user' => 2,
            'nama_lengkap' => 'Siswa 3',
            'alamat' => Str::random(20),
            'email' => Str::random(10).'@gmail.com',
            'no_hp' => '081212121212',
            'status' => 0,
            'username' => 'siswa3',
            'password' => Hash::make('siswa3'),
        ]);
        DB::table('users')->insert([
            'jenis_user' => 2,
            'nama_lengkap' => 'Siswa 4',
            'alamat' => Str::random(20),
            'email' => Str::random(10).'@gmail.com',
            'no_hp' => '081212121212',
            'status' => 0,
            'username' => 'siswa4',
            'password' => Hash::make('siswa4'),
        ]);
    }
}
