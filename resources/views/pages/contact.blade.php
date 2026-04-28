@extends('layouts.site')

@section('title', 'Contact Us - iPassGenerator')
@section('description', 'Get in touch with the iPassGenerator team. Have questions or feedback about our secure password generator? Reach out to us.')

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
      "name": "Contact Us - iPassGenerator",
      "url": "https://ipassgenerator.com/contact",
      "description": "Get in touch with the iPassGenerator team. Have questions or feedback about our secure password generator? Reach out to us.",
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
    <h1 class="text-3xl font-semibold tracking-tight">Contact Us</h1>
    <div class="mt-6 space-y-5 text-[1.02rem] leading-7 text-studio-muted dark:text-slate-300">
      <p>If you have any questions or feedback about iPassGenerator, feel free to reach out to us!</p>
      <p>You can contact us via email at <a href="mailto:info@ipassgenerator.com" class="text-studio-blue hover:text-studio-blue/80 dark:text-sky-300 dark:hover:text-sky-300/80">info@ipassgenerator.com</a>.</p>
    </div>
  </section>
@endsection
