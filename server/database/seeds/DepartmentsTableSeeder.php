<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            ['name' => 'セールスマーケティング部'],
            ['name' => 'CRM戦略推進部'],
            ['name' => 'CRMマネジメントサービス部'],
            ['name' => '開発部'],
            ['name' => '管理部'],
            ['name' => '日本通販CRM協会'],
            ['name' => '事業開発室'],
        ]);
    }
}
