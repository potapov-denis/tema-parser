<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
	    Schema::create('offers', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('internal_id')->nullable();
		    $table->string('type')->nullable();
		    $table->string('property_type')->nullable();
		    $table->string('category')->nullable();
		    $table->string('url')->nullable();
		    $table->boolean('payed_adv')->nullable();
		    $table->boolean('manually_added')->nullable();
		    $table->date('creation_date')->nullable();
		    $table->date('last_update_date')->nullable();
		    $table->string('location_country')->nullable();
		    $table->string('location_region')->nullable();
		    $table->string('location_locality_name')->nullable();
		    $table->string('location_address')->nullable();
		    $table->string('location_latitude')->nullable();
		    $table->string('location_longitude')->nullable();
		    $table->string('sales_agent_name')->nullable();
		    $table->integer('sales_agent_agency_id')->nullable();
		    $table->string('price_value')->nullable();
		    $table->string('price_currency')->nullable();
		    $table->string('price_period')->nullable();
		    $table->longText('images')->nullable();
		    $table->string('renovation')->nullable();
		    $table->longText('description')->nullable();
		    $table->float('area_value')->nullable();
		    $table->string('area_unit')->nullable();
		    $table->integer('rooms')->nullable();
		    $table->integer('rooms_offered')->nullable();
		    $table->string('internet')->nullable();
		    $table->integer('television')->nullable();
		    $table->integer('washing_machine')->nullable();
		    $table->integer('refrigerator')->nullable();
		    $table->integer('floor')->nullable();
		    $table->integer('floors_total')->nullable();
		    $table->integer('rent_pledge')->nullable();
		    $table->string('param')->nullable();
	    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
