<?php

namespace Database\Seeders;

use App\Models\BodyActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodyActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //ActivityType::create(['name' => 'Infantil']);
        BodyActivity::create(['name' => 'Infantil']);
        BodyActivity::create(['name' => 'Primaria']);
        BodyActivity::create(['name' => 'E.S.O.']);
        BodyActivity::create(['name' => 'Bachillerato']);
        BodyActivity::create(['name' => 'Formación Profesional']);
    }
}
