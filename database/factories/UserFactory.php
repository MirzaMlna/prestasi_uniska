<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
// class UserFactory extends Factory
// {
//     protected $model = User::class;
//     public function definition(): array
//     {
//         $studyPrograms = [
//             'Ilmu Komunikasi',
//             'Ilmu Administrasi Publik',
//             'Pendidikan Bahasa Inggris',
//             'Bimbingan dan Konseling',
//             'Pendidikan Kimia',
//             'Pendidikan Olah Raga',
//             'Manajemen',
//             'Peternakan',
//             'Agribisnis',
//             'Hukum Ekonomi Syari’ah',
//             'Ekonomi Syari’ah',
//             'Pendidikan Guru Madrasah Ibtidaiyah',
//             'Teknik Mesin',
//             'Teknik Sipil',
//             'Teknik Elektro',
//             'Teknik Industri',
//             'Kesehatan Masyarakat',
//             'Ilmu Hukum',
//             'Teknik Informatika',
//             'Sistem Informasi',
//             'Farmasi',
//         ];

//         return [
//             'name' => $this->faker->name(),
//             'nim' => $this->faker->unique()->numerify('22########'),
//             'study_program' => $this->faker->randomElement($studyPrograms),
//             'role' => $this->faker->randomElement(['Admin', 'Mahasiswa']),
//             'phone' => $this->faker->unique()->numerify('08##########'),
//             'is_approved' => $this->faker->boolean(10),
//             'password' => Hash::make('password'),
//             'remember_token' => Str::random(10),
//             'created_at' => now(),
//             'updated_at' => now(),
//         ];
//     }
// }
