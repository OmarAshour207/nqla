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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('user_email')->nullable();

            $table->string('track_id')->unique()->index();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('truck_id');
            $table->foreign('truck_id')->references('id')->on('trucks')->onDelete('cascade');

            $table->unsignedBigInteger('truck_type_id');
            $table->foreign('truck_type_id')->references('id')->on('truck_types')->onDelete('cascade');

            $table->unsignedBigInteger('load_id');
            $table->foreign('load_id')->references('id')->on('loads')->onDelete('cascade');

            // Pending Processing Delivered
            $table->string('delivery_status')->default('pending');

            $table->string('payment_status')->default('pending');

            $table->integer('quantity')->default(1);

            $table->decimal('vat')->default(0.0);
            $table->decimal('commission')->default(0.0);

            $table->decimal('discount')->nullable();

            $table->decimal('sub_total');
            $table->decimal('total');

            $table->dateTime('time');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
