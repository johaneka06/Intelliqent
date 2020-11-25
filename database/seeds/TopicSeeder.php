<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert([
            ['material_id' => '1', 'topic_name' => 'Features & The First C Program', 'topic_description' => 'This topics discuss about programming in C and C features', 'topic_video' => 'https://www.youtube.com/embed/rLf3jnHxSmU'],
            ['material_id' => '1', 'topic_name' => 'Introduction to variables', 'topic_description' => 'This topics discuss about what is variables, how to use them, and what is the function of it', 'topic_video' => 'https://www.youtube.com/embed/fO4FwJOShdc'],
            ['material_id' => '1', 'topic_name' => 'Basic Output - printf', 'topic_description' => 'This topics discuss about how to display something on screen using printf function', 'topic_video' => 'https://www.youtube.com/embed/VXol2-SoUy8'],
            ['material_id' => '2', 'topic_name' => 'Introduction to Data Structure', 'topic_description' => 'This topics discuss about data structure using C', 'topic_video' => 'https://www.youtube.com/embed/4OGMB4Fhh50'],
            ['material_id' => '2', 'topic_name' => 'Types of Data Structure', 'topic_description' => 'This topics types of data structure that is used in computer science', 'topic_video' => 'https://www.youtube.com/embed/T9DSBhBR_I4'],
            ['material_id' => '2', 'topic_name' => 'Dynamic Memory Allocation using malloc()', 'topic_description' => 'This topics discuss about memory allocation using malloc function', 'topic_video' => 'https://www.youtube.com/embed/Vch7_YeGKH4'],
        ]);
    }
}
