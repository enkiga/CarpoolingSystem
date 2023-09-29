<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->string('routeID')->primary();
            $table->string('vehicle_id')->index();
            $table->string('route_from');
            $table->string('route_to');
            $table->time('route_time');
            $table->string('route_price');
            $table->timestamps();

            $table->foreign('vehicle_id')->references('vehicleID')->on('vehicles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
