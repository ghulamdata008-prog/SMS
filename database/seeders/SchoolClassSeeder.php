<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SchoolClass;

class SchoolClassSeeder extends Seeder
{
    public function run(): void
    {
        SchoolClass::create([
            'name' => 'Class 9',
        ]);

        SchoolClass::create([
            'name' => 'Class 10',
        ]);

        SchoolClass::create([
            'name' => 'Class 11',
        ]);

        SchoolClass::create([
            'name' => 'Class 12',
        ]);
    }
}