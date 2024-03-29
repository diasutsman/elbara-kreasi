<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Client;
use App\Models\Product;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Exception;

class DatabaseSeeder extends Seeder
{

    private $faker = null;

    public function __construct()
    {
        $this->faker = \Faker\Factory::create();
    }
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(20)->create();

        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'username' => 'user',
            'email' => 'user@gmail.com',
            'role' => 'user',
            'password' => bcrypt('12345678'),
        ]);

        Category::create([
            'name' => 'Kemasan Makanan',
            'image'=> 'category-images/kemasan-makanan.webp',
            'header_image' => 'category-header-images/kemasan-makanan.webp',
            'slug' => 'kemasan-makanan',
        ]);

        Category::create([
            'name' => 'Kemasan Produk',
            'image'=> 'category-images/kemasan-produk.webp',
            'header_image' => 'category-header-images/kemasan-produk.webp',
            'slug' => 'kemasan-produk',
        ]);

        Category::create([
            'name' => 'Perlengkapan Kantor',
            'image'=> 'category-images/perlengkapan-kantor.webp',
            'header_image' => 'category-header-images/perlengkapan-kantor.webp',
            'slug' => 'perlengkapan-kantor',
        ]);

        Category::create([
            'name' => 'Kalender & Notes',
            'image'=> 'category-images/kalender-notes.webp',
            'header_image' => 'category-header-images/kalender-notes.webp',
            'slug' => 'kalender-notes',
        ]);

        
        
        try {
            $path = "storage/app/public/images-to-upload";
            $images = collect();
            if ($handle = opendir($path)) {
                while (false !== ($file = readdir($handle))) {
                    if ('.' === $file) continue;
                    if ('..' === $file) continue;
    
                    $name = Str::before($file, '.');
                    $filename = 'product-images/' . $file;
                    $images->push($file);
    
                    Product::create([
                        'category_id' => Category::all()->random()->id,
                        'name' => $name,
                        'slug' => SlugService::createSlug(Product::class, 'slug', $name),
                        'description' => $name . ' description',
                        'is_best_seller' => $this->faker->boolean(70),
                        'additional_information' => $name . ' additional information',
                        'image' => $filename,
                        'price' => $this->faker->numberBetween(1000, 100_000),
                    ]);
                }
                closedir($handle);
            }
            $images->each(function ($image) {
                Portfolio::create([
                    'title' => 'Portfolio ' . Str::before($image, '.'),
                    'slug' => SlugService::createSlug(Portfolio::class, 'slug', 'Portfolio ' . Str::before($image, '.')),
                    'client' => 'Client ' . Str::before($image, '.'),
                    'image' => 'portfolio-images/' . $image,
                    'product_id' => Product::all()->random()->id,
                ]);
            });
        }catch(Exception $e) {
            Product::factory(20)->create();
            Portfolio::factory(20)->create();
        }

        
    }
}
