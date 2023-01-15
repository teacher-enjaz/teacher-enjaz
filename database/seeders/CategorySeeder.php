<?php

namespace Database\Seeders;
use App\Models\Projects\Category;
use App\Models\Projects\Evaluator;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name'=> 'الأولمبياد الوطني للبرمجة والذكاء الاصطناعي'],
            ['name'=> 'معرض فلسطين للعلوم والتكنولوجيا'],
        ];
        Category::insert($categories);
    }
}
