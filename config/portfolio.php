<?php

/*
|--------------------------------------------------------------------------
| Portfolio content
|--------------------------------------------------------------------------
| Edit this file to personalise the public site. Projects, blog posts and
| contact messages are managed from the admin panel at /admin.
*/

return [
    'name' => env('PORTFOLIO_NAME', 'Rabbi Islam Rasel'),
    'role' => 'Full-Stack Laravel Developer',
    'tagline' => 'I build fast, clean and scalable web applications with Laravel, PostgreSQL, REST and SOAP APIs, and Tailwind CSS.',
    'location' => 'Dhaka, Bangladesh',
    'email' => env('PORTFOLIO_EMAIL', 'rabbiislamrasel01@gmail.com'),
    'phone' => '01862530380',
    'resume_url' => null, // e.g. '/cv.pdf' (put the file in public/)
    'avatar_url' => null, // e.g. '/images/me.jpg' (put the file in public/images)

    'about' => [
        'I am Rabbi Islam Rasel, a CSE student at Northern University Bangladesh (graduating 2026) and an aspiring full-stack web developer. I enjoy turning ideas into polished, reliable products with clean code and a great user experience.',
        'I have built live projects including Women\'s Hub (an e-commerce store) and FinLink (a banking platform), and I work with PostgreSQL, REST and SOAP APIs, Laravel and Tailwind CSS. I am open to job and freelance opportunities.',
    ],

    'stats' => [
        ['value' => '2', 'label' => 'Live projects'],
        ['value' => '2026', 'label' => 'B.Sc. in CSE'],
        ['value' => '6+', 'label' => 'Core technologies'],
    ],

    // Add your profile URLs here (empty ones are hidden on the site)
    'socials' => [
        'github' => null,
        'linkedin' => null,
        'facebook' => null,
        'twitter' => null,
    ],

    'skills' => [
        ['name' => 'PostgreSQL', 'level' => 80],
        ['name' => 'REST API', 'level' => 85],
        ['name' => 'SOAP API', 'level' => 70],
        ['name' => 'Tailwind CSS', 'level' => 85],
        ['name' => 'Laravel / PHP', 'level' => 80],
        ['name' => 'JavaScript', 'level' => 75],
        ['name' => 'Bootstrap / CSS', 'level' => 85],
        ['name' => 'Git & Deployment', 'level' => 70],
    ],

    'experience' => [
        [
            'role' => 'B.Sc. in Computer Science & Engineering',
            'company' => 'Northern University Bangladesh',
            'period' => '2022 - 2026',
            'details' => 'Studying algorithms, databases, web technologies and software engineering.',
        ],
    ],
];
