<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Sector;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function(){
            Department::query()->each(function($department){
                Sector::factory(5)->create([
                    'department_id' => $department->id,
                ]);
            });
        });
    }
}
