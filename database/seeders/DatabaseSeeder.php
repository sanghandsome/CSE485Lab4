<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Reader;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       Borrow::factory()->count(10)->create();

    }
}
