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
        Schema::create('request', function (Blueprint $table) {
            $table->string('requestID')->primary();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('route_id')->index();
            $table->enum('request_status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->string('request_date');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('route_id')->references('routeID')->on('routes')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request');
    }
};
