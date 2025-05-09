<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Muhammad Mirza Maulana',
                'password' => Hash::make('password'),
                'nim' => '2210010156',
                'study_program' => 'Teknik Informatika',
                'phone' => '085814313224',
                'role' => 'admin',
                'is_approved' => true,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        // DB::table('users')->insert([
        //     [
        //         'name' => 'Student User 1',
        //         'password' => Hash::make('password'),
        //         'nim' => '2210010155',
        //         'study_program' => 'Kemahasiswaan',
        //         'phone' => '085814313224',
        //         'role' => 'mahasiswa',
        //         'is_approved' => true,
        //         'remember_token' => Str::random(10),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);
        // DB::table('users')->insert([
        //     [
        //         'name' => 'Student User 2',
        //         'password' => Hash::make('password'),
        //         'nim' => '2210010154',
        //         'study_program' => 'Kemahasiswaan',
        //         'phone' => '085814313224',
        //         'role' => 'mahasiswa',
        //         'is_approved' => true,
        //         'remember_token' => Str::random(10),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);
    }
}
