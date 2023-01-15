<?php

namespace Database\Seeders;
use App\Models\Projects\Evaluator;
use Illuminate\Database\Seeder;

class EvaluatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name'=> 'eman', 'password'=> bcrypt('eman/1987')],
            ['name'=> 'admin', 'password'=> bcrypt('admin/2022')],
            ['name'=> 'judge1', 'password'=> bcrypt('123456789')],
            ['name'=> 'judge2', 'password'=> bcrypt('123456789')],
            ['name'=> 'judge3', 'password'=> bcrypt('123456789')],
            ['name'=> 'judge4', 'password'=> bcrypt('123456789')],
            ['name'=> 'judge5', 'password'=> bcrypt('123456789')],
            ['name'=> 'judge6', 'password'=> bcrypt('123456789')],

        ];
        Evaluator::insert($users);
    }
}
