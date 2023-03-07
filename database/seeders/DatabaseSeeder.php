<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Client;
use App\Models\Product;
use App\Models\Category;
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
        User::factory(20)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
            'role' => 'user',   
            'password' => bcrypt('12345678'),
        ]);

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

        Product::factory(20)->create();

        Client::factory(10)->create();
    }
}
