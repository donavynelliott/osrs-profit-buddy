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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id')->unique();
            $table->string('name')->nullable();
            $table->string('examine')->nullable();
            $table->boolean('members')->default(true);
            $table->integer('lowalch')->nullable();
            $table->integer('highalch')->nullable();
            $table->integer('limit')->default(0);
            $table->integer('value')->default(0);
            $table->integer('high')->nullable()->default(0);
            $table->integer('low')->nullable()->default(0);
            $table->dateTime('highTime')->nullable()->default(null);
            $table->dateTime('lowTime')->nullable()->default(null);
            $table->integer('avgHighPrice')->nullable()->default(0);
            $table->integer('highPriceVolume')->nullable()->default(0);
            $table->integer('avgLowPrice')->nullable()->default(0);
            $table->integer('lowPriceVolume')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
