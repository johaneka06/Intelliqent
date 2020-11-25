<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
            ["category_id" => "1", "material_name" => "Basic C Programming", "material_description" => "This course contains the fundamental element of C programming. This course is recommended for you who is new to this programming language"],
            ["category_id" => "1", "material_name" => "Data Structure in C", "material_description" => "A Data Structure is a way of organizing the data in a computer so that it can be used efficiently. This course provides students with data structure basic concept in which will be frequently used in software engineering and programming practices, concept of array, structure, linked list, stack, queue, graph, and trees."],
            ["category_id" => "2", "material_name" => "Introduction to Java", "material_description" => "This course is consist of what is java?, how to configure java development environment, and basic java programming"],
            ["category_id" => "2", "material_name" => "Java and Object Oriented", "material_description" => "OOP is the latest of programming paradigms and now almost all of the industry uses these paradigms to develop the application program. The main features are ADT, inheritance, dynamic binding to perform true polymorphism, generic programming and others."],

        ]);
    }
}
