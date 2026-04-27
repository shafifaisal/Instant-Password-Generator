@extends('layouts.site')

@section('title', 'iPassGenerator - Free Online Password Generator Tool')
@section('description', 'Generate strong, secure passwords instantly with iPassGenerator. Our free online tool creates random, unbreakable passwords with customizable length and complexity options.')

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
      },
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://ipassgenerator.com/?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    },
    {
      "@type": "WebPage",
      "name": "iPassGenerator - Free Online Password Generator Tool",
      "url": "https://ipassgenerator.com/",
      "description": "Generate strong, secure passwords instantly with iPassGenerator. Our free online tool creates random, unbreakable passwords with customizable length and complexity options.",
      "isPartOf": {
        "@type": "WebSite",
        "name": "iPassGenerator",
        "url": "https://ipassgenerator.com"
      },
      "primaryImageOfPage": {
        "@type": "ImageObject",
        "url": "https://ipassgenerator.com/favicon.svg"
      },
      "datePublished": "2026-04-27",
      "dateModified": "2026-04-27"
    },
    {
      "@type": "SoftwareApplication",
      "name": "iPassGenerator",
      "url": "https://ipassgenerator.com/",
      "description": "Free online secure password generator tool that creates strong, random passwords locally in your browser using Web Crypto API.",
      "applicationCategory": "Utility",
      "operatingSystem": "All",
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "USD"
      },
      "author": {
        "@type": "Organization",
        "name": "iPassGenerator"
      },
      "featureList": [
        "Customizable password length",
        "Include/exclude character types",
        "Local generation for privacy",
        "Entropy guidance",
        "Copy to clipboard"
      ]
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
    <div class="mx-auto flex w-full max-w-6xl flex-col gap-8">
        <section class="mx-auto w-full max-w-4xl px-4 pt-12 pb-12 sm:px-0">
            <h1 class="text-4xl text-center font-semibold tracking-tight text-studio-text dark:text-white sm:text-5xl md:text-6xl lg:text-7xl">Instant Password
                Generator <br />(Free & Secure)</h1>
            <p class="mt-4 text-base text-center leading-8 text-studio-muted dark:text-slate-300 sm:text-lg">Create strong, random, and secure
                passwords instantly with our advanced password generator. This tool uses crypto-secure randomness directly
                in your browser, ensuring your passwords are never stored or shared.</p>
        </section>

        <section class="mx-auto flex w-full max-w-3xl flex-col gap-8" id="generator">
            <header class="mb-6">
                <h2 class="flex items-center gap-2 text-2xl font-semibold tracking-tight text-studio-text dark:text-slate-100"><img src="{{ asset('favicon.svg') }}" class="h-5 w-5" alt="Logo"> Generate Free Password</h2>
            </header>

            <section
                class="rounded-2xl border border-studio-line bg-studio-card p-5 shadow-panel transition-colors dark:border-slate-700 dark:bg-slate-800 sm:p-7">
                <div class="flex flex-col gap-3 sm:flex-row">
                    <div class="relative min-w-0 flex-1">
                        <label for="passwordOutput" class="sr-only">Generated password</label>
                        <input id="passwordOutput" type="text" readonly spellcheck="false"
                            class="h-14 w-full rounded-2xl border border-studio-line bg-[#fbfcfe] px-5 pr-14 font-mono text-[1.05rem] tracking-[0.06em] text-studio-text outline-none transition focus:border-studio-blue focus:ring-2 focus:ring-studio-blue/10 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100" />
                        <button id="toggleVisibility" type="button" aria-label="Hide password"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 transition hover:text-studio-blue focus:outline-none dark:text-slate-400 dark:hover:text-sky-300">
                            <svg id="eyeOpenIcon" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6-10-6-10-6z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            <svg id="eyeClosedIcon" class="hidden h-5 w-5" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M3 3l18 18" />
                                <path d="M10.6 10.7a3 3 0 004.2 4.2" />
                                <path d="M9.9 5.1A10.9 10.9 0 0112 5c6.5 0 10 7 10 7a17.6 17.6 0 01-4.1 4.8" />
                                <path d="M6.2 6.2A17.2 17.2 0 002 12s3.5 7 10 7a9.8 9.8 0 004.2-.9" />
                            </svg>
                        </button>
                    </div>

                    <div class="grid grid-cols-2 gap-3 sm:w-[240px]">
                        <button id="copyButton" type="button"
                            class="flex h-14 items-center justify-center gap-2 rounded-2xl border border-studio-line bg-white px-4 text-base font-medium text-studio-text transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-studio-blue/20 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100 dark:hover:bg-slate-700">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="9" y="9" width="11" height="11" rx="2" />
                                <path d="M5 15V6a2 2 0 012-2h9" />
                            </svg>
                            <span>Copy</span>
                        </button>

                        <button id="regenButton" type="button"
                            class="flex h-14 items-center justify-center gap-2 rounded-2xl bg-studio-blue px-4 text-base font-semibold text-white transition hover:bg-studio-blueDark focus:outline-none focus:ring-2 focus:ring-studio-blue/25">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 12a9 9 0 00-15.5-6.4" />
                                <path d="M3 4v5h5" />
                                <path d="M3 12a9 9 0 0015.5 6.4" />
                                <path d="M21 20v-5h-5" />
                            </svg>
                            <span>Regenerate</span>
                        </button>
                    </div>
                </div>

                <div class="mt-4 rounded-2xl bg-slate-50 px-4 py-3 text-sm text-studio-muted dark:bg-slate-900 dark:text-slate-300"
                    id="copyFeedback">
                    Generated locally in your browser using crypto-secure randomness.
                </div>

                <div class="mt-6">
                    <div class="mb-2 flex items-center justify-between gap-4 text-sm">
                        <span
                            class="font-semibold uppercase tracking-[0.18em] text-studio-muted dark:text-slate-400">Strength</span>
                        <div class="flex items-center gap-2">
                            <span id="strengthText" class="font-semibold text-[#089c52]">Very Strong</span>
                            <span id="entropyText" class="text-studio-muted dark:text-slate-400">~0 bits</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-1.5">
                        <span class="h-1.5 rounded-full bg-[#c7f3dc] dark:bg-slate-700"></span>
                        <span class="h-1.5 rounded-full bg-[#c7f3dc] dark:bg-slate-700"></span>
                        <span class="h-1.5 rounded-full bg-[#c7f3dc] dark:bg-slate-700"></span>
                        <span class="h-1.5 rounded-full bg-[#c7f3dc] dark:bg-slate-700"></span>
                    </div>
                    <div id="strengthSegments" class="-mt-1.5 grid grid-cols-4 gap-1.5" aria-hidden="true">
                        <span class="h-1.5 rounded-full bg-studio-green transition-colors"></span>
                        <span class="h-1.5 rounded-full bg-studio-green transition-colors"></span>
                        <span class="h-1.5 rounded-full bg-studio-green transition-colors"></span>
                        <span class="h-1.5 rounded-full bg-studio-green transition-colors"></span>
                    </div>
                </div>

                <div class="mt-8">
                    <div class="mb-3 flex items-center justify-between text-[1.05rem]">
                        <label for="lengthSlider" class="font-medium text-studio-text dark:text-slate-100">Password
                            Length</label>
                        <span id="lengthValue" class="font-semibold text-studio-blue">36</span>
                    </div>

                    <input id="lengthSlider" type="range" min="6" max="50" value="36"
                        class="slider w-full" />

                    <div class="mt-3 flex justify-between text-xs text-studio-muted dark:text-slate-400">
                        <span>6</span>
                        <span>50</span>
                    </div>
                </div>

                <div class="mt-8" id="features">
                    <p class="mb-4 text-sm font-semibold uppercase tracking-[0.18em] text-studio-muted dark:text-slate-400">
                        Options</p>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="flex items-center justify-between gap-4">
                            <span class="text-[1.05rem] font-medium text-studio-text dark:text-slate-100">Uppercase
                                (A-Z)</span>
                            <span class="relative inline-flex items-center">
                                <input id="upperCase" type="checkbox" checked class="peer sr-only" />
                                <span class="toggle"></span>
                            </span>
                        </label>

                        <label class="flex items-center justify-between gap-4">
                            <span class="text-[1.05rem] font-medium text-studio-text dark:text-slate-100">Lowercase
                                (a-z)</span>
                            <span class="relative inline-flex items-center">
                                <input id="lowerCase" type="checkbox" checked class="peer sr-only" />
                                <span class="toggle"></span>
                            </span>
                        </label>

                        <label class="flex items-center justify-between gap-4">
                            <span class="text-[1.05rem] font-medium text-studio-text dark:text-slate-100">Numbers
                                (0-9)</span>
                            <span class="relative inline-flex items-center">
                                <input id="numbers" type="checkbox" checked class="peer sr-only" />
                                <span class="toggle"></span>
                            </span>
                        </label>

                        <label class="flex items-center justify-between gap-4">
                            <span class="text-[1.05rem] font-medium text-studio-text dark:text-slate-100">Symbols
                                (!@#$%^&amp;*)</span>
                            <span class="relative inline-flex items-center">
                                <input id="symbols" type="checkbox" class="peer sr-only" />
                                <span class="toggle"></span>
                            </span>
                        </label>

                        <label class="flex items-center justify-between gap-4">
                            <span class="text-[1.05rem] font-medium text-studio-text dark:text-slate-100">Exclude similar
                                (i,l,1,O,0)</span>
                            <span class="relative inline-flex items-center">
                                <input id="excludeSimilar" type="checkbox" checked class="peer sr-only" />
                                <span class="toggle"></span>
                            </span>
                        </label>

                        <label class="flex items-center justify-between gap-4">
                            <span class="text-[1.05rem] font-medium text-studio-text dark:text-slate-100">Exclude
                                ambiguous</span>
                            <span class="relative inline-flex items-center">
                                <input id="excludeAmbiguous" type="checkbox" checked class="peer sr-only" />
                                <span class="toggle"></span>
                            </span>
                        </label>
                    </div>
                </div>
            </section>



        </section>

        <section class="mx-auto flex w-full max-w-6xl flex-col gap-8" id="generator">

            <section
                class="rounded-2xl mt-8 border border-studio-line bg-studio-card p-6 shadow-panel transition-colors dark:border-slate-700 dark:bg-slate-800 sm:p-8">
                <h2 class="m-6 flex items-center gap-2 text-2xl font-semibold tracking-tight"><img src="{{ asset('favicon.svg') }}" class="h-5 w-5" alt="Logo"> Why Strong Passwords Matter</h2>
                <div class="m-6 space-y-4 text-[1.02rem] leading-7 text-studio-muted dark:text-slate-300">
                    <p>
In today's digital world, weak passwords can put your personal data at risk. Cyberattacks and hacking attempts are increasing every day.
Our <strong>free password generator</strong> helps you create secure passwords instantly.
</p>

<p>This tool works completely in your browser, meaning your passwords are never stored or shared.</p>
                    <p>Customize password length, include uppercase and lowercase letters, numbers, symbols, and exclude
                        similar or ambiguous characters for easier copying and readability.</p>
                </div>
                <div class="m-6 grid gap-4 sm:grid-cols-3">
                    <div class="rounded-2xl border border-studio-line bg-studio-card p-6 shadow-panel transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:hover:bg-slate-700">
                        <div class="flex items-center mb-4">
                            <h2 class="text-2xl font-semibold text-studio-text dark:text-slate-100">Key Features</h2>
                        </div>
                        <ul class="space-y-2 text-1x1 text-studio-muted dark:text-slate-300">
                            <li><i class="fa-solid fa-bolt mr-2 text-studio-blue"></i> Generate strong passwords instantly</li>
                            <li><i class="fa-solid fa-sliders mr-2 text-studio-blue"></i> Customize password length</li>
                            <li><i class="fa-solid fa-font mr-2 text-studio-blue"></i> Include uppercase & lowercase</li>
                            <li><i class="fa-solid fa-hashtag mr-2 text-studio-blue"></i> Add numbers & symbols</li>
                            <li><i class="fa-solid fa-copy mr-2 text-studio-blue"></i> One-click copy to clipboard</li>
                            <li><i class="fa-solid fa-lock mr-2 text-studio-blue"></i> 100% secure - runs in your browser</li>
                            <li><i class="fa-solid fa-user-shield mr-2 text-studio-blue"></i> No data stored</li>
                        </ul>
                    </div>

                    <div class="rounded-2xl border border-studio-line bg-studio-card p-6 shadow-panel transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:hover:bg-slate-700">
                        <div class="flex items-center gap-3 mb-4">
                            <h2 class="text-2xl font-semibold text-studio-text dark:text-slate-100">How to Use</h2>
                        </div>
                        <ol class="space-y-2 text-1x1 text-studio-muted dark:text-slate-300">
                            <li><i class="fa-solid fa-ruler mr-2 text-studio-blue"></i> Select password length</li>
                            <li><i class="fa-solid fa-check-circle mr-2 text-studio-blue"></i> Choose character types</li>
                            <li><i class="fa-solid fa-gear mr-2 text-studio-blue"></i> Click Generate Password</li>
                            <li><i class="fa-solid fa-copy mr-2 text-studio-blue"></i> Copy with one click</li>
                            <li><i class="fa-solid fa-shield mr-2 text-studio-blue"></i> Use it securely</li>
                        </ol>
                    </div>

                    <div class="rounded-2xl border border-studio-line bg-studio-card p-6 shadow-panel transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:hover:bg-slate-700">
                        <div class="flex items-center gap-3 mb-4">
                            <h2 class="text-2xl font-semibold text-studio-text dark:text-slate-100">Why Use This Tool?</h2>
                        </div>
                        <ul class="space-y-2 text-1x1 text-studio-muted dark:text-slate-300">
                            <li><i class="fa-solid fa-shield-virus mr-2 text-studio-blue"></i> Protect against hacking</li>
                            <li><i class="fa-solid fa-clock mr-2 text-studio-blue"></i> Saves time</li>
                            <li><i class="fa-solid fa-mobile-screen mr-2 text-studio-blue"></i> Works on all devices</li>
                            <li><i class="fa-solid fa-lock mr-2 text-studio-blue"></i> Privacy-first approach</li>
                        </ul>
                    </div>
                </div>
            </section>
              
            <section class="mx-auto flex w-full max-w-6xl flex-col gap-8 m-6">
            
                <div class="text-center">
                    <h2 class="mt-3 text-3xl font-semibold tracking-tight text-studio-text dark:text-white">Trusted by thousands of users worldwide ...</h2>
                </div>

                <div class="grid gap-3 md:grid-cols-3">
                    <article class="flex h-full flex-col justify-between rounded-2xl border border-studio-line bg-slate-50 p-6 shadow-panel transition duration-200 hover:-translate-y-0.5 hover:shadow-lg dark:border-slate-700 dark:bg-slate-900">
                        <div class="mb-4 flex items-start justify-between gap-3">
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-star text-amber-400"></i>
                                <i class="fa-solid fa-star text-amber-400"></i>
                                <i class="fa-solid fa-star text-amber-400"></i>
                                <i class="fa-solid fa-star text-amber-400"></i>
                                <i class="fa-solid fa-star text-amber-400"></i>
                            </div>
                        </div>
                        <p class="min-h-[5.5rem] text-lg leading-7 text-studio-muted dark:text-slate-300">This password generator is fast, secure, and easy to use. It gives me confidence by creating complex passwords without the hassle of manual typing.</p>
                        
                        <div id="user_review_1" class="mt-6 flex items-center gap-3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-studio-blue text-white">KK</div>
                            <div>
                                <p class="font-semibold text-studio-text dark:text-slate-100">Kenny Kolijn</p>
                                <p class="text-sm text-studio-muted dark:text-slate-500">Independent business coach</p>
                            </div>
                        </div>
                    </article>

                    <article class="flex h-full flex-col justify-between rounded-2xl border border-studio-line bg-slate-50 p-6 shadow-panel transition duration-200 hover:-translate-y-0.5 hover:shadow-lg dark:border-slate-700 dark:bg-slate-900">
                        <div class="mb-4 flex items-start justify-between gap-3">
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-star text-amber-400"></i>
                                <i class="fa-solid fa-star text-amber-400"></i>
                                <i class="fa-solid fa-star text-amber-400"></i>
                                <i class="fa-solid fa-star text-amber-400"></i>
                                <i class="fa-solid fa-star text-amber-400"></i>
                            </div>
                        </div>
                        <p class="min-h-[5.5rem] text-lg leading-7 text-studio-muted dark:text-slate-300">I use the generator every day for both work and personal accounts. The secure options and instant copy feature save me time and keep my passwords unique.</p>
                        <div class="mt-6 flex items-center gap-3" id="user_review_2">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-studio-blue text-white">EE</div>
                            <div>
                                <p class="font-semibold text-studio-text dark:text-slate-100">Erik Eckert</p>
                                <p class="text-sm text-studio-muted dark:text-slate-500">System administrator, (Eng. Ltd.)</p>
                            </div>
                        </div>
                    </article>

                    <article class="flex h-full flex-col justify-between rounded-2xl border border-studio-line bg-slate-50 p-6 shadow-panel transition duration-200 hover:-translate-y-0.5 hover:shadow-lg dark:border-slate-700 dark:bg-slate-900">
                        <div class="mb-4 flex items-start justify-between gap-3">
                            <div class="flex items-center gap-1">
                                <i class="fa-solid fa-star text-amber-400"></i>
                                <i class="fa-solid fa-star text-amber-400"></i>
                                <i class="fa-solid fa-star text-amber-400"></i>
                                <i class="fa-solid fa-star text-amber-400"></i>
                                <i class="fa-solid fa-star text-amber-400"></i>
                            </div>
                        </div>
                        <p class="min-h-[5.5rem] text-lg leading-7 text-studio-muted dark:text-slate-300">The interface is clean and the password output is always strong. It makes password management simple without sacrificing security.</p>
                        <div class="mt-6 flex items-center gap-3" id="user_review_3">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-studio-blue text-white">BN</div>
                            <div>
                                <p class="font-semibold text-studio-text dark:text-slate-100">Bart Nanni</p>
                                <p class="text-sm text-studio-muted dark:text-slate-500">Security services sales executive</p>
                            </div>
                        </div>
                    </article>
                </div>
            </section>

            <section class="mx-auto flex w-full max-w-3xl flex-col gap-8 m-6">
            <h2 class="text-3xl text-center font-semibold tracking-tight text-studio-text dark:text-white">Frequently asked questions</h2>
            </section>

            <section class="mx-auto w-full max-w-6xl space-y-6 px-4 sm:px-0">
                
                    <div class="space-y-4">
                        <details class="rounded-2xl border border-studio-line bg-white p-6 transition hover:border-studio-blue/40 dark:border-slate-700 dark:bg-slate-900">
                            <summary class="text-lg flex cursor-pointer items-center justify-between gap-4 text-studio-text dark:text-slate-100">
                               Q 1. Is this password generator safe to use?
                            </summary>
                            <p class="mt-3 text-1xl text-studio-muted dark:text-slate-300 bg-gray-200 dark:bg-gray-700 p-4 rounded-lg">
                              Yes, our password generator is completely safe. All passwords are created directly in your browser and are never sent to any server, ensuring full privacy and security.
                            </p>
                        </details>
                        <details class="rounded-2xl border border-studio-line bg-white p-6 transition hover:border-studio-blue/40 dark:border-slate-700 dark:bg-slate-900">
                            <summary class="text-lg flex cursor-pointer items-center justify-between gap-4 text-studio-text dark:text-slate-100">
                                Q 2. Do you store or save generated passwords?
                            </summary>
                            <p class="mt-3 text-1xl text-studio-muted dark:text-slate-300 bg-gray-200 dark:bg-gray-700 p-4 rounded-lg">
                              No, we do not store, track, or save any passwords. Everything is generated locally on your device for maximum security.</p>
                        </details>
                        <details class="rounded-2xl border border-studio-line bg-white p-6 transition hover:border-studio-blue/40 dark:border-slate-700 dark:bg-slate-900">
                            <summary class="text-lg flex cursor-pointer items-center justify-between gap-4 text-studio-text dark:text-slate-100">
                                Q 3. What makes a password strong?
                            </summary>
                            <p class="mt-3 text-1xl text-studio-muted dark:text-slate-300 bg-gray-200 dark:bg-gray-700 p-4 rounded-lg">
                              A strong password includes a mix of uppercase letters, lowercase letters, numbers, and special symbols. It should also be at least 12–16 characters long and unique for every account.</p>
                        </details>

                        <details class="rounded-2xl border border-studio-line bg-white p-6 transition hover:border-studio-blue/40 dark:border-slate-700 dark:bg-slate-900">
                            <summary class="text-lg flex cursor-pointer items-center justify-between gap-4 text-studio-text dark:text-slate-100">
                                Q 4. Can I customize the password?
                            </summary>
                            <p class="mt-3 text-1xl text-studio-muted dark:text-slate-300 bg-gray-200 dark:bg-gray-700 p-4 rounded-lg">
                              Yes, you can fully customize your password by selecting length, and choosing whether to include uppercase letters, lowercase letters, numbers, and symbols.</p>
                        </details>

                        <details class="rounded-2xl border border-studio-line bg-white p-6 transition hover:border-studio-blue/40 dark:border-slate-700 dark:bg-slate-900">
                            <summary class="text-lg flex cursor-pointer items-center justify-between gap-4 text-studio-text dark:text-slate-100">
                                Q 5. Is this password generator free?
                            </summary>
                            <p class="mt-3 text-1xl text-studio-muted dark:text-slate-300 bg-gray-200 dark:bg-gray-700 p-4 rounded-lg">
                              Yes, our tool is 100% free to use with no hidden charges or subscriptions.</p>
                        </details>

                        <details class="rounded-2xl border border-studio-line bg-white p-6 transition hover:border-studio-blue/40 dark:border-slate-700 dark:bg-slate-900">
                            <summary class="text-lg flex cursor-pointer items-center justify-between gap-4 text-studio-text dark:text-slate-100">
                                Q 6. Does this tool work on mobile devices?
                            </summary>
                            <p class="mt-3 text-1xl text-studio-muted dark:text-slate-300 bg-gray-200 dark:bg-gray-700 p-4 rounded-lg">
                              Absolutely! Our password generator is fully responsive and works smoothly on mobile phones, tablets, and desktops.</p>
                        </details>

                        <details class="rounded-2xl border border-studio-line bg-white p-6 transition hover:border-studio-blue/40 dark:border-slate-700 dark:bg-slate-900">
                            <summary class="text-lg flex cursor-pointer items-center justify-between gap-4 text-studio-text dark:text-slate-100">
                                Q 7. Can I use these passwords for banking and important accounts?
                            </summary>
                            <p class="mt-3 text-1xl text-studio-muted dark:text-slate-300 bg-gray-200 dark:bg-gray-700 p-4 rounded-lg">
                              Yes, the generated passwords are highly secure and suitable for sensitive accounts like banking, email, and social media.</p>
                        </details>

                        <details class="rounded-2xl border border-studio-line bg-white p-6 transition hover:border-studio-blue/40 dark:border-slate-700 dark:bg-slate-900">
                            <summary class="text-lg flex cursor-pointer items-center justify-between gap-4 text-studio-text dark:text-slate-100">
                                Q 8. Should I use the same password for multiple accounts?
                            </summary>
                            <p class="mt-3 text-1xl text-studio-muted dark:text-slate-300 bg-gray-200 dark:bg-gray-700 p-4 rounded-lg">
                              No, it is strongly recommended to use a unique password for each account to reduce the risk of hacking.</p>
                        </details>                        

                    </div>
                
            </section>

        </section>

        
    </div>
@endsection

@push('scripts')
    <script nonce="{{ $cspNonce }}">
        const STORAGE_KEY = 'password-generator-settings';

        const elements = {
            passwordOutput: document.getElementById('passwordOutput'),
            copyButton: document.getElementById('copyButton'),
            regenButton: document.getElementById('regenButton'),
            toggleVisibility: document.getElementById('toggleVisibility'),
            eyeOpenIcon: document.getElementById('eyeOpenIcon'),
            eyeClosedIcon: document.getElementById('eyeClosedIcon'),
            copyFeedback: document.getElementById('copyFeedback'),
            lengthSlider: document.getElementById('lengthSlider'),
            lengthValue: document.getElementById('lengthValue'),
            strengthText: document.getElementById('strengthText'),
            entropyText: document.getElementById('entropyText'),
            strengthSegments: [...document.getElementById('strengthSegments').children],
        };

        const toggles = {
            upperCase: document.getElementById('upperCase'),
            lowerCase: document.getElementById('lowerCase'),
            numbers: document.getElementById('numbers'),
            symbols: document.getElementById('symbols'),
            excludeSimilar: document.getElementById('excludeSimilar'),
            excludeAmbiguous: document.getElementById('excludeAmbiguous'),
        };

        const BASE_CHARSETS = {
            upperCase: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            lowerCase: 'abcdefghijklmnopqrstuvwxyz',
            numbers: '0123456789',
            symbols: '!@#$%^&*',
        };

        const SIMILAR_CHARS = new Set(['i', 'I', 'l', '1', 'L', 'o', 'O', '0']);
        const AMBIGUOUS_CHARS = new Set(['{', '}', '[', ']', '(', ')', '/', '\\', '\'', '"', '`', ',', ';', ':', '.', '<',
        '>'
    ]);

    function uniqueCharacters(value) {
        return [...new Set(value.split(''))].join('');
    }

    function filterCharacters(value) {
        return value
            .split('')
            .filter((char) => {
                if (toggles.excludeSimilar.checked && SIMILAR_CHARS.has(char)) {
                    return false;
                }

                if (toggles.excludeAmbiguous.checked && AMBIGUOUS_CHARS.has(char)) {
                    return false;
                }

                return true;
            })
            .join('');
    }

    function getSelectedCategories() {
        return Object.keys(BASE_CHARSETS).filter((key) => toggles[key].checked);
    }

    function getActivePools() {
        const categories = getSelectedCategories();

        if (!categories.length) {
            toggles.lowerCase.checked = true;
            categories.push('lowerCase');
        }

        return categories
            .map((key) => ({
                key,
                chars: filterCharacters(BASE_CHARSETS[key]),
            }))
            .filter((group) => group.chars.length > 0);
    }

    function normalizeSelections() {
        let activePools = getActivePools();

        if (!activePools.length) {
            toggles.upperCase.checked = false;
            toggles.lowerCase.checked = true;
            toggles.numbers.checked = false;
            toggles.symbols.checked = false;
            toggles.excludeSimilar.checked = false;
            toggles.excludeAmbiguous.checked = false;
            activePools = getActivePools();
        }

        return activePools;
    }

    function getRandomInt(max) {
        const limit = Math.floor(0x100000000 / max) * max;
        const values = new Uint32Array(1);

        do {
            crypto.getRandomValues(values);
        } while (values[0] >= limit);

        return values[0] % max;
    }

    function pickRandomChar(pool) {
        return pool[getRandomInt(pool.length)];
    }

    function shuffleCharacters(characters) {
        const shuffled = [...characters];

        for (let index = shuffled.length - 1; index > 0; index -= 1) {
            const swapIndex = getRandomInt(index + 1);
            [shuffled[index], shuffled[swapIndex]] = [shuffled[swapIndex], shuffled[index]];
        }

        return shuffled.join('');
    }

    function buildPassword(length, activePools) {
        const combinedPool = uniqueCharacters(activePools.map((group) => group.chars).join(''));
        const requiredChars = activePools.map((group) => pickRandomChar(group.chars));
        const result = [...requiredChars];

        while (result.length < length) {
            result.push(pickRandomChar(combinedPool));
        }

        return {
            password: shuffleCharacters(result),
            poolSize: combinedPool.length,
            categoryCount: activePools.length,
        };
    }

    function calculateEntropy(length, poolSize) {
        return poolSize ? Math.round(length * Math.log2(poolSize)) : 0;
    }

    function evaluateStrength(length, categoryCount, entropy) {
        if (length < 10 || categoryCount <= 1 || entropy < 45) {
            return {
                label: 'Weak',
                segments: 1,
                textClass: 'text-rose-600'
            };
        }

        if (length < 16 || categoryCount <= 2 || entropy < 75) {
            return {
                label: 'Medium',
                segments: 2,
                textClass: 'text-amber-500'
            };
        }

        if (length < 24 || entropy < 110) {
            return {
                label: 'Strong',
                segments: 3,
                textClass: 'text-emerald-600'
            };
        }

        return {
            label: 'Very Strong',
            segments: 4,
            textClass: 'text-[#089c52]'
        };
    }

    function updateSliderFill() {
        const min = Number(elements.lengthSlider.min);
        const max = Number(elements.lengthSlider.max);
        const value = Number(elements.lengthSlider.value);
        const fill = ((value - min) / (max - min)) * 100;
        elements.lengthSlider.style.setProperty('--fill', `${fill}%`);
    }

    function updateVisibilityUi() {
        const showing = elements.passwordOutput.type === 'text';
        elements.eyeOpenIcon.classList.toggle('hidden', !showing);
        elements.eyeClosedIcon.classList.toggle('hidden', showing);
        elements.toggleVisibility.setAttribute('aria-label', showing ? 'Hide password' : 'Show password');
    }

    function updateLengthLabel() {
        elements.lengthValue.textContent = elements.lengthSlider.value;
        updateSliderFill();
    }

    function updateStrengthUi(length, categoryCount, poolSize) {
        const entropy = calculateEntropy(length, poolSize);
        const strength = evaluateStrength(length, categoryCount, entropy);

        elements.strengthText.textContent = strength.label;
        elements.strengthText.className = `font-semibold ${strength.textClass}`;
        elements.entropyText.textContent = `~${entropy} bits`;

        elements.strengthSegments.forEach((segment, index) => {
            segment.className = `h-1.5 rounded-full transition-colors ${
              index < strength.segments ? 'bg-studio-green' : 'bg-transparent'
            }`;
            });
        }

        function saveSettings() {
            const settings = {
                length: Number(elements.lengthSlider.value),
                visible: elements.passwordOutput.type === 'text',
                upperCase: toggles.upperCase.checked,
                lowerCase: toggles.lowerCase.checked,
                numbers: toggles.numbers.checked,
                symbols: toggles.symbols.checked,
                excludeSimilar: toggles.excludeSimilar.checked,
                excludeAmbiguous: toggles.excludeAmbiguous.checked,
            };

            localStorage.setItem(STORAGE_KEY, JSON.stringify(settings));
        }

        function loadSettings() {
            try {
                const saved = JSON.parse(localStorage.getItem(STORAGE_KEY) || '{}');

                if (typeof saved.length === 'number') {
                    elements.lengthSlider.value = String(Math.min(50, Math.max(6, saved.length)));
                }

                Object.keys(toggles).forEach((key) => {
                    if (typeof saved[key] === 'boolean') {
                        toggles[key].checked = saved[key];
                    }
                });

                elements.passwordOutput.type = saved.visible === false ? 'password' : 'text';
            } catch (error) {
                console.warn('Unable to load saved settings.', error);
            }

            updateVisibilityUi();
        }

        function generatePassword() {
            const activePools = normalizeSelections();
            const length = Number(elements.lengthSlider.value);
            const {
                password,
                poolSize,
                categoryCount
            } = buildPassword(length, activePools);

            elements.passwordOutput.value = password;
            updateLengthLabel();
            updateStrengthUi(length, categoryCount, poolSize);
            saveSettings();
        }

        async function copyPassword() {
            try {
                await navigator.clipboard.writeText(elements.passwordOutput.value);
                elements.copyButton.querySelector('span').textContent = 'Copied';
                elements.copyFeedback.textContent = 'Password copied to clipboard.';
            } catch (error) {
                elements.copyFeedback.textContent =
                'Clipboard access failed. Select the password and copy it manually.';
            }

            window.setTimeout(() => {
                elements.copyButton.querySelector('span').textContent = 'Copy';
                elements.copyFeedback.textContent =
                    'Generated locally in your browser using crypto-secure randomness.';
            }, 1400);
        }

        function togglePasswordVisibility() {
            elements.passwordOutput.type = elements.passwordOutput.type === 'text' ? 'password' : 'text';
            updateVisibilityUi();
            saveSettings();
        }

        function attachEvents() {
            elements.lengthSlider.addEventListener('input', generatePassword);
            elements.regenButton.addEventListener('click', generatePassword);
            elements.copyButton.addEventListener('click', copyPassword);
            elements.toggleVisibility.addEventListener('click', togglePasswordVisibility);

            Object.values(toggles).forEach((input) => {
                input.addEventListener('change', generatePassword);
            });
        }

        loadSettings();
        attachEvents();
        updateLengthLabel();
        generatePassword();
    </script>
@endpush
