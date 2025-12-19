<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProfile;
use App\Models\PortfolioEducation;
use App\Models\PortfolioProject;
use App\Models\PortfolioSkill;
use App\Models\PortfolioSocialLink;
use Illuminate\Support\Facades\Schema;

class PortfolioController extends Controller
{
    public function index()
    {
        // If migrations haven't been run yet, keep the site up with sane defaults.
        $hasProfiles = Schema::hasTable('portfolio_profiles');
        $hasSkills = Schema::hasTable('portfolio_skills');
        $hasProjects = Schema::hasTable('portfolio_projects');
        $hasSocialLinks = Schema::hasTable('portfolio_social_links');

        $profile = $hasProfiles
            ? PortfolioProfile::query()->latest('id')->first()
            : null;

        $skills = $hasSkills
            ? PortfolioSkill::query()->orderBy('sort_order')->orderBy('name')->get()
            : collect();

        $projects = $hasProjects
            ? PortfolioProject::query()->orderBy('sort_order')->orderBy('id', 'desc')->get()
            : collect();

        $socialLinks = $hasSocialLinks
            ? PortfolioSocialLink::query()->orderBy('sort_order')->orderBy('platform')->get()
            : collect();

        $educations = Schema::hasTable('portfolio_educations')
            ? PortfolioEducation::query()
                ->orderBy('sort_order')
                ->orderByDesc('end_year')
                ->orderByDesc('start_year')
                ->get()
            : collect();

        return view('portfolio', [
            'profile' => $profile,
            'skills' => $skills,
            'projects' => $projects,
            'socialLinks' => $socialLinks,
            'educations' => $educations,
        ]);
    }
}

