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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('avatar');
            $table->string('cover');
            $table->json('features')->nullable();
            $table->string('details')->nullable();
            $table->string('ar_details')->nullable();
            $table->string('image_symbol')->nullable();
            $table->json('gallery')->nullable();
            $table->string('description')->nullable();
            $table->string('ar_description')->nullable();
            $table->string('offer_title')->nullable();
            $table->string('ar_offer_title')->nullable();
            $table->string('offer_image')->nullable();
            $table->string('type')->default('product');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
