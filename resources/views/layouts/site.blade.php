<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="index, follow" />
    <meta name="description" content="@yield('description', 'Generate strong passwords instantly with customizable options, entropy guidance, and privacy-friendly local generation.')" />
    <title>@yield('title', 'iPassGenerator')</title>
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}" />
    <link rel="alternate icon" href="{{ asset('favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title', 'ipassgenerator')" />
    <meta property="og:description" content="@yield('description', 'Generate strong passwords instantly with customizable options, entropy guidance, and privacy-friendly local generation.')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('favicon.svg') }}" />
    <meta property="og:site_name" content="ipassgenerator" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('title', 'ipassgenerator')" />
    <meta name="twitter:description" content="@yield('description', 'Generate strong passwords instantly with customizable options, entropy guidance, and privacy-friendly local generation.')" />
    <meta name="twitter:image" content="{{ asset('favicon.svg') }}" />
    <meta name="theme-color" content="#3568e7" />
    <meta name="msapplication-TileColor" content="#3568e7" />
    <script nonce="{{ $cspNonce }}" src="https://cdn.tailwindcss.com"></script>
    <script nonce="{{ $cspNonce }}">
      const savedTheme = localStorage.getItem('password-generator-theme');
      const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

      if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
        document.documentElement.classList.add('dark');
      }
    </script>
    <script nonce="{{ $cspNonce }}">
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {
            colors: {
              studio: {
                bg: '#f5f7fb',
                card: '#ffffff',
                line: '#d8dee9',
                muted: '#6b7280',
                text: '#101828',
                blue: '#3568e7',
                blueDark: '#2a56c6',
                green: '#16c172',
              },
            },
            boxShadow: {
              panel: '0 1px 2px rgba(16, 24, 40, 0.06), 0 10px 28px rgba(16, 24, 40, 0.06)',
            },
          },
        },
      };
    </script>
    <style nonce="{{ $cspNonce }}">
      :root {
        color-scheme: light;
      }

      .dark {
        color-scheme: dark;
      }

      body {
        font-family: "Segoe UI", ui-sans-serif, system-ui, sans-serif;
      }

      .dark body {
        background-color: #0f172a;
      }

      .toggle {
        position: relative;
        display: inline-flex;
        height: 1.75rem;
        width: 2.75rem;
        align-items: center;
        border-radius: 9999px;
        background: #d1d5db;
        transition: background-color 0.2s ease;
      }

      .dark .toggle {
        background: #475569;
      }

      .toggle::after {
        content: '';
        position: absolute;
        left: 0.2rem;
        height: 1.35rem;
        width: 1.35rem;
        border-radius: 9999px;
        background: #ffffff;
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.2);
        transition: transform 0.2s ease;
      }

      .dark .toggle::after {
        background: #f8fafc;
      }

      input:checked + .toggle {
        background: #3568e7;
      }

      input:checked + .toggle::after {
        transform: translateX(1rem);
      }

      .slider {
        -webkit-appearance: none;
        appearance: none;
        height: 0.38rem;
        border-radius: 9999px;
        background: linear-gradient(to right, #3568e7 var(--fill, 50%), #d1d5db var(--fill, 50%));
        outline: none;
      }

      .dark .slider {
        background: linear-gradient(to right, #4f7cf7 var(--fill, 50%), #334155 var(--fill, 50%));
      }

      .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 1rem;
        height: 1rem;
        border-radius: 9999px;
        background: #3568e7;
        cursor: pointer;
      }

      .slider::-moz-range-thumb {
        width: 1rem;
        height: 1rem;
        border: 0;
        border-radius: 9999px;
        background: #3568e7;
        cursor: pointer;
      }
    </style>
    @yield('schema')
  </head>
  <body class="min-h-screen bg-studio-bg text-studio-text antialiased transition-colors dark:bg-slate-900 dark:text-slate-100">
    <div class="flex min-h-screen flex-col">
      <header class="sticky top-0 z-50 border-b border-studio-line/80 bg-white/80 backdrop-blur transition-colors dark:border-slate-800 dark:bg-slate-900/80">
        <div class="mx-auto flex w-full max-w-6xl flex-row flex-wrap items-center justify-between gap-4 px-4 py-4 sm:px-6">
          <a href="{{ route('home') }}" class="text-2xl font-bold tracking-[-0.03em] text-studio-text dark:text-white">iPassGenerator</a>

          <nav aria-label="Primary" class="flex items-center gap-4 text-sm font-medium text-studio-muted dark:text-slate-300">
            
            <button
              id="themeToggle"
              type="button"
              aria-label="Toggle theme"
              class="flex h-10 items-center justify-center rounded-xl border border-transparent bg-white px-3.5 text-sm font-medium text-studio-text transition hover:border-studio-line hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-studio-blue/20 dark:bg-slate-900 dark:text-slate-100 dark:hover:border-slate-700 dark:hover:bg-slate-800"
            >
              <svg id="moonIcon" class="h-5 w-5 dark:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 12.8A9 9 0 1111.2 3 7 7 0 0021 12.8z" />
              </svg>
              <svg id="sunIcon" class="hidden h-5 w-5 dark:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="4" />
                <path d="M12 2v2" />
                <path d="M12 20v2" />
                <path d="m4.93 4.93 1.41 1.41" />
                <path d="m17.66 17.66 1.41 1.41" />
                <path d="M2 12h2" />
                <path d="M20 12h2" />
                <path d="m6.34 17.66-1.41 1.41" />
                <path d="m19.07 4.93-1.41 1.41" />
              </svg>
            </button>
          </nav>
        </div>
      </header>

      <main class="flex-1 px-4 py-10 sm:px-6">
        @yield('content')
      </main>

      <footer class="border-t border-studio-line/80 bg-white/70 transition-colors dark:border-slate-800 dark:bg-slate-900/80">
        <div class="mx-auto flex w-full max-w-6xl flex-col items-center gap-3 px-4 py-5 text-center text-sm text-studio-muted dark:text-slate-400 sm:px-6">
          <div class="flex flex-wrap items-center justify-center gap-4">
            <a href="{{ route('privacy') }}" class="transition hover:text-studio-blue dark:hover:text-sky-300">Privacy Policy</a>
            <a href="{{ route('terms') }}" class="transition hover:text-studio-blue dark:hover:text-sky-300">Terms</a>
            <a href="{{ route('about') }}" class="transition hover:text-studio-blue dark:hover:text-sky-300">About Us</a>
            <a href="{{ route('contact') }}" class="transition hover:text-studio-blue dark:hover:text-sky-300">Contact Us</a>
          </div>
          <p>&copy; 2026 ipassgenerator. Secure passwords made simple.</p>
        </div>
      </footer>
    </div>

    <script nonce="{{ $cspNonce }}">
      const themeToggle = document.getElementById('themeToggle');
      const moonIcon = document.getElementById('moonIcon');
      const sunIcon = document.getElementById('sunIcon');

      function updateThemeToggleUi() {
        if (!themeToggle || !moonIcon || !sunIcon) {
          return;
        }

        const isDark = document.documentElement.classList.contains('dark');
        themeToggle.setAttribute('aria-label', isDark ? 'Switch to light mode' : 'Switch to dark mode');
        moonIcon.classList.toggle('hidden', isDark);
        sunIcon.classList.toggle('hidden', !isDark);
      }

      function toggleTheme() {
        document.documentElement.classList.toggle('dark');
        localStorage.setItem('password-generator-theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
        updateThemeToggleUi();
      }

      if (themeToggle) {
        themeToggle.addEventListener('click', toggleTheme);
      }

      updateThemeToggleUi();
    </script>
    @stack('scripts')
  </body>
</html>
