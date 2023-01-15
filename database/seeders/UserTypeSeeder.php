<?php

namespace Database\Seeders;

use App\Models\Rawafed\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_types =
            [
                [
                    'name_ar'=>__('dashboard.superAdmin',[],'ar'),
                    'name_en'=>__('dashboard.superAdmin',[],'en')
                ],
                [
                    'name_ar'=>__('dashboard.admin',[],'ar'),
                    'name_en'=>__('dashboard.admin',[],'en')
                ],
                [
                    'name_ar'=>__('dashboard.eLearning',[],'ar'),
                    'name_en'=>__('dashboard.eLearning',[],'en')
                ],
                [
                    'name_ar'=>__('dashboard.supervisor',[],'ar'),
                    'name_en'=>__('dashboard.supervisor',[],'en'),
                ],
                [
                    'name_ar'=>__('dashboard.ministryCommittee',[],'ar'),
                    'name_en'=>__('dashboard.ministryCommittee',[],'en'),
                ],
                [
                    'name_ar'=>__('dashboard.teacher',[],'ar'),
                    'name_en'=>__('dashboard.teacher',[],'en'),
                ],
                [
                    'name_ar'=>__('dashboard.user',[],'ar'),
                    'name_en'=>__('dashboard.user',[],'en'),
                ],
                [
                    'name_ar'=>__('dashboard.student',[],'ar'),
                    'name_en'=>__('dashboard.student',[],'en'),
                ],
                [
                    'name_ar'=>__('dashboard.superMonitor',[],'ar'),
                    'name_en'=>__('dashboard.superMonitor',[],'en'),
                ],
                [
                    'name_ar'=>__('dashboard.monitor',[],'ar'),
                    'name_en'=>__('dashboard.monitor',[],'en'),
                ],
            ];
        DB::table('user_types')->insert($user_types);
    }
}
