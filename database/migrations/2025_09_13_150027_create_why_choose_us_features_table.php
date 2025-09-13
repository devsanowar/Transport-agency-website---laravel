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
        Schema::create('why_choose_us_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('why_choose_id')->constrained('why_choose_us')->onDelete('cascade');
            $table->string('icon', 255)->nullable();
            $table->string('title', 255);
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_choose_us_features');
    }
};
