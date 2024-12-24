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
            "logo" => "settings/FmKbFDBTrLa2nrkrnXyQwM7ii3y4Rnaf1v48u0C7.png",
            "nama_kelas" => "XII TJKT 2"
        ]);
    }
}
