<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create(['name' => 'CHRIS MILLER']); // CHIP WAR
        Author::create(['name' => 'KLAUS SCHWAB']); //THE FOURTH INDUSTRIAL REVELUTION
        Author::create(['name' => 'DARON ACEMOGLU & JAMES A. ROBINSON']); //WHY NATIONS FAIL
        Author::create(['name' => 'ROBERT LACEY']); //INSIDE THE KINGDOM
        Author::create(['name' => 'DAVID GRIFFITHS & DAWN GRIFFTHS']);// REACT COOK BOOK
        Author::create(['name' => 'ALEX BANKS & EVE PROCELLO']); // LEARNING REACT
        Author::create(['name' => 'RENEE A. MAUBORGNE & W. CHAN KIM']); //BLUE OCEAN STRATEGY
        Author::create(['name' => 'ROBERT T. KIYOSAKI']); //RICH DAD POOR DAD
        Author::create(['name' => 'MALCOM GLADWELL']); //THE TIPPING POINT
    }
}
