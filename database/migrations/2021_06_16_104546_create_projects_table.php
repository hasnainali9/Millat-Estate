<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->foreignId('city_id');
            $table->foreignId('state_id');
            $table->text('address');
            $table->bigInteger('price_from');
            $table->bigInteger('price_to');
            $table->longText('details');
            $table->longText('map_location');
            $table->longText('images');
            $table->boolean('parking')->default(false);
            $table->boolean('electricity')->default(false);
            $table->boolean('water_supply')->default(false);
            $table->boolean('sui_gas')->default(false);
            $table->boolean('mosque')->default(false);
            $table->boolean('swimming_pool')->default(false);
            $table->boolean('school')->default(false);
            $table->boolean('hospital')->default(false);
            $table->boolean('shopping_mall')->default(false);
            $table->boolean('restaurant')->default(false);
            $table->boolean('public_transport')->default(false);
            $table->boolean('security')->default(false);
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('projects');
    }
}
