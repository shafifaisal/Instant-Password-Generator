@extends('layouts.site')

@section('title', 'About iPassGenerator - Secure Password Generation Made Easy')
@section('description', 'Learn about iPassGenerator, your trusted online password generator. Discover how our tool helps create strong, secure passwords to protect your accounts and data.')

@section('schema')
@php
echo '<script type="application/ld+json">';
echo '{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebSite",
      "name": "iPassGenerator",
      "url": "https://ipassgenerator.com",
      "description": "Free online secure password generator tool for creating strong, random passwords with customizable options.",
      "publisher": {
        "@type": "Organization",
        "name": "iPassGenerator",
        "url": "https://ipassgenerator.com",
        "logo": "https://ipassgenerator.com/favicon.svg"
      }
    },
    {
      "@type": "WebPage",
      "name": "About iPassGenerator - Secure Password Generation Made Easy",
      "url": "https://ipassgenerator.com/about",
      "description": "Learn about iPassGenerator, your trusted online password generator. Discover how our tool helps create strong, secure passwords to protect your accounts and data.",
      "isPartOf": {
        "@type": "WebSite",
        "name": "iPassGenerator",
        "url": "https://ipassgenerator.com"
      },
      "datePublished": "2026-04-27",
      "dateModified": "2026-04-27"
    },
    {
      "@type": "Organization",
      "name": "iPassGenerator",
      "url": "https://ipassgenerator.com",
      "logo": "https://ipassgenerator.com/favicon.svg",
      "description": "Provider of free online password generation tools focused on security and privacy."
    }
  ]
}';
echo '</script>';
@endphp
@endsection

@section('content')
  <section class="mx-auto w-full max-w-4xl rounded-3xl border border-studio-line bg-studio-card p-6 shadow-panel dark:border-slate-700 dark:bg-slate-800 sm:p-8">
    <h1 class="text-3xl font-semibold tracking-tight">About ipassgenerator</h1>
    <div class="mt-6 space-y-5 text-[1.02rem] leading-7 text-studio-muted dark:text-slate-300">
      <p>ipassgenerator is a lightweight password tool built to help people create strong passwords quickly without sending password data to a server. The generator runs locally in the browser and uses the Web Crypto API for randomness.</p>
      <p>The goal of this site is practical security. Instead of overwhelming visitors with jargon, we focus on the settings that matter most: length, character variety, easy-to-read options, and clear strength feedback.</p>
      <p>We also aim to keep the site simple, fast, and respectful. The generator itself works entirely in the browser, and the supporting pages exist to help visitors understand how the tool works, what data is collected, and how to use it responsibly.</p>
    </div>

    <div class="mt-8 grid gap-4 sm:grid-cols-3">
      <div class="rounded-2xl border border-studio-line bg-white p-5 dark:border-slate-700 dark:bg-slate-900">
        <h2 class="text-lg font-semibold">Local-first</h2>
        <p class="mt-2 text-sm leading-6 text-studio-muted dark:text-slate-300">Passwords are generated in your browser so the site does not need to store them on a server.</p>
      </div>
      <div class="rounded-2xl border border-studio-line bg-white p-5 dark:border-slate-700 dark:bg-slate-900">
        <h2 class="text-lg font-semibold">Clear controls</h2>
        <p class="mt-2 text-sm leading-6 text-studio-muted dark:text-slate-300">Length, symbols, ambiguous characters, and similar character filters are all easy to adjust.</p>
      </div>
      <div class="rounded-2xl border border-studio-line bg-white p-5 dark:border-slate-700 dark:bg-slate-900">
        <h2 class="text-lg font-semibold">Useful guidance</h2>
        <p class="mt-2 text-sm leading-6 text-studio-muted dark:text-slate-300">Strength labels and entropy estimates help users understand what makes a password harder to guess.</p>
      </div>
    </div>
  </section>
@endsection
