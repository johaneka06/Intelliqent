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
        ]);
    }
}
