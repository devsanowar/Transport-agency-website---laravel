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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->text('slider_title');
            $table->string('slider_subtitle')->nullable();
            $table->text('slider_contents')->nullable();
            $table->text('slider_button_name')->nullable();
            $table->text('slider_button_link')->nullable();
            $table->text('slider_image')->default('slider-image.jpg');
            $table->text('slider_image_two')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
