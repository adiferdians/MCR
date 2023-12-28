<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\certification_body;
use Illuminate\Database\Seeder;

class CertificationBodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        certification_body::factory()->count(55)->create();
    }
}
