<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'type' => '1',
                'name' => '服1',
                'detail' => 'アイテム 服1',
                'img' => 'fuku1.png',
            ],
            [
                'type' => '1',
                'name' => '服2',
                'detail' => 'アイテム 服2',
                'img' => 'fuku2.png',
            ],
            [
                'type' => '1',
                'name' => '服3',
                'detail' => 'アイテム 服3',
                'img' => 'fuku3.png',
            ],
            [
                'type' => '99',
                'name' => 'マイルーム1 アイテム',
                'detail' => 'マイルーム1',
                'img' => 'myRoom1.png',
            ],
            [
                'type' => '99',
                'name' => 'マイルーム2 アイテム',
                'detail' => 'マイルーム2',
                'img' => 'myRoom2.png',
            ],
            [
                'type' => '99',
                'name' => 'マイルーム3 アイテム',
                'detail' => 'マイルーム3',
                'img' => 'myRoom3.png',
            ],
        ]);
    }
}
