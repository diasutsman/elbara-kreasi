<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Database\Seeder;

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

        Category::create([
            'name' => 'Kemasan Makanan',
            'slug' => 'kemasan-makanan',
        ]);

        Category::create([
            'name' => 'Kemasan Produk',
            'slug' => 'kemasan-produk',
        ]);

        Category::create([
            'name' => 'Perlengkapan Kantor',
            'slug' => 'perlengkapan-kantor',
        ]);

        Category::create([
            'name' => 'Kalender & Notes',
            'slug' => 'kalender-notes',
        ]);

        Product::factory(10)->create();

        Client::factory(10)->create();

    }
}
