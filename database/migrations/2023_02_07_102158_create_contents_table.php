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
            $table->string('title',255);
            $table->boolean('allow_comments')->default(1);
            $table->integer('likes')->default(0);
            $table->integer('views')->default(0);
            $table->string('status',20);
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
                ->on('content_types')
                ->onDelete('cascade');
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
