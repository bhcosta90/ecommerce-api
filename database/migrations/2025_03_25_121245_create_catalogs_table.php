<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('catalogs', function (Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->foreignUuid('branch_id')->nullable()->constrained('branches');
            $table->unsignedTinyInteger('situation');
            $table->uuid('main_id')->nullable();
            $table->string('main_type')->nullable();
            $table->string('name');
            $table->string('sku')->unique();
            $table->string('is_variation')->nullable();
            $table->string('gtin')->nullable();
            $table->string('mpn')->nullable();
            $table->string('ncm')->nullable();
            $table->boolean('is_selling')->nullable();
            $table->boolean('is_prominently')->nullable();
            $table->boolean('is_visible')->nullable();
            $table->boolean('is_active')->nullable();
            $table->unsignedInteger('size_weight')->nullable();
            $table->unsignedInteger('size_height')->nullable();
            $table->unsignedInteger('size_width')->nullable();
            $table->unsignedInteger('size_depth')->nullable();
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('catalogs');
    }
};
