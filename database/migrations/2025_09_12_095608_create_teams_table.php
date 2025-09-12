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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('team_member_name');
            $table->string('team_member_designation');
            $table->string('team_member_phone');
            $table->string('team_member_email')->nullable();
            $table->text('team_member_about')->nullable();
            $table->text('team_member_address')->nullable();
            $table->string('team_member_image')->nullable();
            $table->string('team_member_facebook')->nullable();
            $table->string('team_member_linkeding')->nullable();
            $table->string('team_member_instagram')->nullable();
            $table->string('team_member_twitter')->nullable();
            $table->string('team_member_youtube')->nullable();
            $table->string('team_member_website')->nullable();
            $table->string('team_member_printerest')->nullable();
            $table->string('team_member_tiktok')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
