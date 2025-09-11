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
        Schema::create('home_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->nullable();
            $table->text('title_main')->nullable();
            $table->text('title_highlight')->nullable();
            $table->longText('description_one')->nullable();
            $table->longText('description_two')->nullable();
            $table->integer('counter_number')->default(0);
            $table->string('counter_label')->nullable();
            $table->string('progress_one_title')->nullable();
            $table->integer('progress_one_value')->default(0);
            $table->string('progress_two_title')->nullable();
            $table->integer('progress_two_value')->default(0);
            $table->string('point_one')->nullable();
            $table->string('point_two')->nullable();
            $table->string('point_three')->nullable();
            $table->string('point_four')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('author_name')->nullable();
            $table->string('author_designation')->nullable();
            $table->string('author_image')->nullable();
            $table->string('video_link')->nullable();
            $table->string('image_one')->nullable();
            $table->string('image_two')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_abouts');
    }
};
