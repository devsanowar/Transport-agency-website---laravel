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
        Schema::create('ctas', function (Blueprint $table) {
            $table->id();
            $table->string('cta_title')->nullable();
            $table->text('cta_content')->nullable();
            $table->string('cta_phone')->nullable();
            $table->string('cta_email')->nullable();
            $table->string('cta_button')->nullable();
            $table->string('cta_button_url')->nullable();
            $table->string('cta_bg_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ctas');
    }
};
