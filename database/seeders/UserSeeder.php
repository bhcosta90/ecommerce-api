<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function (): void {
            User::factory()->create([
                'id'    => 'fe686827-fecf-4df7-89df-6feb74123f88',
                'name'  => 'Test User',
                'email' => 'test@example.com',
            ]);

            User::factory()->create([
                'id' => 'fe686827-fecf-4df7-89df-6feb74123f89',
            ]);

            User::factory(48)->create();
        });
    }
}
