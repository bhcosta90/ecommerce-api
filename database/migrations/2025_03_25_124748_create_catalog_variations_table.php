<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('catalog_variations', function (Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->foreignUuid('catalog_id')->constrained('catalogs');
            $table->integer('variation');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('catalog_variations');
    }
};
