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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_title');
            $table->string('service_slug');
            $table->text('service_short_description')->nullable();
            $table->longText('service_long_description')->nullable();
            $table->longText('service_features')->nullable();
            $table->string('service_thumbnail')->default('thumbnail.jpg');
            $table->string('service_single_page_image')->default('thumbnail.jpg');

            $table->string('service_feature_title')->nullable();
            $table->string('service_feature_description')->nullable();
            $table->string('service_feature_image')->nullable();

            $table->string('service_featuretwo_title')->nullable();
            $table->string('service_featuretwo_description')->nullable();
            $table->string('service_featuretwo_image')->nullable();

            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
