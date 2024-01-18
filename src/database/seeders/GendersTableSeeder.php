<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'gender' => '男',
        ];
        DB::table('genders')->insert($param);
        $param = [
            'gender' => '女',
        ];
        DB::table('genders')->insert($param);
        $param = [
            'gender' => 'その他',
        ];
        DB::table('genders')->insert($param);
        //
    }
}
