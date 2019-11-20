<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBathroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bathrooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rental_id');
            $table->text('name');
            $table->integer('bath_count');
            $table->integer('shower_count');
            $table->integer('wc_count');
            $table->timestamps();

            $table->foreign('rental_id')
                ->references('id')->on('rentals')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bathrooms');
    }
}
