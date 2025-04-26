<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class BranchSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            Branch::factory(5)->create();
        });
    }
}
