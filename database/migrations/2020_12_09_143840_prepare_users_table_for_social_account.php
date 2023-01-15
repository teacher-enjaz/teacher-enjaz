<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrepareUsersTableForSocialAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // make email & password nullable
            $table->string('email')->nullable()->change();
            $table->string('password')->nullable()->change();
            $table->string('first_name_ar')->nullable()->change();
            $table->string('first_name_en')->nullable()->change();
            $table->string('second_name_ar')->nullable()->change();
            $table->string('second_name_en')->nullable()->change();
            $table->string('third_name_ar')->nullable()->change();
            $table->string('third_name_en')->nullable()->change();
            $table->string('last_name_ar')->nullable()->change();
            $table->string('last_name_en')->nullable()->change();
            $table->string('identity_no')->nullable()->change();
            $table->string('mobile')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->string('birth_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->nullable(false)->change();
            $table->string('password')->nullable(false)->change();
            $table->string('first_name_ar')->nullable()->change();
            $table->string('first_name_en')->nullable()->change();
            $table->string('second_name_ar')->nullable()->change();
            $table->string('second_name_en')->nullable()->change();
            $table->string('third_name_ar')->nullable()->change();
            $table->string('third_name_en')->nullable()->change();
            $table->string('last_name_ar')->nullable()->change();
            $table->string('last_name_en')->nullable()->change();
            $table->string('identity_no')->nullable(false)->change();
            $table->string('mobile')->nullable(false)->change();
            $table->string('gender')->nullable(false)->change();
            $table->string('birth_date')->nullable(false)->change();
        });
    }
}
