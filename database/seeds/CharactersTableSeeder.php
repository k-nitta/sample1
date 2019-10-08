<?php

use Illuminate\Database\Seeder;

class CharactersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characters')->insert([
            [
                'character_name' => 'キャラクタ1',
                'img' => 'character1.png',
                'text' => 'キャラクタ1の説明',
            ],
            [
                'character_name' => 'キャラクタ2',
                'img' => 'character2.png',
                'text' => 'キャラクタ2の説明',
            ],
            [
                'character_name' => 'キャラクタ3',
                'img' => 'character3.png',
                'text' => 'キャラクタ3の説明',
            ],
        ]);
    }
}
