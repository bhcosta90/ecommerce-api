<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->foreignUuid('sector_id')->constrained('sectors');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['sector_id', 'name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
