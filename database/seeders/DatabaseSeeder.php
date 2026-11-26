<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Admin login comes from .env (ADMIN_EMAIL / ADMIN_PASSWORD).
     * CHANGE THE PASSWORD before deploying to a real server.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@example.com')],
            [
                'name' => 'Admin',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'password')),
            ]
        );

        if (Project::count() === 0) {
            Project::create([
                'title' => "Women's Hub",
                'description' => 'An online beauty store for skincare, makeup and haircare with a Bengali/English interface, product catalogue, category browsing, search, wishlist, cart, user accounts, cash on delivery and order tracking.',
                'tech_stack' => 'E-commerce, Next.js, Vercel',
                'live_url' => 'https://womenshub.vercel.app/',
                'featured' => true,
                'sort_order' => 0,
            ]);

            Project::create([
                'title' => 'FinLink Banking Platform',
                'description' => 'A modern, mobile-responsive banking web platform with secure email and password sign-in and account registration.',
                'tech_stack' => 'Banking, Web App, Vercel',
                'live_url' => 'https://banking-fawn.vercel.app/',
                'featured' => true,
                'sort_order' => 1,
            ]);
        }

        if (Post::count() === 0) {
            Post::create([
                'title' => 'Getting Started with Laravel',
                'excerpt' => 'A quick tour of why Laravel is a great choice for modern web development.',
                'body' => "## Why Laravel?\n\nLaravel gives you routing, an ORM, authentication, queues and more out of the box.\n\n- Elegant syntax\n- Huge ecosystem\n- Great documentation\n\n```php\nRoute::get('/', fn () => view('home'));\n```\n\nHappy coding!",
                'published_at' => now()->subDays(2),
            ]);

            Post::create([
                'title' => 'Building Responsive Layouts with Bootstrap 5',
                'excerpt' => 'Grid, utilities and dark mode: the parts of Bootstrap I use every day.',
                'body' => "## The grid\n\nBootstrap's 12-column grid makes responsive design simple.\n\n## Dark mode\n\nBootstrap 5.3 supports colour modes using the `data-bs-theme` attribute.\n\nThat is all you need to get started.",
                'published_at' => now()->subDay(),
            ]);
        }
    }
}
