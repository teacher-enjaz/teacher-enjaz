<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTypeSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EvaluatorSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CriteriaSeeder::class);
        $this->call(BroadcastTypeSeeder::class);
        $this->call(ProgramCategorySeeder::class);
        $this->call(BroadcastSeeder::class);
    }
}
