<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['category_name' => 'C'],
            ['category_name' => 'Java'],
            ['category_name' => 'Python'],
            ['category_name' => 'Php'],
            ['category_name' => 'Go'],
            ['category_name' => 'SQL Database'],
            ['category_name' => 'NoSQL Database'],
        ]);
    }
}
