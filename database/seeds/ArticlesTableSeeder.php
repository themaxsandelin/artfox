<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder {

    public function run()
    {
        // Kommentera denna för att inte radera all data i tabellen
        DB::table('articles')->delete();

        $articles = array(
            [
                'title' => 'Produkt 1',
                'image' => 'product.png',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' ,
                'price' => '200',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'creator' => '1',
                'published' => 1,
                'article_number' => rand(100000000, 1000000000),
            ],
            [
                'title' => 'Produkt 2',
                'image' => 'product.png',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' ,
                'price' => '200',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'creator' => '1',
                'published' => 1,
                'article_number' => rand(100000000, 1000000000),
                  
            ],
            [
                'title' => 'Produkt 3',
                'image' => 'product.png',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' ,
                'price' => '200',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'creator' => '2', 
               	'published' => 1,
               	'article_number' => rand(100000000, 1000000000),  
            ],
            [
                'title' => 'Produkt 4',
                'image' => 'product.png',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' ,
                'price' => '200',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'creator' => '2',
                'published' => 1,
                'article_number' => rand(100000000, 1000000000),
            ],
        );

        DB::table('articles')->insert($articles);
    }
}
