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
        Schema::create('load_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('load_id')->unsigned();
            $table->foreign('load_id')->references('id')->on('loads')->onDelete('cascade');

            $table->string('name');
            $table->string('locale');
            $table->unique(['load_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('load_translations');
    }
};
