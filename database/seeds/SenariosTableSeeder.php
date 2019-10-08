<?php

use Illuminate\Database\Seeder;

class SenariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('senarios')->insert([
            [
                'name' => 'tutorial',
                'seen_id' => '1',
                'data' => '{"effect":"message","text":"セリフ１","next_seen_id":"2"}',
            ],
            [
                'name' => 'tutorial',
                'seen_id' => '2',
                'data' => '{"effect":"message","text":"セリフ２長いセリフを表示、クリックで表示を早くできる","next_seen_id":"3"}',
            ],
            [
                'name' => 'tutorial',
                'seen_id' => '3',
                'data' => '{"img": "character1.png","effect":"fadeIn","element":"center","time":"2000","next_seen_id":"4"}',
            ],
            [
                'name' => 'tutorial',
                'seen_id' => '4',
                'data' => '{"effect":"message","text":"中央のキャラクタ表示","time":"2000","next_seen_id":"5"}',
            ],
            [
                'name' => 'tutorial',
                'seen_id' => '5',
                'data' => '{"effect":"message","text":"セリフ３","next_seen_id":"6"}',
            ],
            [
                'name' => 'tutorial',
                'seen_id' => '6',
                'data' => '{"effect":"message","text":"セリフ４","next_seen_id":"7"}',
            ],
            [
                'name' => 'tutorial',
                'seen_id' => '7',
                'data' => '{"img": "character2.png","effect":"fadeIn","element":"left","time":"2000","next_seen_id":"8"}',
            ],
            [
                'name' => 'tutorial',
                'seen_id' => '8',
                'data' => '{"effect":"message","text":"左のキャラクタ表示","next_seen_id":"9"}',
            ],
            [
                'name' => 'tutorial',
                'seen_id' => '9',
                'data' => '{"img": "character3.png","effect":"fadeIn","element":"right","time":"2000","next_seen_id":"10"}',
            ],
            [
                'name' => 'tutorial',
                'seen_id' => '10',
                'data' => '{"effect":"message","text":"右のキャラクタ表示","next_seen_id":"11"}',
            ],
            [
                'name' => 'tutorial',
                'seen_id' => '11',
                'data' => '{"effect": "question", "answers": [{"text": "はい", "next_seen_id": "12"}, {"text": "いいえ", "next_seen_id": "13"}]}',
            ],
            [
                'name' => 'tutorial',
                'seen_id' => '12',
                'data' => '{"text": "はい を選択時のメッセージ", "effect": "message", "next_seen_id": "14"}',
            ],
            [
                'name' => 'tutorial',
                'seen_id' => '13',
                'data' => '{"text": "いいえ を選択時のメッセージ", "effect": "message", "next_seen_id": "14"}',
            ],
            [
                'name' => 'tutorial',
                'seen_id' => '14',
                'data' => '{"url": "tutorial_end", "effect": "end"}',
            ],
            [
                'name' => 'event100',
                'seen_id' => '1',
                'data' => '{"img": "character1.png","effect":"fadeIn","element":"center","time":"1","next_seen_id":"2"}',
            ],
            [
                'name' => 'event100',
                'seen_id' => '2',
                'data' => '{"effect":"message","text":"ああああああああああああ","next_seen_id":"3"}',
            ],
            [
                'name' => 'event100',
                'seen_id' => '3',
                'data' => '{"effect":"message","text":"質問","next_seen_id":"4"}',
            ],
            [
                'name' => 'event100',
                'seen_id' => '4',
                'data' => '{"effect": "question", "answers": [{"text": "はい", "next_seen_id": "5"}, {"text": "いいえ", "next_seen_id": "6"}, {"text": "どちらでもない", "next_seen_id": "7"}]}',
            ],
            [
                'name' => 'event100',
                'seen_id' => '5',
                'data' => '{"effect":"message","text":"はい を選択時のメッセージ","next_seen_id":"8"}',
            ],
            [
                'name' => 'event100',
                'seen_id' => '6',
                'data' => '{"effect":"message","text":"いいえ を選択時のメッセージ","next_seen_id":"8"}',
            ],
            [
                'name' => 'event100',
                'seen_id' => '7',
                'data' => '{"effect":"message","text":"どちらでもない を選択時のメッセージ","next_seen_id":"8"}',
            ],
            [
                'name' => 'event100',
                'seen_id' => '8',
                'data' => '{"effect":"message","text":"いいいいいいいいいいいいいいいいいい","next_seen_id":"9"}',
            ],
            [
                'name' => 'event100',
                'seen_id' => '9',
                'data' => '{"effect":"message","text":"ううううううううううううう","next_seen_id":"10"}',
            ],
            [
                'name' => 'event100',
                'seen_id' => '10',
                'data' => '{"url": "event_end/100", "effect": "end"}',
            ],
            [
                'name' => 'event200',
                'seen_id' => '1',
                'data' => '{"img": "character2.png","effect":"fadeIn","element":"center","time":"2000","next_seen_id":"2"}',
            ],
            [
                'name' => 'event200',
                'seen_id' => '2',
                'data' => '{"img": "character3.png","effect":"fadeIn","element":"left","time":"1000","next_seen_id":"3"}',
            ],
            [
                'name' => 'event200',
                'seen_id' => '3',
                'data' => '{"effect":"message","text":"ええええええええええええ","next_seen_id":"4"}',
            ],
            [
                'name' => 'event200',
                'seen_id' => '4',
                'data' => '{"effect":"message","text":"おおおおおおおおおおおおおおおおお","next_seen_id":"5"}',
            ],
            [
                'name' => 'event200',
                'seen_id' => '5',
                'data' => '{"url": "event_end/200", "effect": "end"}',
            ],
            [
                'name' => 'event300',
                'seen_id' => '1',
                'data' => '{"img": "character3.png","effect":"fadeIn","element":"center","time":"2000","next_seen_id":"2"}',
            ],
            [
                'name' => 'event300',
                'seen_id' => '2',
                'data' => '{"img": "character1.png","effect":"fadeIn","element":"right","time":"1000","next_seen_id":"3"}',
            ],
            [
                'name' => 'event300',
                'seen_id' => '3',
                'data' => '{"effect":"message","text":"ええええええええええええ","next_seen_id":"4"}',
            ],
            [
                'name' => 'event300',
                'seen_id' => '4',
                'data' => '{"effect":"message","text":"おおおおおおおおおおおおおおおおお","next_seen_id":"5"}',
            ],
            [
                'name' => 'event300',
                'seen_id' => '5',
                'data' => '{"url": "event_end/300", "effect": "end"}',
            ],
            [
                'name' => 'event101',
                'seen_id' => '1',
                'data' => '{"effect":"message","text":"質問","next_seen_id":"2"}',
            ],
            [
                'name' => 'event101',
                'seen_id' => '2',
                'data' => '{"effect": "question", "answers": [{"text": "はい", "next_seen_id": "3"}, {"text": "いいえ", "next_seen_id": "4"}]}',
            ],
            [
                'name' => 'event101',
                'seen_id' => '3',
                'data' => '{"img": "character1.png","effect":"fadeIn","element":"center","time":"1000","next_seen_id":"6"}',
            ],
            [
                'name' => 'event101',
                'seen_id' => '4',
                'data' => '{"img": "character2.png","effect":"fadeIn","element":"center","time":"1000","next_seen_id":"7"}',
            ],
            [
                'name' => 'event101',
                'seen_id' => '6',
                'data' => '{"effect":"message","text":"AAAAAAAAAAAAAA","next_seen_id":"8"}',
            ],
            [
                'name' => 'event101',
                'seen_id' => '7',
                'data' => '{"effect":"message","text":"BBBBBBBBBBBB","next_seen_id":"8"}',
            ],
            [
                'name' => 'event101',
                'seen_id' => '8',
                'data' => '{"url": "event_end/101", "effect": "end"}',
            ],
        ]);
    }
}
