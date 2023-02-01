<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSectionSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_section_settings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            
            $table->boolean('qualifications_section')->default(1);
            $table->boolean('experiences_section')->default(1);
            $table->boolean('courses_section')->default(1);
            $table->boolean('skills_section')->default(1);
            $table->boolean('languages_section')->default(1);
            $table->boolean('memberships_section')->default(1);
            $table->boolean('social_accounts_section')->default(1);
            $table->boolean('articles_section')->default(1);
            $table->boolean('initiatives_section')->default(1);
            $table->boolean('achievements_section')->default(1);
            $table->boolean('awards_section')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_section_settings');
    }
}
