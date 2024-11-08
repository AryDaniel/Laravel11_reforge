<?php

namespace Database\Seeders;

// Include this line to use Job::factory() for creating model instances.
use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Runs the database seeding command.
        //php artisan db:seed --class=JobSeeder
        Job::factory(200)->create();
    }
}
