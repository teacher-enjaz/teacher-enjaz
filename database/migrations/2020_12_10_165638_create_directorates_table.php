<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDirectoratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directorates', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->boolean('status');
            $table->unsignedBigInteger('geo_place_id');
            $table->timestamps();

            $table->foreign('geo_place_id')
                ->references('id')
                ->on('geo_places')
                ->onDelete('cascade');
        });
        DB::table('directorates')->insert(
            array(
                'name_ar' => 'وزارة التربية والتعليم العالي',
                'name_en' => 'Ministry of High Education',
                'status' => 1,
                'geo_place_id' => 1
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directorates');
    }
}
