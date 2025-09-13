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
        Schema::create('about_page_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('about_tag_line')->nullable();
            $table->string('about_section_title');
            $table->string('about_section_highlight_title')->nullable();
            $table->longText('about_description');
            $table->string('about_founder_name')->nullable();
            $table->string('about_founder_designation')->nullable();
            $table->string('about_founder_founder_image')->default('default.jpg');
            $table->string('about_image')->default('default.jpg');
            $table->string('about_imageTwo')->default('default.jpg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_page_abouts');
    }
};
