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
        Schema::create('truck_type_translations', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('truck_type_id')->unsigned();
            $table->foreign('truck_type_id')->references('id')->on('truck_types')->onDelete('cascade');

            $table->string('name');
            $table->string('locale');
            $table->unique(['truck_type_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('truck_type_translations');
    }
};
