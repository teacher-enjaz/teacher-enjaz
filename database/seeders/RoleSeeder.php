<?php

namespace Database\Seeders;

use App\Models\Rawafed\Permission;
use App\Models\Rawafed\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'slug'=>'super-admin',
                'name_ar'=>__('dashboard.superAdmin',[],'ar'),
                'name_en'=>__('dashboard.superAdmin',[],'en')
            ],
            [
                'slug'=>'admin',
                'name_ar'=>__('dashboard.admin',[],'ar'),
                'name_en'=>__('dashboard.admin',[],'en')
            ],
            [
                'slug'=>'e-learning',
                'name_ar'=>__('dashboard.eLearning',[],'ar'),
                'name_en'=>__('dashboard.eLearning',[],'en')
            ],
            [
                'slug'=>'supervisor',
                'name_ar'=>__('dashboard.supervisor',[],'ar'),
                'name_en'=>__('dashboard.supervisor',[],'en'),
            ],
            [
                'slug'=>'ministry-committee',
                'name_ar'=>__('dashboard.ministryCommittee',[],'ar'),
                'name_en'=>__('dashboard.ministryCommittee',[],'en'),
            ],
            [
                'slug'=>'teacher',
                'name_ar'=>__('dashboard.teacher',[],'ar'),
                'name_en'=>__('dashboard.teacher',[],'en'),
            ],
            [
                'slug'=>'user',
                'name_ar'=>__('dashboard.user',[],'ar'),
                'name_en'=>__('dashboard.user',[],'en'),
            ],
            [
                'slug'=>'student',
                'name_ar'=>__('dashboard.student',[],'ar'),
                'name_en'=>__('dashboard.student',[],'en'),
            ],
            [
                'slug'=>'super-lab-monitor',
                'name_ar'=>__('dashboard.superMonitor',[],'ar'),
                'name_en'=>__('dashboard.superMonitor',[],'en'),
            ],
            [
                'slug'=>'lab-monitor',
                'name_ar'=>__('dashboard.monitor',[],'ar'),
                'name_en'=>__('dashboard.monitor',[],'en'),
            ],
        ];

        Role::insert($roles);
        $permissions = Permission::all()->pluck('id')->toArray();
        $superAdmin = Role::select('*')->where('slug','super-admin')->first();

        /********  give super-admin all permissions *********/
        $superAdmin->permission()->attach($permissions);
    }
}
