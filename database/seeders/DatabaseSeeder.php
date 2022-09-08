<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Perjanjian;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::create([
            'name' => 'Sarpras Pemanduan',
            'slug' => 'sarpras-pemanduan'
        ]);

        Category::create([
            'name' => 'Novasi ke PMS',
            'slug' => 'novasi-ke-pms'
        ]);

        Category::create([
            'name' => 'Tuks dan Tersus',
            'slug' => 'tuks-dan-tersus'
        ]);

        Category::create([
            'name' => 'PT. ISMA',
            'slug' => 'pt-isma'
        ]);

        Category::create([
            'name' => 'Koperasi dan Arta',
            'slug' => 'koperasi-dan-arta'
        ]);

        Category::create([
            'name' => 'KUPP',
            'slug' => 'kupp'
        ]);

        Category::create([
            'name' => 'Sewa Rumah',
            'slug' => 'sewa-rumah'
        ]);

        Perjanjian::factory(20)->create();

    }
}
