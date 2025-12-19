<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('headline')->nullable();
            $table->text('about')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('footer_text')->nullable();
            $table->timestamps();
        });

        Schema::create('portfolio_skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('portfolio_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('portfolio_social_links', function (Blueprint $table) {
            $table->id();
            $table->string('platform');
            $table->string('url');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('portfolio_educations', function (Blueprint $table) {
            $table->id();
            $table->string('degree');
            $table->string('institute');
            $table->unsignedSmallInteger('start_year')->nullable();
            $table->unsignedSmallInteger('end_year')->nullable();
            $table->string('grade')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_educations');
        Schema::dropIfExists('portfolio_social_links');
        Schema::dropIfExists('portfolio_projects');
        Schema::dropIfExists('portfolio_skills');
        Schema::dropIfExists('portfolio_profiles');
    }
};

