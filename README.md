# Laravel Portfolio

Modern, responsive developer portfolio built with Laravel and Bootstrap 5.

**Features:** hero/about/skills/experience sections, projects, markdown blog, contact form saved to the database, admin panel (projects, posts, messages), dark mode, scroll animations, SEO meta tags.

## Setup (needs PHP 8.2+, Composer)

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite      # Windows: type nul > database\database.sqlite
php artisan migrate --seed
php artisan serve
```

Open http://localhost:8000

## Admin panel

Go to `/login`. Default credentials come from `.env`:

```
ADMIN_EMAIL=admin@example.com
ADMIN_PASSWORD=password
```

**Change these before running `php artisan db:seed` on a real server.**

## Customise

- Name, role, about text, skills, experience, social links, avatar: `config/portfolio.php` (and `PORTFOLIO_NAME` / `PORTFOLIO_EMAIL` in `.env`)
- Colours and styling: `public/css/site.css` (`--brand`, `--brand-2`)
- Projects, blog posts and incoming messages: admin panel
- Put your photo in `public/images/` and set `avatar_url` to `/images/me.jpg`

## Notes

- Bootstrap, Bootstrap Icons and Google Fonts load from CDNs, so no `npm` build is needed.
- Contact form has a honeypot field and rate limiting (5/min).
- Blog posts are Markdown; raw HTML is stripped.
- Messages are stored in the database; add a Mail notification in `ContactController` if you want email alerts.
- For production: set `APP_ENV=production`, `APP_DEBUG=false`, and use MySQL or PostgreSQL by changing the `DB_*` values.
