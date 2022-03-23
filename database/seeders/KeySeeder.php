<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keys')->insert([
            [
                'key_1' => 'Ctrl',
                'key_2' => 'C',
                'content' => '内容のコピー',
                'created_at' => '2022/03/03 11:11:11',
                'admin_id' => '1'
            ],
            [
                'key_1' => 'Ctrl',
                'key_2' => 'V',
                'content' => '内容の貼り付け',
                'created_at' => '2022/03/03 11:11:11',
                'admin_id' => '1'
            ],
            [
                'key_1' => 'Ctrl',
                'key_2' => 'X',
                'content' => '内容の切り取り',
                'created_at' => '2022/03/03 11:11:11',
                'admin_id' => '1',
            ]
        ]);
    }
}
