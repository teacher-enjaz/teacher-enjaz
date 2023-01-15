<?php

namespace Database\Seeders;

use App\Models\Rawafed\Admin;
use App\Models\Rawafed\Role;
use App\Models\Rawafed\UserType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_type= UserType::select('id')->where('name_ar','=',__('dashboard.superAdmin'))->first();

        $user1=User::create([
            'name_ar' => 'إيمان كلاب',
            'name_en' => 'Eman Kullab',
            'email' => 'emankullab@gmail.com',
            'password' => Hash::make('mohammed/87'),
            'first_name_ar'=>'إيمان',
            'first_name_en'=>'Eman',
            'second_name_ar'=>'محمد بدر',
            'second_name_en'=>'Mohammed Bader',
            'third_name_ar'=>'محمد',
            'third_name_en'=>'Mohammed',
            'last_name_ar'=>'كلاب',
            'last_name_en'=>'Kullab',
            'identity_no'=>801120791,
            'user_type_id'=>$user_type->id,
            'mobile'=>'0599445725',
            'image'=>'female.png',
            'image_flag'=> 0,
            'gender'=>2,
            'birth_date'=>'1987-01-01',
            'complete'=>1,
            'profile_views'=>0,
        ]);
        $user2=User::create([
            'name_ar' => 'صفاء جودة',
            'name_en' => 'Safaa Jouda',
            'email' => 'safabaz860@gmail.com',
            'password' => Hash::make('muneer/86'),
            'first_name_ar'=>'صفاء',
            'first_name_en'=>'Safaa',
            'second_name_ar'=>'محمد',
            'second_name_en'=>'Mohammed',
            'third_name_ar'=>'خليل',
            'third_name_en'=>'Khalil',
            'last_name_ar'=>'جودة',
            'last_name_en'=>'Jouda',
            'identity_no'=>801538984,
            'user_type_id'=>$user_type->id,
            'mobile'=>'0599488021',
            'image'=>'female.png',
            'image_flag'=> 0,
            'gender'=>2,
            'birth_date'=>'1986-07-13',
            'complete'=>1,
            'profile_views'=>0,
        ]);

        $role = Role::select('*')->where('slug','=','super-admin')->first();
        $user1->role()->attach($role->id);
        $user2->role()->attach($role->id);

        $permissions = $role->permission->pluck('id')->toArray();
        $user1->permission()->attach($permissions);
        $user2->permission()->attach($permissions);

        Admin::create([
            'user_id' => $user1->id,
            'directorate_id' => 1
        ]);
        Admin::create([
            'user_id' => $user2->id,
            'directorate_id' => 1
        ]);
    }

}
