<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('catalog_categories', function (Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->foreignUuid('catalog_id')->constrained('catalogs');
            $table->foreignUuid('department_id')->constrained('departments');
            $table->foreignUuid('sector_id')->nullable()->constrained('sectors');
            $table->foreignUuid('category_id')->nullable()->constrained('categories');
            $table->foreignUuid('sub_category_id')->nullable()->constrained('sub_categories');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('catalog_categories');
    }
};
