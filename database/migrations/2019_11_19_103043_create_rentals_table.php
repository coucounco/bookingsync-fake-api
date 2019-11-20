<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // https://developers.bookingsync.com/reference/endpoints/rentals/
        Schema::create('rentals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('absolute_min_price', 10, 2)->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->decimal('base_rate', 10, 2)->nullable();
            $table->string('base_rate_kind')->nullable();
            $table->integer('bathrooms_count')->nullable();
            $table->integer('bedrooms_count')->nullable();
            $table->boolean('bookable_online')->nullable();
            $table->text('checkin_details')->nullable();
            $table->text('checkout_details')->nullable();
            $table->integer('checkin_time')->nullable();
            $table->integer('checkout_time')->nullable();
            $table->string('city')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('country_code')->nullable();
            $table->string('currency')->nullable();
            $table->text('description')->nullable();
            $table->integer('downpayment')->nullable();
            $table->integer('final_price')->nullable();
            $table->string('floor')->nullable();
            $table->text('headline')->nullable();
            $table->integer('initial_price')->nullable();
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->decimal('max_price', 10, 2)->nullable();
            $table->decimal('min_price', 10, 2)->nullable();
            $table->string('name')->nullable();
            $table->boolean('nightly_rates_managed_externally')->nullable();
            $table->text('notes')->nullable();
            $table->string('permit_number')->nullable();
            $table->integer('position')->nullable();
            $table->text('price_public_notes')->nullable();
            $table->string('rental_type')->nullable();
            $table->decimal('reviews_average_rating', 10, 2)->nullable();
            $table->integer('reviews_count')->nullable();
            $table->integer('sleeps')->nullable();
            $table->integer('sleeps_max')->nullable();
            $table->string('state')->nullable();
            $table->integer('stories_count')->nullable();
            $table->text('summary')->nullable();
            $table->integer('surface')->nullable();
            $table->string('surface_unit')->nullable();
            $table->text('website_url')->nullable();
            $table->string('zip')->nullable();
            $table->string('residency_category')->nullable();
            $table->timestamps();
            $table->dateTime('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
