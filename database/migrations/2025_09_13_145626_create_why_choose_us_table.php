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
        Schema::create('why_choose_us', function (Blueprint $table) {
            $table->id();
            $table->string('why_choose_us_title');
            $table->string('why_choose_us_subtitle')->nullable();
            $table->longText('why_choose_us_description')->nullable();
            $table->string('why_choose_us_button_text')->nullable();
            $table->string('why_choose_us_button_link')->nullable();
            $table->string('why_choose_us_bg_image')->nullable();
            $table->string('why_choose_us_shape_image')->nullable();
            $table->string('why_choose_us_truck_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_choose_us');
    }
};
