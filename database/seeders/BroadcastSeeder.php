<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BroadcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'broadcast_url'=>'https://youtu.be/zgiHtUlvx8k',
            'status'=> 1 ,
        ];
        DB::table('broadcasts')->insert($types);
    }
}
