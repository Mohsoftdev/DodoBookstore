<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Publisher::create(['name' => 'Black Bay Books']); // The Tipping Point
        Publisher::create(['name' => 'Plata Publishing']); //Rich dad Poor Dad
        Publisher::create(['name' => 'Harvard Business Review Press']); // Blue Ocean Strategy
        Publisher::create(['name' => 'O`Reilly Media']); // React Books
        Publisher::create(['name' => 'Profile Books Ltd']); // Why Nations Fail
        Publisher::create(['name' => 'Currency']); // The Fourth Industrial Revolution
        Publisher::create(['name' => 'Simon & Schuster UK']); // Chip War
        Publisher::create(['name' => 'Random House']); // Inside The Kingdom

    }
}
