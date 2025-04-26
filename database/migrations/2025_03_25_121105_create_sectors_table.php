<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('sectors', function (Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->foreignUuid('department_id')->constrained('departments');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['department_id', 'name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sectors');
    }
};
