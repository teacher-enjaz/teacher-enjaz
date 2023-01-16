<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGeoPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo_places', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar',100);
            $table->string('name_en',100);
            $table->boolean('status');
            $table->timestamps();
        });
        DB::table('geo_places')->insert(
            array(
                'name_ar' => 'قطاع غزة',
                'name_en' => 'Gaza Strip',
                'status' => 1
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
        Schema::dropIfExists('geo_places');
    }
}
