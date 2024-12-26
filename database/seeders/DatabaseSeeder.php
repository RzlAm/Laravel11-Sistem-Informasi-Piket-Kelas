<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\Siswa;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Siswa::factory(36)->create(); 

        User::factory()->create([
            'name' => 'sandhika',
            'email' => 'sandhika@example.com',
            "password" => bcrypt("2KSA5omqVknFuNWuQjzOqiebfk")
        ]);

        Setting::create([
            "logo" => "settings/UzNfXvp3x8KlSoSEK4enRD36UjDeaGxTIYKfaf1r.png",
            "nama_kelas" => "XII TJKT 2"
        ]);
    }
}
