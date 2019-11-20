<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bedrooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rental_id');
            $table->text('name');
            $table->integer('bunk_beds_count');
            $table->integer('double_beds_count');
            $table->integer('kingsize_beds_count');
            $table->integer('queensize_beds_count');
            $table->integer('single_beds_count');
            $table->integer('sofa_beds_count');
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
        Schema::dropIfExists('bedrooms');
    }
}
