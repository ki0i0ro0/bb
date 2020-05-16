<?php

use Illuminate\Database\Seeder;

class bbTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // テーブルのクリア
    DB::table('bbs')->truncate();

    // 初期データ用意（列名をキーとする連想配列）
    $bbList = [
              ['name' => 'PHP Book',
               'price' => 2000,
               'author' => 'PHPER'],
              ['name' => 'Laravel Book',
               'price' => 3000,
               'author' => null],
              ['name' => 'Ruby Book',
               'price' => 2500,
               'author' => 'Rubyist']
             ];

    // 登録
    foreach($bbList as $bb) {
      \App\bb::create($bb);
    }
    }
}
