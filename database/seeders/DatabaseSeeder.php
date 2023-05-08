<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Singer;
use \App\Models\Song;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Singer::factory()
        ->count(20)
        ->has(Song::factory()->count(3))
        ->create();

        $singers = Singer::factory()
        ->count(3)
        ->create();

        Song::factory()->count(20)
        ->hasAttached($singers)->create();
    }
}
