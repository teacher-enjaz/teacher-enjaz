<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements', function (Blueprint $table) {

            $table->id();
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
//            $table->enum('status',['draft','published']);
            $table->boolean('status');
            $table->string('slug')->unique();
            $table->foreignId('content_id')->references('id')->on('contents')->onDelete('cascade');
            $table->foreignId('classification_id')->references('id')->on('classifications')->onDelete('cascade');
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
        Schema::dropIfExists('achievements');
    }
}
