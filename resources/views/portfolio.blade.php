<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biplob — Portfolio</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- NAVBAR -->
    <header>
        <nav class="navbar">
            <div class="logo">BIPLOB</div>
            <ul class="nav-links">
                <li><a href="#about">About</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>

        <!-- HERO SECTION -->
        <div class="header">
            <h1>Hello, I'm <span>Biplob</span></h1>
            <p>Full-stack Web Developer & Designer</p>
            <a href="#projects" class="btn">View My Work</a>
        </div>
    </header>

    <!-- ABOUT SECTION -->
    <section id="about" class="section">
        <h2>About Me</h2>
        <p>
            I am a passionate web developer from Bangladesh. I love building modern, responsive websites using Laravel, HTML, CSS, and JavaScript.
        </p>
    </section>

    <!-- SKILLS SECTION -->
    <section id="skills" class="section">
        <h2>Skills</h2>
        <div class="skills-grid">
            <div class="skill-box">HTML</div>
            <div class="skill-box">CSS</div>
            <div class="skill-box">JavaScript</div>
            <div class="skill-box">Laravel</div>
            <div class="skill-box">PHP</div>
            <div class="skill-box">MySQL</div>
        </div>
    </section>

    <!-- PROJECTS SECTION -->
    <section id="projects" class="section">
        <h2>Projects</h2>
        <div class="project-grid">
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
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" class="section">
        <h2>Contact</h2>
        <p>Email: biplobh.cse@gmail.com</p>
        <p>Phone: +8801774646076</p>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <p>© 2025 Biplob. All rights reserved.</p>
    </footer>

</body>
</html>
