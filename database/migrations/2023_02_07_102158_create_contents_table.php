<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreignId('classification_id')
                ->references('id')
                ->on('classifications')
                ->onDelete('cascade');
            $table->foreignId('content_type_id')
                ->references('id')
                ->on('content_type')
                ->onDelete('cascade');
            $table->string('title',255);
            $table->boolean('allow_comments',1);
            $table->integer('likes');
            $table->integer('views');
            $table->boolean('status',1);
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
        Schema::dropIfExists('contents');
    }
}
