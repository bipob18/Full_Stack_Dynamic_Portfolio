<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile?->full_name ?? 'Biplob' }} — Portfolio</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- NAVBAR -->
    <header>
        <nav class="navbar">
            <div class="logo">{{ $profile?->brand_name ?? ($profile?->full_name ?? 'PORTFOLIO') }}</div>
            <ul class="nav-links">
                <li><a href="#about">About</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#education">Education</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>

        <!-- HERO SECTION -->
        <div class="header">
            @if ($profile?->photo_path)
                <img class="profile-photo" src="{{ \Illuminate\Support\Facades\Storage::url($profile->photo_path) }}" alt="{{ $profile?->full_name ?? 'Profile photo' }}">
            @endif
            <h1>Hello, I'm <span>{{ $profile?->full_name ?? 'Biplob' }}</span></h1>
            <p>{{ $profile?->headline ?? 'Full-stack Web Developer & Designer' }}</p>
            <a href="#projects" class="btn">View My Work</a>
        </div>
    </header>

    <!-- ABOUT SECTION -->
    <section id="about" class="section">
        <h2>About Me</h2>
        <p>{!! nl2br(e($profile?->about ?? 'I am a passionate web developer from Bangladesh. I love building modern, responsive websites using Laravel, HTML, CSS, and JavaScript.')) !!}</p>
    </section>

    <!-- SKILLS SECTION -->
    <section id="skills" class="section">
        <h2>Skills</h2>
        <div class="skills-grid">
            @forelse ($skills as $skill)
                <div class="skill-box">{{ $skill->name }}</div>
            @empty
                <div class="skill-box">HTML</div>
                <div class="skill-box">CSS</div>
                <div class="skill-box">JavaScript</div>
                <div class="skill-box">Laravel</div>
                <div class="skill-box">PHP</div>
                <div class="skill-box">MySQL</div>
            @endforelse
        </div>
    </section>

    <!-- EDUCATION SECTION -->
    <section id="education" class="section">
        <h2>Education</h2>

        @if (($educations ?? collect())->isEmpty())
            <p>No education added yet.</p>
        @else
            <div class="project-grid">
                @foreach ($educations as $edu)
                    <div class="project-card">
                        <h3>{{ $edu->degree }}</h3>
                        <p><strong>{{ $edu->institute }}</strong></p>
                        <p>
                            @if ($edu->start_year || $edu->end_year)
                                <span>{{ $edu->start_year ?: '—' }} - {{ $edu->end_year ?: '—' }}</span>
                            @endif
                            @if ($edu->grade)
                                <span> • {{ $edu->grade }}</span>
                            @endif
                        </p>
                        @if ($edu->description)
                            <p>{!! nl2br(e($edu->description)) !!}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    <!-- PROJECTS SECTION -->
    <section id="projects" class="section">
        <h2>Projects</h2>
        <div class="project-grid">
            @forelse ($projects as $project)
                <div class="project-card">
                    <h3>
                        @if ($project->url)
                            <a href="{{ $project->url }}" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: none;">
                                {{ $project->title }}
                            </a>
                        @else
                            {{ $project->title }}
                        @endif
                    </h3>
                    @if ($project->description)
                        <p>{{ $project->description }}</p>
                    @endif
                </div>
            @empty
                <div class="project-card">
                    <h3>Portfolio Website</h3>
                    <p>Personal portfolio built with Laravel & modern design.</p>
                </div>
                <div class="project-card">
                    <h3>E-commerce Website</h3>
                    <p>Full-feature eCommerce platform with admin panel.</p>
                </div>
                <div class="project-card">
                    <h3>Blog Application</h3>
                    <p>Responsive blog app with user authentication & admin panel.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" class="section">
        <h2>Contact</h2>
        <p>Email: {{ $profile?->email ?? 'biplobh.cse@gmail.com' }}</p>
        <p>Phone: {{ $profile?->phone ?? '+8801774646076' }}</p>

        @if (($socialLinks ?? collect())->isNotEmpty())
            <p style="margin-top: 12px;">
                @foreach ($socialLinks as $link)
                    <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" style="margin-right: 10px;">
                        {{ $link->platform }}
                    </a>
                @endforeach
            </p>
        @endif
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <p>{{ $profile?->footer_text ?? ('© ' . date('Y') . ' ' . ($profile?->full_name ?? 'Biplob') . '. All rights reserved.') }}</p>
    </footer>

</body>
</html>
