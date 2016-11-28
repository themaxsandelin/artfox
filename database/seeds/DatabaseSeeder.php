<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
    {
        Model::unguard();

        $this->call('UsersTableSeeder');
        $this->command->info('Users table seeded!');
        
        $this->call('ArticlesTableSeeder');
        $this->command->info('Articles table seeded!');
        
        $this->call('CategoriesTableSeeder');
        $this->command->info('Categories table seeded!');
    }

}
