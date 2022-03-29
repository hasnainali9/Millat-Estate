<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->foreignId('city_id');
            $table->foreignId('state_id');
            $table->text('address');
            $table->string('area');
            $table->enum('area_type', ['marla', 'kanal', 'acre', 'square_feet']);
            $table->bigInteger('price');
            $table->longText('details');
            $table->longText('map_location');
            $table->longText('images');
            $table->enum('purpose', ['sell', 'rent']);
            $table->foreignId('category_id');
            $table->enum('type', ['home', 'plot', 'commercial']);
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('kitchens')->nullable();
            $table->boolean('electricity')->default(false);
            $table->boolean('water_supply')->default(false);
            $table->boolean('sui_gas')->default(false);
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
        Schema::dropIfExists('properties');
    }
}
