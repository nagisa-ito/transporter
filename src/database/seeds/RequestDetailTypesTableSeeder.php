<?php

use Illuminate\Database\Seeder;

class RequestDetailTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_detail_types')->insert([
            ['name' => '通勤費'],
            ['name' => '定期代'],
            ['name' => '営業交通費'],
        ]);
    }
}
