<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BroadcastTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name'=>__('tv.live'),'status'=> 1],
            ['name'=>__('tv.repetition'),'status'=> 1]
        ];
        DB::table('broadcast_types')->insert($types);
    }
}
