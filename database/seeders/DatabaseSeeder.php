<?php

namespace Database\Seeders;

use App\Models\PortfolioProfile;
use App\Models\PortfolioProject;
use App\Models\PortfolioSkill;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed portfolio defaults (safe to run multiple times).
        if (Schema::hasTable('portfolio_profiles') && PortfolioProfile::query()->count() === 0) {
            PortfolioProfile::query()->create([
                'brand_name' => 'BIPLOB',
                'full_name' => 'Biplob',
                'headline' => 'Full-stack Web Developer & Designer',
                'about' => 'I am a passionate web developer from Bangladesh. I love building modern, responsive websites using Laravel, HTML, CSS, and JavaScript.',
                'email' => 'biplobh.cse@gmail.com',
                'phone' => '+8801774646076',
                'footer_text' => '© 2025 Biplob. All rights reserved.',
            ]);
        }

        if (Schema::hasTable('portfolio_skills') && PortfolioSkill::query()->count() === 0) {
            $skills = ['HTML', 'CSS', 'JavaScript', 'Laravel', 'PHP', 'MySQL'];
            foreach ($skills as $i => $name) {
                PortfolioSkill::query()->create([
                    'name' => $name,
                    'sort_order' => $i,
                ]);
            }
        }

        if (Schema::hasTable('portfolio_projects') && PortfolioProject::query()->count() === 0) {
            $projects = [
                ['title' => 'Portfolio Website', 'description' => 'Personal portfolio built with Laravel & modern design.'],
                ['title' => 'E-commerce Website', 'description' => 'Full-feature eCommerce platform with admin panel.'],
                ['title' => 'Blog Application', 'description' => 'Responsive blog app with user authentication & admin panel.'],
            ];

            foreach ($projects as $i => $project) {
                PortfolioProject::query()->create($project + ['sort_order' => $i]);
            }
        }
    }
}
