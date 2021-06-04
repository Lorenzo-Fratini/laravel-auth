<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {

            $table -> foreign('brand_id', 'car-brand')
                   -> references('id')
                   -> on('brands');
        });
        Schema::table('car_pilot', function (Blueprint $table) {

            $table -> foreign('car_id', 'car-pilot')
                   -> references('id')
                   -> on('cars');
            $table -> foreign('pilot_id', 'pilot-car')
                   -> references('id')
                   -> on('pilots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {

            $table -> dropForeign('car-brand');
        });
        Schema::table('car_pilot', function (Blueprint $table) {

            $table -> dropForeign('car-pilot');
            $table -> dropForeign('pilot-car');
        });
    }
}
