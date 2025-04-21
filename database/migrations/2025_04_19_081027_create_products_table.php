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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tagline')->nullable();
            $table->string('category');
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('faq')->nullable();
            $table->decimal('price', 19, 2);
            $table->integer('quantity')->default(0);
            $table->string('photos')->nullable(); // Store multiple images as JSON
            $table->string('thumbnail_img')->nullable();
            $table->string('hover_img')->nullable();
            $table->string('video_img')->nullable();
            $table->string('video_link')->nullable();
            $table->decimal('discount', 19, 2)->default(0); // % based, or adapt as needed
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
