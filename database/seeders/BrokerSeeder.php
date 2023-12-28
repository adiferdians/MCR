<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\broker;
use Illuminate\Database\Seeder;

class BrokerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        broker::factory()->count(55)->create();
    }
}
