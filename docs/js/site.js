(function () {
    'use strict';

    // ---------- Theme (light / dark) ----------
    var root = document.documentElement;

    function currentTheme() {
        return root.getAttribute('data-bs-theme') || 'light';
    }

    function paintToggle() {
        document.querySelectorAll('[data-theme-toggle] i').forEach(function (icon) {
            icon.className = currentTheme() === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-stars-fill';
        });
    }

    document.addEventListener('click', function (e) {
        var btn = e.target.closest('[data-theme-toggle]');
        if (!btn) return;
        var next = currentTheme() === 'dark' ? 'light' : 'dark';
        root.setAttribute('data-bs-theme', next);
        try { localStorage.setItem('theme', next); } catch (err) { /* ignore */ }
        paintToggle();
    });

    document.addEventListener('DOMContentLoaded', function () {
        paintToggle();

        // ---------- Navbar shadow on scroll ----------
        var nav = document.querySelector('.navbar');
        function onScroll() {
            if (nav) nav.classList.toggle('scrolled', window.scrollY > 10);
        }
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });

        // ---------- Close mobile menu after clicking a link ----------
        var collapseEl = document.getElementById('mainNav');
        if (collapseEl && window.bootstrap) {
            collapseEl.querySelectorAll('a.nav-link').forEach(function (a) {
                a.addEventListener('click', function () {
                    var inst = bootstrap.Collapse.getInstance(collapseEl);
                    if (inst && collapseEl.classList.contains('show')) inst.hide();
                });
            });
        }

        // ---------- Reveal on scroll + skill bars ----------
        var items = document.querySelectorAll('.reveal');
        if ('IntersectionObserver' in window) {
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (!entry.isIntersecting) return;
                    entry.target.classList.add('visible');
                    entry.target.querySelectorAll('[data-level]').forEach(function (bar) {
                        bar.style.width = bar.getAttribute('data-level') + '%';
                    });
                    io.unobserve(entry.target);
                });
            }, { threshold: 0.12 });
            items.forEach(function (el) { io.observe(el); });
        } else {
            items.forEach(function (el) {
                el.classList.add('visible');
                el.querySelectorAll('[data-level]').forEach(function (bar) {
                    bar.style.width = bar.getAttribute('data-level') + '%';
                });
            });
        }

        // ---------- Active nav link (home page scrollspy) ----------
        var sections = document.querySelectorAll('section[id]');
        var links = document.querySelectorAll('.navbar .nav-link[data-section]');
        if (sections.length && links.length && 'IntersectionObserver' in window) {
            var spy = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (!entry.isIntersecting) return;
                    links.forEach(function (l) {
                        l.classList.toggle('active', l.getAttribute('data-section') === entry.target.id);
                    });
                });
            }, { rootMargin: '-45% 0px -50% 0px' });
            sections.forEach(function (s) { spy.observe(s); });
        }

        // ---------- Confirm destructive admin actions ----------
        document.querySelectorAll('form[data-confirm]').forEach(function (form) {
            form.addEventListener('submit', function (e) {
                if (!window.confirm(form.getAttribute('data-confirm'))) e.preventDefault();
            });
        });
    });
})();
