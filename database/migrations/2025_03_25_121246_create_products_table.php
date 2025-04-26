<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->foreignUuid('catalog_id')->constrained('catalogs');
            $table->unsignedTinyInteger('situation')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_sale')->default(true);
            $table->boolean('is_prominent')->nullable();
            $table->text('description')->nullable();
            $table->boolean('price_consultation')->nullable();
            $table->unsignedBigInteger('price_cost')->nullable();
            $table->unsignedBigInteger('price_sale')->nullable();
            $table->unsignedBigInteger('is_price')->default(true);
            $table->string('sku')->unique();
            $table->unsignedTinyInteger('available_at');
            $table->unsignedTinyInteger('finish_stock')->nullable();
            $table->unsignedBigInteger('total_stock')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
