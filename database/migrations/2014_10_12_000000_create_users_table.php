<?php

use App\Models\Rawafed\UserPermissionCache;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('first_name_ar');
            $table->string('first_name_en');
            $table->string('second_name_ar');
            $table->string('second_name_en');
            $table->string('third_name_ar');
            $table->string('third_name_en');
            $table->string('last_name_ar');
            $table->string('last_name_en');
            $table->integer('identity_no')->nullable();
            $table->string('mobile')->nullable();
            $table->string('image')->nullable();
            $table->boolean('image_flag');
            $table->tinyInteger('gender');
            $table->date('birth_date');
            $table->unsignedBigInteger('user_type_id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('complete');
            $table->unsignedBigInteger('profile_views')->default(0);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
            $table->datetime('last_login_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
