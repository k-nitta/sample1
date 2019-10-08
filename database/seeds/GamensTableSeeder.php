<?php

use Illuminate\Database\Seeder;

class GamensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gamens')->insert([
            [
                'url' => 'tutorial',
                'level' => '1',
            ],
            [
                'url' => 'tutorial_end',
                'level' => '1',
            ],
            [
                'url' => 'character_select',
                'level' => '1',
            ],
            [
                'url' => 'event/100',
                'level' => '2',
            ],
            [
                'url' => 'event/200',
                'level' => '2',
            ],
            [
                'url' => 'event/300',
                'level' => '2',
            ],
            [
                'url' => 'event/101',
                'level' => '2',
            ],
            [
                'url' => 'event_end/100',
                'level' => '98',
            ],
            [
                'url' => 'event_end/200',
                'level' => '98',
            ],
            [
                'url' => 'event_end/300',
                'level' => '98',
            ],
            [
                'url' => 'event_end/101',
                'level' => '98',
            ],
            [
                'url' => 'mypage_character_select',
                'level' => '98',
            ],
            [
                'url' => 'mypage',
                'level' => '99',
            ],
        ]);
    }
}
