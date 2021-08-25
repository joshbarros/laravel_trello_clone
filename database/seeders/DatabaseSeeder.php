<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Card;
use App\Models\CardList;
use App\Models\User;
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
         \App\Models\User::factory(10)->create();

        $board1 = Board::create([
            'title' => 'Grocieries', 'color' => 'teal', 'owner_id' => 1
        ]);
        $board2 = Board::create([
            'title' => 'Work', 'color' => 'orange', 'owner_id' => 1
        ]);
        $board3 = Board::create([
            'title' => 'Hobby', 'color' => 'indigo', 'owner_id' => 1
        ]);

        collect([$board1, $board2, $board3])->each(function (Board $board) {
            $list1 = CardList::create([
                'title' => 'To-Do', 'board_id' => $board->id
            ]);
            $list2 = CardList::create([
                'title' => 'In Progress', 'board_id' => $board->id
            ]);
            $list3 = CardList::create([
                'title' => 'Done', 'board_id' => $board->id
            ]);

            collect([$list1, $list2, $list3])->each(function (CardList $list) use ($board) {
                $order = 1;
                collect([
                    'Item 1',
                    'Item 2',
                    'Item 3',
                    'Item 4',
                    'Item 5',
                    'Item 6'
                ])->random(random_int(2, 5))->each(function ( string $task) use ($board, $list, &$order) {
                    $list->cards()->save(
                        Card::make([
                            'title' => $task,
                            'owner_id' => $board->owner_id,
                            'order' => $order++
                        ])
                    );
                });
            });
        });
    }
}
