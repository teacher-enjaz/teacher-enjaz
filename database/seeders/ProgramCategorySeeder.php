<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name'=>__('tv.learningVideos'),'status'=> 1],
            ['name'=>__('tv.programs'),'status'=> 1]
        ];
        DB::table('program_categories')->insert($types);
    }
}
