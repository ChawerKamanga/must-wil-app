<?php

namespace Database\Seeders;

use App\Models\Programme;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RegionSeeder::class,
            DistrictSeeder::class,
            // OrganizationSeeder::class,
            RoleSeeder::class,
            ProgrammeSeeder::class,
            UserSeeder::class,
            AssesmentTypeSeeder::class,
            AssessmentSeeder::class,
            EvaluationSeeder::class,
            QuestionSeeder::class,
            IntrestSeeder::class
        ]);
    }
}

