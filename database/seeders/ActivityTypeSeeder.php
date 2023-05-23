<?php

namespace Database\Seeders;

use App\Models\ActivityType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ActivityType::create(['name' => 'Conferencias']);
        ActivityType::create(['name' => 'Seminarios']);
        ActivityType::create(['name' => 'Mesas de Trabajo']);
        ActivityType::create(['name' => 'Bachillerato']);
        ActivityType::create(['name' => 'Exposiciones de material didáctico']);
    }
}
