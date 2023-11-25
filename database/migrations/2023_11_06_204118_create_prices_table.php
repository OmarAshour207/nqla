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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('truck_id');
            $table->unsignedBigInteger('truck_type_id')->nullable();
            $table->unsignedBigInteger('city_id');
            $table->foreign('truck_id')->references('id')->on('trucks')->onDelete('cascade');
            $table->foreign('truck_type_id')->references('id')->on('truck_types');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->decimal('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
