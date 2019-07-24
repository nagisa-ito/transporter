<?php

use Illuminate\Database\Seeder;

class TransportationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transportations')->insert([
            ['name' => '電車'],
            ['name' => 'バス'],
            ['name' => 'タクシー'],
            ['name' => '飛行機'],
        ]);
    }
}
