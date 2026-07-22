<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        Section::create(['class_id' => 1, 'name' => 'A']);
        Section::create(['class_id' => 1, 'name' => 'B']);
        Section::create(['class_id' => 2, 'name' => 'A']);
        Section::create(['class_id' => 2, 'name' => 'B']);
        Section::create(['class_id' => 3, 'name' => 'Science']);
        Section::create(['class_id' => 4, 'name' => 'Computer']);
    }
}