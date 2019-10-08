<?php

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
        $this->call([
            CharactersTableSeeder::class,
            EventsTableSeeder::class,
            GamensTableSeeder::class,
            ItemsTableSeeder::class,
            SenariosTableSeeder::class,
        ]);

        // composer dump-autoload
        
        // php artisan db:seed

        // php artisan db:seed --class=UsersTableSeeder
        
        // php artisan migrate:refresh --seed
    }
}
