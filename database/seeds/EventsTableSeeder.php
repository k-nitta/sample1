<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'event' => 'tutorial',
                'title' => '序章',
                'detail' => 'チュートリアルの開始　シナリオ処理によりサーバーと通信して、シナリオを進める',
                'back_img' => 'img1.jpg',
                'item_id' => '1',
            ],
            [
                'event' => 'event100',
                'title' => '第一話',
                'detail' => 'キャラクター1のシナリオ1',
                'back_img' => 'img1.jpg',
                'item_id' => '1',
            ],
            [
                'event' => 'event200',
                'title' => '第一話',
                'detail' => 'キャラクター2のシナリオ1',
                'back_img' => 'img4.jpg',
                'item_id' => '2',
            ],
            [
                'event' => 'event300',
                'title' => '第一話',
                'detail' => 'キャラクター3のシナリオ1',
                'back_img' => 'img3.jpg',
                'item_id' => '3',
            ],
            [
                'event' => 'event101',
                'title' => '第二話',
                'detail' => 'キャラクター1のシナリオ2',
                'back_img' => 'img1.jpg',
                'item_id' => '5',
            ],
        ]);
    }
}
