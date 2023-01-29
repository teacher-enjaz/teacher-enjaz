<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_qualifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreignId('qualification_id')
                ->references('id')
                ->on('qualifications')
                ->onDelete('cascade');
            $table->foreignId('specialization_id')
                ->references('id')
                ->on('specializations')
                ->onDelete('cascade');
            $table->foreignId('university_id')
                ->references('id')
                ->on('universities')
                ->onDelete('cascade');
            $table->foreignId('graduated_country_id')
                ->references('id')
                ->on('graduated_countries')
                ->onDelete('cascade');
            $table->integer('graduation_year');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('user_qualifications');
    }
}
