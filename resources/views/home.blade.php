@php
    $b = config('business');
    $services = $b['services'];
    $phones = $b['phones'];
    $primaryDisplay = array_key_first($phones);
    $primaryTel = $phones[$primaryDisplay];
    $addr = $b['address'];
    $fullAddress = "{$addr['street']}, {$addr['suburb']}, {$addr['city']}";
    $metaDescription = 'Munyewu Travel & Tours arranges Cape Town city and Winelands tours, airport transfers and private chauffeur trips from Thornton. Request a quote — every booking is confirmed personally.';

    $jsonLd = [
        '@context' => 'https://schema.org',
        '@type' => 'TravelAgency',
        'name' => $b['name'],
        'description' => $metaDescription,
        'url' => url('/'),
        'telephone' => array_values($phones),
        'areaServed' => ['Cape Town', 'Winelands', 'Stellenbosch', 'Franschhoek', 'Cape Town International Airport'],
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $addr['street'],
            'addressLocality' => $addr['suburb'],
            'addressRegion' => $addr['city'],
            'addressCountry' => 'ZA',
        ],
    ];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cape Town tours &amp; private transfers | {{ $b['name'] }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <link rel="canonical" href="{{ url('/') }}">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Cape Town tours &amp; private transfers | {{ $b['name'] }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="{{ url('/images/hero-cape-town-aerial.jpg') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preload" as="image" href="{{ asset('images/hero-cape-town-aerial.webp') }}" type="image/webp" fetchpriority="high">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script type="application/ld+json">
        {!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
</head>
<body>
    <a href="#enquiry" class="sr-only focus:not-sr-only focus:fixed focus:top-3 focus:left-3 focus:z-[100] focus:btn focus:btn-primary">Skip to enquiry form</a>

    {{-- ===================== Header ===================== --}}
    <header data-site-header class="site-header">
        <div class="wrap">
            <div class="header-bar">
                <a href="#top" class="flex flex-col leading-none" aria-label="{{ $b['name'] }} — home">
                    <span class="font-display text-2xl tracking-wide text-paper">Munyewu</span>
                    <span class="text-[0.6rem] font-semibold uppercase tracking-[0.3em] text-gold">Travel &amp; Tours</span>
                </a>

                <nav class="hidden items-center gap-8 lg:flex" aria-label="Primary">
                    <a href="#tours" class="text-sm font-medium text-paper/80 hover:text-paper">Tours</a>
                    <a href="#transfers" class="text-sm font-medium text-paper/80 hover:text-paper">Transfers</a>
                    <a href="#contact" class="text-sm font-medium text-paper/80 hover:text-paper">Contact</a>
                    <a href="#enquiry" class="btn btn-primary">Enquire</a>
                </nav>

                <button type="button" class="lg:hidden btn btn-ghost" data-menu-toggle aria-expanded="false" aria-controls="mobile-menu">
                    Menu
                </button>
            </div>
        </div>

        <div id="mobile-menu" data-menu hidden class="lg:hidden">
            <div class="wrap">
                <nav class="mt-2 flex flex-col gap-1 rounded-xl border border-paper/10 bg-navy/95 p-2 shadow-[0_14px_34px_-16px_rgba(0,0,0,0.55)] backdrop-blur-md" aria-label="Mobile">
                    <a href="#tours" class="rounded-xl px-4 py-3 text-base font-medium text-paper/90 hover:bg-paper/5">Tours</a>
                    <a href="#transfers" class="rounded-xl px-4 py-3 text-base font-medium text-paper/90 hover:bg-paper/5">Transfers</a>
                    <a href="#contact" class="rounded-xl px-4 py-3 text-base font-medium text-paper/90 hover:bg-paper/5">Contact</a>
                    <a href="#enquiry" class="btn btn-primary m-2 self-start">Enquire</a>
                </nav>
            </div>
        </div>
    </header>

    <main id="top">
        {{-- ===================== Hero ===================== --}}
        <section class="hero relative isolate flex min-h-[100svh] items-end overflow-hidden bg-navy"
                 aria-label="Cape Town tours and private transfers"
                 aria-roledescription="carousel" data-hero>
            <div class="hero-slides absolute inset-0 -z-10">
                <div class="hero-slide is-active" data-slide data-location="Cape Town"
                     role="group" aria-roledescription="slide" aria-label="Slide 1 of 3">
                    <picture>
                        <source srcset="{{ asset('images/hero-cape-town-aerial.webp') }}" type="image/webp">
                        <img src="{{ asset('images/hero-cape-town-aerial.jpg') }}"
                             alt="Aerial view of Cape Town with Table Mountain, the city bowl and the Atlantic coastline"
                             width="1774" height="887" fetchpriority="high"
                             class="hero-img h-full w-full object-cover">
                    </picture>
                </div>
                <div class="hero-slide" data-slide data-location="V&amp;A Waterfront, Cape Town"
                     role="group" aria-roledescription="slide" aria-label="Slide 2 of 3" aria-hidden="true">
                    <picture>
                        <source srcset="{{ asset('images/hero-cape-wheel.webp') }}" type="image/webp">
                        <img src="{{ asset('images/hero-cape-wheel.jpg') }}"
                             alt="The Cape Wheel at the V&amp;A Waterfront with Table Mountain rising behind the city"
                             width="2000" height="1331" loading="lazy"
                             class="h-full w-full object-cover">
                    </picture>
                </div>
                <div class="hero-slide" data-slide data-location="Knysna, Garden Route"
                     role="group" aria-roledescription="slide" aria-label="Slide 3 of 3" aria-hidden="true">
                    <picture>
                        <source srcset="{{ asset('images/hero-garden-route.webp') }}" type="image/webp">
                        <img src="{{ asset('images/hero-garden-route.jpg') }}"
                             alt="The Knysna Heads on the Garden Route, forested cliffs meeting the blue sea"
                             width="2000" height="1331" loading="lazy"
                             class="h-full w-full object-cover">
                    </picture>
                </div>
                <div class="hero-overlay absolute inset-0"></div>
            </div>

            <div class="wrap w-full pb-16 pt-28 sm:pb-24">
                <div class="max-w-3xl">
                    <p class="mb-6 flex items-center gap-3 text-xs font-semibold uppercase tracking-[0.3em] text-paper/80">
                        <span class="inline-flex items-center gap-2">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" aria-hidden="true" class="shrink-0 text-gold">
                                <path d="M12 21s7-5.2 7-11a7 7 0 1 0-14 0c0 5.8 7 11 7 11Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                                <circle cx="12" cy="10" r="2.4" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            <span data-hero-location aria-live="polite">Cape Town</span>
                        </span>
                    </p>
                    <h1 class="hero-title font-display text-[clamp(2.25rem,5.5vw,4.5rem)] leading-[0.98] tracking-[0.015em] text-paper">
                        Cape Town tours<br> and private transfers
                    </h1>
                    <p class="mt-6 max-w-xl text-lg text-paper/85 sm:text-xl">
                        Explore the city and Winelands, arrange an airport pickup, or plan a day with a private chauffeur.
                    </p>
                    <div class="mt-9 flex flex-wrap items-center gap-4">
                        <a href="#enquiry" class="btn btn-primary" data-service="">Plan my trip</a>
                        <a href="#tours" class="btn btn-ghost bg-paper/5 backdrop-blur-sm">Explore tours</a>
                    </div>
                </div>
            </div>

            <div class="hero-nav absolute bottom-8 right-[var(--gutter)] z-20 flex flex-col items-end gap-4">
                <button type="button" class="hero-preview hidden sm:inline-flex" data-hero-preview aria-label="Go to next slide">
                    <span class="hero-preview-thumb">
                        <img data-hero-preview-img src="" alt="" width="96" height="60">
                    </span>
                    <span class="hero-preview-text">
                        <span class="hero-preview-label">Up next</span>
                        <span class="hero-preview-loc" data-hero-preview-loc>Cape Town</span>
                    </span>
                    <svg class="hero-preview-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>

                <div class="flex items-center gap-3">
                    <button type="button" class="hero-arrow" data-hero-prev aria-label="Previous slide">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M15 6l-6 6 6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                    <div class="flex items-center gap-2" role="group" aria-label="Choose slide">
                        <button type="button" class="hero-dot is-active" data-hero-dot aria-label="Go to slide 1" aria-current="true"></button>
                        <button type="button" class="hero-dot" data-hero-dot aria-label="Go to slide 2"></button>
                        <button type="button" class="hero-dot" data-hero-dot aria-label="Go to slide 3"></button>
                    </div>
                    <button type="button" class="hero-arrow" data-hero-next aria-label="Next slide">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                </div>
            </div>
        </section>

        {{-- ===================== Tours ===================== --}}
        <section id="tours" class="section bg-paper text-navy">
            <div class="wrap">
                <header class="mb-10 flex flex-wrap items-end justify-between gap-6 lg:mb-14">
                    <div class="max-w-2xl">
                        <p class="mb-3 text-xs font-semibold uppercase tracking-[0.25em] text-gold-600">Tours</p>
                        <h2 class="font-display text-[clamp(2rem,5vw,3.75rem)] leading-[1.02] text-navy">
                            Cape Town tours and day trips
                        </h2>
                    </div>
                    <a href="#enquiry" data-service="" class="btn hidden border border-navy/25 text-navy hover:bg-navy hover:text-paper sm:inline-flex">Plan my trip</a>
                </header>

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    {{-- City tour --}}
                    <article class="tour-card feature group relative flex flex-col overflow-hidden rounded-xl bg-white text-navy transition-transform duration-300 hover:-translate-y-1">
                        <div class="feature-media aspect-[4/3] overflow-hidden">
                            <picture>
                                <source srcset="{{ asset('images/tour-city.webp') }}" type="image/webp">
                                <img src="{{ asset('images/tour-city.jpg') }}" alt="Colourful houses on a Bo-Kaap street in central Cape Town" width="1000" height="666" loading="lazy" class="h-full w-full object-cover">
                            </picture>
                        </div>
                        <div class="flex flex-1 flex-col p-6">
                            <div class="mb-3 flex items-center gap-2 text-[0.7rem] font-semibold uppercase tracking-[0.15em] text-navy/55">
                                <span class="inline-flex items-center gap-1.5"><span class="h-1.5 w-1.5 rounded-full bg-gold"></span>Guided day</span>
                                <span class="text-navy/25">·</span><span>Private vehicle</span>
                            </div>
                            <h3 class="font-display text-2xl leading-none">Cape Town city tours</h3>
                            <p class="mt-2 text-sm leading-relaxed text-navy/65">The waterfront, Table Mountain and the city's best viewpoints — at the pace you choose.</p>
                            <a href="#enquiry" data-service="city-tour" class="mt-5 inline-flex items-center gap-2 border-t border-navy/10 pt-4 text-sm font-semibold text-navy after:absolute after:inset-0">
                                Enquire about a city tour <span aria-hidden="true" class="text-gold">→</span>
                            </a>
                        </div>
                    </article>

                    {{-- Winelands tour --}}
                    <article class="tour-card feature group relative flex flex-col overflow-hidden rounded-xl bg-white text-navy transition-transform duration-300 hover:-translate-y-1">
                        <div class="feature-media aspect-[4/3] overflow-hidden">
                            <picture>
                                <source srcset="{{ asset('images/tour-winelands.webp') }}" type="image/webp">
                                <img src="{{ asset('images/tour-winelands.jpg') }}" alt="Vineyard rows with mountains behind in the Stellenbosch Winelands" width="1000" height="750" loading="lazy" class="h-full w-full object-cover">
                            </picture>
                        </div>
                        <div class="flex flex-1 flex-col p-6">
                            <div class="mb-3 flex items-center gap-2 text-[0.7rem] font-semibold uppercase tracking-[0.15em] text-navy/55">
                                <span class="inline-flex items-center gap-1.5"><span class="h-1.5 w-1.5 rounded-full bg-gold"></span>Full day</span>
                                <span class="text-navy/25">·</span><span>Private driver</span>
                            </div>
                            <h3 class="font-display text-2xl leading-none">Winelands tours</h3>
                            <p class="mt-2 text-sm leading-relaxed text-navy/65">Vineyards and estates around Stellenbosch and Franschhoek, with a private vehicle and driver for the day.</p>
                            <a href="#enquiry" data-service="winelands-tour" class="mt-5 inline-flex items-center gap-2 border-t border-navy/10 pt-4 text-sm font-semibold text-navy after:absolute after:inset-0">
                                Enquire about a Winelands tour <span aria-hidden="true" class="text-gold">→</span>
                            </a>
                        </div>
                    </article>

                    {{-- Custom trip promo (mirrors Touriva's promo card) --}}
                    <article class="tour-card relative flex flex-col rounded-xl bg-white p-7 text-navy md:col-span-2 lg:col-span-1">
                        <span class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-gold/15 text-gold-600">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/><path d="M15.5 8.5l-2 5-5 2 2-5 5-2Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
                        </span>
                        <h3 class="mt-5 font-display text-2xl leading-none">Something else in mind?</h3>
                        <p class="mt-2 text-sm leading-relaxed text-navy/65">Cape Point, a custom route or a special occasion — tell us the plan and we'll arrange the day and the vehicle.</p>
                        <a href="#enquiry" data-service="other" class="btn bg-navy text-paper hover:bg-navy-800 mt-6 self-start after:absolute after:inset-0">Plan a custom trip</a>
                    </article>
                </div>
            </div>
        </section>

        {{-- ===================== Services ===================== --}}
        <section id="transfers" class="section bg-paper text-navy">
            <div class="wrap">
                <header class="mb-10 flex flex-wrap items-end justify-between gap-6 lg:mb-14">
                    <div class="max-w-2xl">
                        <p class="mb-3 text-xs font-semibold uppercase tracking-[0.25em] text-gold-600">Services</p>
                        <h2 class="font-display text-[clamp(2rem,5vw,3.75rem)] leading-[1.02] text-navy">Private transport across the Cape</h2>
                    </div>
                    <a href="#enquiry" data-service="" class="btn hidden border border-navy/25 text-navy hover:bg-navy hover:text-paper sm:inline-flex">Request a quote</a>
                </header>

                {{-- Featured service --}}
                <article class="group relative flex min-h-[18rem] items-end overflow-hidden rounded-xl lg:min-h-[22rem]">
                    <picture>
                        <source srcset="{{ asset('images/service-chauffeur.webp') }}" type="image/webp">
                        <img src="{{ asset('images/service-chauffeur.jpg') }}" alt="Chapman's Peak Drive, the coastal road near Cape Town" width="1800" height="1200" loading="lazy" class="absolute inset-0 h-full w-full object-cover">
                    </picture>
                    <div class="absolute inset-0 bg-gradient-to-r from-navy via-navy/75 to-navy/20"></div>
                    <div class="relative z-10 max-w-xl p-7 lg:p-12">
                        <p class="mb-3 text-xs font-semibold uppercase tracking-[0.25em] text-gold">Private transport</p>
                        <h3 class="font-display text-[clamp(2rem,4.5vw,3.5rem)] leading-[0.98] text-paper">Private chauffeur &amp; luxury travel</h3>
                        <p class="mt-3 text-paper/80">Meetings, events, a scenic drive along the coast, or a route you set yourself — by the hour or for the day.</p>
                        <ul class="mt-5 space-y-2 text-sm text-paper/80">
                            <li class="flex items-center gap-2"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true" class="shrink-0 text-gold"><path d="M5 12l4 4 10-10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>A professional driver and a comfortable vehicle</li>
                            <li class="flex items-center gap-2"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true" class="shrink-0 text-gold"><path d="M5 12l4 4 10-10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>Luxury car, SUV or 11-seater, to your group size</li>
                        </ul>
                        <a href="#enquiry" data-service="private-chauffeur" class="btn btn-primary mt-7">Request a chauffeur</a>
                    </div>
                    <span class="pointer-events-none absolute bottom-3 right-3 z-10 text-[0.6rem] text-paper/40">Photo: Diego Delso / CC BY-SA 4.0</span>
                </article>

                {{-- Smaller service cards --}}
                <div class="mt-6 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    <article class="group relative flex min-h-[19rem] flex-col justify-end overflow-hidden rounded-xl">
                        <picture>
                            <source srcset="{{ asset('images/hero-cape-town-aerial.webp') }}" type="image/webp">
                            <img src="{{ asset('images/hero-cape-town-aerial.jpg') }}" alt="Cape Town and Table Mountain from the air" width="1774" height="887" loading="lazy" class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        </picture>
                        <div class="absolute inset-0 bg-gradient-to-t from-navy via-navy/40 to-transparent"></div>
                        <div class="relative z-10 p-6">
                            <p class="text-[0.7rem] font-semibold uppercase tracking-[0.15em] text-paper/70">Door to door</p>
                            <h3 class="mt-1 font-display text-2xl text-paper">Airport transfers</h3>
                            <p class="mt-1 text-sm text-paper/70">To and from Cape Town International.</p>
                            <span class="btn mt-4 inline-flex bg-paper text-navy group-hover:bg-white">Request a transfer</span>
                        </div>
                        <a href="#enquiry" data-service="airport-transfer" class="absolute inset-0 z-20" aria-label="Airport transfers — request a transfer"></a>
                    </article>

                    <article class="group relative flex min-h-[19rem] flex-col justify-end overflow-hidden rounded-xl">
                        <picture>
                            <source srcset="{{ asset('images/hero-cape-wheel.webp') }}" type="image/webp">
                            <img src="{{ asset('images/hero-cape-wheel.jpg') }}" alt="The V&amp;A Waterfront in Cape Town" width="2000" height="1331" loading="lazy" class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        </picture>
                        <div class="absolute inset-0 bg-gradient-to-t from-navy via-navy/40 to-transparent"></div>
                        <div class="relative z-10 p-6">
                            <p class="text-[0.7rem] font-semibold uppercase tracking-[0.15em] text-paper/70">Up to 11 seats</p>
                            <h3 class="mt-1 font-display text-2xl text-paper">Groups &amp; events</h3>
                            <p class="mt-1 text-sm text-paper/70">A function, a tour or an airport run for the whole group.</p>
                            <span class="btn mt-4 inline-flex bg-paper text-navy group-hover:bg-white">Request a vehicle</span>
                        </div>
                        <a href="#enquiry" data-service="other" class="absolute inset-0 z-20" aria-label="Groups and events — request a vehicle"></a>
                    </article>

                    <article class="tour-card relative flex flex-col justify-center rounded-xl bg-white p-7 text-navy md:col-span-2 lg:col-span-1">
                        <span class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-gold/15 text-gold-600">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/><path d="M15.5 8.5l-2 5-5 2 2-5 5-2Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
                        </span>
                        <h3 class="mt-5 font-display text-2xl leading-none">Something else in mind?</h3>
                        <p class="mt-2 text-sm leading-relaxed text-navy/65">Cape Point, a wedding, a conference transfer — tell us the plan and we'll arrange it.</p>
                        <a href="#enquiry" data-service="other" class="btn bg-navy text-paper hover:bg-navy-800 mt-6 self-start after:absolute after:inset-0">Plan a custom trip</a>
                    </article>
                </div>

                <p class="mt-6 text-sm text-navy/55">Availability and arrangements are confirmed with you directly.</p>
            </div>
        </section>

        {{-- ===================== Why Munyewu ===================== --}}
        <section id="why" class="section bg-navy text-paper">
            <div class="wrap">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="mb-4 text-xs font-semibold uppercase tracking-[0.25em] text-gold">Why Munyewu</p>
                    <h2 class="font-display text-[clamp(2rem,5.5vw,4rem)] leading-[0.98] text-paper">
                        Hassle-free travel,<br> your comfort our priority
                    </h2>
                    <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                        <a href="#enquiry" data-service="" class="btn btn-primary">Plan my trip</a>
                        <a href="#tours" class="btn btn-ghost bg-paper/5">Explore tours</a>
                    </div>
                </div>

                <div class="mt-14 grid gap-x-10 gap-y-12 sm:grid-cols-2 lg:mt-20 lg:grid-cols-3">
                    <div>
                        <span class="text-gold">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 16l1.2-5.2A2 2 0 0 1 7.14 9h9.72a2 2 0 0 1 1.94 1.8L20 16M4 16h16M4 16v2m16-2v2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><circle cx="7.5" cy="16" r="1.2" fill="currentColor"/><circle cx="16.5" cy="16" r="1.2" fill="currentColor"/></svg>
                        </span>
                        <h3 class="mt-4 font-display text-2xl text-paper">Private vehicle &amp; driver</h3>
                        <p class="mt-2 text-paper/70">Just your group — never a shared shuttle.</p>
                    </div>
                    <div>
                        <span class="text-gold">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 21s7-5.2 7-11a7 7 0 1 0-14 0c0 5.8 7 11 7 11Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><circle cx="12" cy="10" r="2.4" stroke="currentColor" stroke-width="1.8"/></svg>
                        </span>
                        <h3 class="mt-4 font-display text-2xl text-paper">Door-to-door</h3>
                        <p class="mt-2 text-paper/70">Collected and dropped exactly where you need.</p>
                    </div>
                    <div>
                        <span class="text-gold">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M15.5 8.5l-2 5-5 2 2-5 5-2Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
                        </span>
                        <h3 class="mt-4 font-display text-2xl text-paper">Cape Town locals</h3>
                        <p class="mt-2 text-paper/70">Drivers who know the city and the Winelands.</p>
                    </div>
                    <div>
                        <span class="text-gold">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M12 7.5V12l3 2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <h3 class="mt-4 font-display text-2xl text-paper">Your pace, your route</h3>
                        <p class="mt-2 text-paper/70">Flexible itineraries, not fixed timetables.</p>
                    </div>
                    <div>
                        <span class="text-gold">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <h3 class="mt-4 font-display text-2xl text-paper">Airport-ready</h3>
                        <p class="mt-2 text-paper/70">We track your flight and plan the timing.</p>
                    </div>
                    <div>
                        <span class="text-gold">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M8.5 12l2.5 2.5 4.5-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <h3 class="mt-4 font-display text-2xl text-paper">Confirmed personally</h3>
                        <p class="mt-2 text-paper/70">Every booking confirmed with you directly.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===================== Bespoke / talk to us ===================== --}}
        <section id="bespoke" class="section bg-paper text-navy">
            <div class="wrap grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
                {{-- Featured image card --}}
                <div class="relative flex min-h-[22rem] items-end overflow-hidden rounded-xl shadow-[0_28px_60px_-34px_rgba(36,40,61,0.6)] lg:min-h-[30rem]">
                    <picture>
                        <source srcset="{{ asset('images/hero-garden-route.webp') }}" type="image/webp">
                        <img src="{{ asset('images/hero-garden-route.jpg') }}" alt="The Knysna Heads on the Garden Route, forested cliffs meeting the sea" width="2000" height="1331" loading="lazy" class="absolute inset-0 h-full w-full object-cover">
                    </picture>
                    <div class="absolute inset-0 bg-gradient-to-t from-navy via-navy/30 to-transparent"></div>
                    <div class="relative z-10 p-7 text-paper lg:p-9">
                        <h3 class="font-display text-3xl leading-none">Knysna &amp; the Garden Route</h3>
                        <p class="mt-2 max-w-md text-sm text-paper/80">Forest, lagoons and dramatic coastline on a private road trip east of Cape Town.</p>
                        <div class="mt-4 flex flex-col gap-2 text-sm text-paper/85">
                            <span class="flex items-center gap-2">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true" class="shrink-0 text-gold"><path d="M5 15l.9-3.6A1.6 1.6 0 0 1 7.4 10h9.2a1.6 1.6 0 0 1 1.5 1.4L19 15M5 15h14M5 15v1.5m14-1.5v1.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                Private vehicle · multi-day
                            </span>
                            <span class="flex items-center gap-2">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true" class="shrink-0 text-gold"><path d="M12 21s7-5.2 7-11a7 7 0 1 0-14 0c0 5.8 7 11 7 11Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><circle cx="12" cy="10" r="2.2" stroke="currentColor" stroke-width="1.8"/></svg>
                                Cape Town → Garden Route
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Copy + call to action --}}
                <div>
                    <p class="mb-4 text-xs font-semibold uppercase tracking-[0.25em] text-gold-600">Bespoke planning</p>
                    <h2 class="font-display text-[clamp(2rem,5vw,3.75rem)] leading-[1.0] text-navy">
                        Explore the Cape,<br> your way
                    </h2>
                    <p class="mt-5 max-w-lg text-lg text-navy/70">
                        Tell us what you'd like to see and we'll plan it around you — a single transfer, a guided day tour, or a multi-day private trip through the Winelands and along the coast.
                    </p>
                    <p class="mt-4 max-w-lg text-navy/60">
                        Share your plans and we'll turn them into a route that fits.
                    </p>
                    <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-4">
                        <a href="#enquiry" data-service="" class="btn btn-primary">Enquire now</a>
                        <a href="tel:{{ $primaryTel }}" class="inline-flex items-center gap-2 font-semibold text-navy hover:text-gold-600">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true" class="text-gold-600"><path d="M5 12a7 7 0 0 1 14 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><rect x="3" y="12" width="4" height="7" rx="1.5" stroke="currentColor" stroke-width="1.8"/><rect x="17" y="12" width="4" height="7" rx="1.5" stroke="currentColor" stroke-width="1.8"/><path d="M19 19a3 3 0 0 1-3 3h-2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                            {{ $primaryDisplay }}
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===================== Handpicked collections ===================== --}}
        <section id="collections" class="section bg-paper text-navy">
            <div class="wrap">
                <header class="mb-10 max-w-2xl lg:mb-14">
                    <p class="mb-3 text-xs font-semibold uppercase tracking-[0.25em] text-gold-600">Destinations</p>
                    <h2 class="font-display text-[clamp(2rem,5vw,3.75rem)] leading-[1.02] text-navy">Handpicked collections for you</h2>
                </header>
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @php
                        $collections = [
                            ['img' => 'hero-cape-town-aerial', 'w' => 1774, 'h' => 887, 'title' => 'Cape Town', 'desc' => 'Table Mountain, the city bowl and the V&A Waterfront.', 'service' => 'city-tour', 'alt' => 'Cape Town and Table Mountain from the air'],
                            ['img' => 'tour-winelands', 'w' => 1000, 'h' => 750, 'title' => 'The Winelands', 'desc' => 'Vineyards and estates around Stellenbosch & Franschhoek.', 'service' => 'winelands-tour', 'alt' => 'Vineyards in the Cape Winelands'],
                            ['img' => 'collection-cape-point', 'w' => 1000, 'h' => 666, 'title' => 'Cape Point', 'desc' => 'Cliffs and lighthouses where the peninsula ends.', 'service' => 'other', 'alt' => 'The headland and path at Cape Point'],
                            ['img' => 'collection-penguins', 'w' => 1000, 'h' => 629, 'title' => 'Boulders Beach', 'desc' => 'The African penguin colony at Simon\'s Town.', 'service' => 'other', 'alt' => 'African penguins on the white sand at Boulders Beach'],
                        ];
                    @endphp
                    @foreach ($collections as $c)
                        <article class="tour-card feature group relative flex flex-col overflow-hidden rounded-xl bg-white text-navy transition-transform duration-300 hover:-translate-y-1">
                            <div class="feature-media aspect-[4/3] overflow-hidden">
                                <picture>
                                    <source srcset="{{ asset('images/'.$c['img'].'.webp') }}" type="image/webp">
                                    <img src="{{ asset('images/'.$c['img'].'.jpg') }}" alt="{{ $c['alt'] }}" width="{{ $c['w'] }}" height="{{ $c['h'] }}" loading="lazy" class="h-full w-full object-cover">
                                </picture>
                            </div>
                            <div class="flex flex-1 flex-col p-5">
                                <h3 class="font-display text-2xl leading-none">{{ $c['title'] }}</h3>
                                <p class="mt-1 text-sm leading-relaxed text-navy/65">{{ $c['desc'] }}</p>
                                <a href="#enquiry" data-service="{{ $c['service'] }}" class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-navy after:absolute after:inset-0">Enquire <span aria-hidden="true" class="text-gold">→</span></a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ===================== CTA banner ===================== --}}
        <section class="bg-paper pb-16 lg:pb-24">
            <div class="wrap">
                <div class="relative overflow-hidden rounded-2xl">
                    <picture>
                        <source srcset="{{ asset('images/service-chauffeur.webp') }}" type="image/webp">
                        <img src="{{ asset('images/service-chauffeur.jpg') }}" alt="" width="1800" height="1200" loading="lazy" class="absolute inset-0 h-full w-full object-cover">
                    </picture>
                    <div class="absolute inset-0 bg-gradient-to-r from-navy via-navy/80 to-navy/30"></div>
                    <div class="relative z-10 flex flex-col gap-6 p-8 lg:flex-row lg:items-center lg:justify-between lg:p-12">
                        <div class="max-w-xl">
                            <h2 class="font-display text-[clamp(1.75rem,3.5vw,2.75rem)] leading-[1.02] text-paper">Cape Town is waiting — let's plan your trip</h2>
                            <p class="mt-2 text-paper/80">City tours, Winelands days and private transfers, arranged around you.</p>
                        </div>
                        <a href="#enquiry" data-service="" class="btn btn-primary shrink-0">Enquire now</a>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===================== Value / assurances ===================== --}}
        <section id="offers" class="section bg-paper text-navy">
            <div class="wrap">
                <header class="mb-10 max-w-2xl lg:mb-14">
                    <p class="mb-3 text-xs font-semibold uppercase tracking-[0.25em] text-gold-600">Good to know</p>
                    <h2 class="font-display text-[clamp(2rem,5vw,3.5rem)] leading-[1.02] text-navy">What you can count on</h2>
                    <p class="mt-4 text-lg text-navy/65">Genuine value and straight answers — no fine print.</p>
                </header>
                <div class="grid gap-6 md:grid-cols-2">
                    @php
                        $assurances = [
                            ['t' => 'Free, no-obligation quotes', 'd' => 'Tell us your trip and get a price before you commit to anything.', 'p' => 'M9 7h6M9 12h6M9 17h4M6 3h12a1 1 0 0 1 1 1v16l-3-2-2 2-2-2-2 2-2-2-3 2V4a1 1 0 0 1 1-1Z'],
                            ['t' => 'Fixed price, agreed upfront', 'd' => 'The figure we quote is the figure you pay — no surprises on the day.', 'p' => 'M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6l7-3ZM9 12l2 2 4-4'],
                            ['t' => 'One booking, door to door', 'd' => 'Airport pickup, your day tour and the trip back — arranged together.', 'p' => 'M4 12h16M4 12l4-4M4 12l4 4M20 7v10'],
                            ['t' => 'Groups welcome, up to 11', 'd' => 'One vehicle for the family, the team or the wedding party.', 'p' => 'M9 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM17 11a3 3 0 1 0 0-6M3 20v-1a5 5 0 0 1 5-5h2a5 5 0 0 1 5 5v1M16 14h1a5 5 0 0 1 5 5v1'],
                        ];
                    @endphp
                    @foreach ($assurances as $a)
                        <article class="tour-card flex items-start gap-5 rounded-xl bg-white p-6">
                            <span class="inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-gold/15 text-gold-600">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="{{ $a['p'] }}" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <div>
                                <h3 class="font-display text-xl leading-none">{{ $a['t'] }}</h3>
                                <p class="mt-2 text-sm leading-relaxed text-navy/65">{{ $a['d'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ===================== Reviews ===================== --}}
        {{-- NOTE: do not publish invented testimonials. Replace the placeholder below
             with genuine, operator-approved reviews (name, quote, trip) when available. --}}
        <section id="reviews" class="section bg-navy text-paper">
            <div class="wrap text-center">
                <p class="mb-4 text-xs font-semibold uppercase tracking-[0.25em] text-gold">Reviews</p>
                <h2 class="font-display text-[clamp(2rem,5vw,3.75rem)] leading-[1.0] text-paper">What our travellers say</h2>
                <p class="mx-auto mt-4 max-w-xl text-paper/70">Real experiences, published here as we receive them.</p>
                <div class="mx-auto mt-10 max-w-2xl rounded-xl border border-paper/15 bg-paper/5 p-8 backdrop-blur-sm sm:p-10">
                    <svg width="34" height="34" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="mx-auto text-gold"><path d="M7 7h4v4c0 2.5-1.5 4.3-4 5v-2c1.2-.5 2-1.4 2-3H7V7Zm8 0h4v4c0 2.5-1.5 4.3-4 5v-2c1.2-.5 2-1.4 2-3h-2V7Z"/></svg>
                    <p class="mt-5 text-lg text-paper/85">We're gathering genuine reviews from travellers who've explored Cape Town with us. Travelled with Munyewu? We'd love to feature your experience here.</p>
                    <a href="#enquiry" data-service="" class="btn btn-primary mt-7">Share your experience</a>
                </div>
            </div>
        </section>

        {{-- ===================== FAQ ===================== --}}
        <section id="faq" class="section bg-paper text-navy">
            <div class="wrap">
                <header class="mx-auto mb-12 max-w-2xl text-center lg:mb-16">
                    <p class="mb-3 text-xs font-semibold uppercase tracking-[0.25em] text-gold-600">Frequently asked questions</p>
                    <h2 class="font-display text-[clamp(2rem,5vw,3.5rem)] leading-[1.02] text-navy">Everything you need to know before you travel</h2>
                </header>
                <div class="grid gap-x-12 md:grid-cols-2">
                    @php
                        $faqs = [
                            ['q' => 'What services do you offer?', 'a' => 'Cape Town city and Winelands tours, airport transfers, and private chauffeur or group transport. Tell us what you need and we\'ll arrange it.'],
                            ['q' => 'Can I customise my trip?', 'a' => 'Yes. Share the places you\'d like to see and your dates, and we\'ll plan a route and a vehicle around you.'],
                            ['q' => 'How do I get a price?', 'a' => 'Send an enquiry or call us. Quotes are free and there\'s no obligation; we confirm the details with you before anything is booked.'],
                            ['q' => 'What vehicles do you have?', 'a' => 'A luxury car, an SUV and an 11-seater — matched to your group size.'],
                            ['q' => 'Which areas do you cover?', 'a' => 'Cape Town, the Winelands and Cape Town International Airport, with longer private trips such as the Garden Route on request.'],
                            ['q' => 'How do I book?', 'a' => 'Enquire online or by phone. We reply personally to confirm the timing, the vehicle and the price.'],
                        ];
                    @endphp
                    @foreach ($faqs as $f)
                        <details class="faq-item border-b border-navy/10 py-5">
                            <summary class="flex cursor-pointer list-none items-center gap-4">
                                <span class="faq-icon inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-navy text-paper">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </span>
                                <span class="font-display text-xl leading-tight text-navy">{{ $f['q'] }}</span>
                            </summary>
                            <p class="mt-3 pl-13 text-navy/70">{{ $f['a'] }}</p>
                        </details>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ===================== Enquiry ===================== --}}
        <section id="enquiry" class="section bg-navy">
            <div class="wrap grid gap-12 lg:grid-cols-2 lg:gap-16">
                <div>
                    <p class="mb-3 text-xs font-semibold uppercase tracking-[0.25em] text-gold">Enquire</p>
                    <h2 class="font-display text-[clamp(2.25rem,5vw,3.5rem)] leading-[1.02] text-paper">Request a quote</h2>
                    <p class="mt-5 text-lg text-paper/75">
                        Tell us what you need and one way to reach you. We'll reply personally to confirm the details and the price. It's free and there's no obligation.
                    </p>
                    <p class="mt-8 text-sm text-paper/60">Prefer to talk?</p>
                    <a href="tel:{{ $primaryTel }}" class="enquiry-link mt-1 text-lg">
                        Call {{ $primaryDisplay }}
                    </a>
                </div>

                <div class="rounded-2xl bg-paper p-6 text-navy sm:p-8">
                    @if (session('enquiry_success'))
                        <div data-enquiry-success="{{ session('enquiry_service') }}" role="status"
                             class="rounded-xl border border-navy/10 bg-white p-6">
                            <h3 class="font-display text-3xl leading-none text-navy">Thank you{{ session('enquiry_name') ? ', '.session('enquiry_name') : '' }}</h3>
                            <p class="mt-3 text-navy/75">
                                Your {{ session('enquiry_service') }} enquiry has reached us. We'll be in touch personally to confirm the arrangements. Need us sooner? Call
                                <a href="tel:{{ $primaryTel }}" class="font-semibold underline">{{ $primaryDisplay }}</a>.
                            </p>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div role="alert" class="mb-6 rounded-xl border border-[#b4231f]/30 bg-[#b4231f]/5 p-4 text-sm text-[#b4231f]">
                            Please check the highlighted fields and try again.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('enquiry.store') }}" data-enquiry-form novalidate
                          class="{{ session('enquiry_success') ? 'mt-6' : '' }} grid gap-5">
                        @csrf

                        {{-- Honeypot: hidden from people, tempting to bots --}}
                        <div class="hidden" aria-hidden="true">
                            <label>Company<input type="text" name="company" tabindex="-1" autocomplete="off"></label>
                        </div>

                        <div>
                            <label for="service" class="field-label">Service</label>
                            <select id="service" name="service" class="field-input" required
                                    aria-invalid="{{ $errors->has('service') ? 'true' : 'false' }}"
                                    @if($errors->has('service')) aria-describedby="service-error" @endif>
                                <option value="" disabled @selected(!old('service'))>Choose a service</option>
                                @foreach ($services as $key => $label)
                                    <option value="{{ $key }}" @selected(old('service') === $key)>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('service') <span id="service-error" class="field-error">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="name" class="field-label">Your name</label>
                            <input id="name" name="name" type="text" class="field-input" value="{{ old('name') }}" required autocomplete="name"
                                   aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}"
                                   @if($errors->has('name')) aria-describedby="name-error" @endif>
                            @error('name') <span id="name-error" class="field-error">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="contact" class="field-label">Phone or email</label>
                            <input id="contact" name="contact" type="text" class="field-input" value="{{ old('contact') }}" required
                                   placeholder="So we can send your quote"
                                   aria-invalid="{{ $errors->has('contact') ? 'true' : 'false' }}"
                                   @if($errors->has('contact')) aria-describedby="contact-error" @endif>
                            @error('contact') <span id="contact-error" class="field-error">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="trip_date" class="field-label">Preferred date <span class="font-normal text-navy/50">(optional)</span></label>
                            <input id="trip_date" name="trip_date" type="date" class="field-input" value="{{ old('trip_date') }}" min="{{ now()->toDateString() }}"
                                   aria-invalid="{{ $errors->has('trip_date') ? 'true' : 'false' }}"
                                   @if($errors->has('trip_date')) aria-describedby="trip_date-error" @endif>
                            @error('trip_date') <span id="trip_date-error" class="field-error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Tour-only --}}
                        <div data-when-service="tour" hidden>
                            <label for="group_size" class="field-label">Group size <span class="font-normal text-navy/50">(optional)</span></label>
                            <input id="group_size" name="group_size" type="number" min="1" max="60" class="field-input" value="{{ old('group_size') }}" inputmode="numeric"
                                   @if($errors->has('group_size')) aria-describedby="group_size-error" @endif>
                            @error('group_size') <span id="group_size-error" class="field-error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Transfer-only --}}
                        <div data-when-service="transfer" hidden class="grid gap-5">
                            <div>
                                <label for="pickup" class="field-label">Pickup location <span class="font-normal text-navy/50">(optional)</span></label>
                                <input id="pickup" name="pickup" type="text" class="field-input" value="{{ old('pickup') }}" placeholder="Airport, hotel or address">
                            </div>
                            <div>
                                <label for="destination" class="field-label">Destination <span class="font-normal text-navy/50">(optional)</span></label>
                                <input id="destination" name="destination" type="text" class="field-input" value="{{ old('destination') }}">
                            </div>
                        </div>

                        <div>
                            <label for="notes" class="field-label">Anything else <span class="font-normal text-navy/50">(optional)</span></label>
                            <textarea id="notes" name="notes" rows="3" class="field-input" style="min-height:5.5rem">{{ old('notes') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-1 w-full" data-submit>Send enquiry</button>
                        <p class="text-center text-xs text-navy/50">We only use your details to reply to this enquiry.</p>
                    </form>
                </div>
            </div>
        </section>
    </main>

    {{-- ===================== Footer ===================== --}}
    <footer id="contact" class="bg-navy-900 text-paper">
        <div class="wrap grid gap-10 py-16 sm:grid-cols-2 lg:grid-cols-4">
            <div class="sm:col-span-2 lg:col-span-1">
                <span class="font-display text-3xl tracking-wide">Munyewu</span>
                <p class="mt-1 text-[0.6rem] font-semibold uppercase tracking-[0.3em] text-gold">Travel &amp; Tours</p>
                <p class="mt-4 max-w-xs text-sm text-paper/60">Cape Town tours and private transport, based in Thornton.</p>
            </div>

            <div>
                <h2 class="text-xs font-semibold uppercase tracking-[0.2em] text-paper/50">Visit</h2>
                <address class="mt-4 text-sm not-italic leading-relaxed text-paper/80">
                    {{ $addr['street'] }}<br>
                    {{ $addr['suburb'] }}<br>
                    {{ $addr['city'] }}, {{ $addr['country'] }}
                </address>
            </div>

            <div>
                <h2 class="text-xs font-semibold uppercase tracking-[0.2em] text-paper/50">Call</h2>
                <ul class="mt-4 space-y-2 text-sm">
                    @foreach ($phones as $display => $tel)
                        <li><a href="tel:{{ $tel }}" class="inline-block py-1 text-paper/80 hover:text-gold">{{ $display }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h2 class="text-xs font-semibold uppercase tracking-[0.2em] text-paper/50">Explore</h2>
                <ul class="mt-4 space-y-2 text-sm">
                    <li><a href="#tours" class="text-paper/80 hover:text-gold">Tours</a></li>
                    <li><a href="#transfers" class="text-paper/80 hover:text-gold">Transfers</a></li>
                    <li><a href="#enquiry" class="text-paper/80 hover:text-gold">Enquire</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-paper/10">
            <div class="wrap flex flex-col gap-2 py-6 text-xs text-paper/50 sm:flex-row sm:items-center sm:justify-between">
                <p>© {{ date('Y') }} {{ $b['name'] }}. Cape Town, South Africa.</p>
                <p>Arrangements and availability confirmed directly.</p>
            </div>
        </div>
    </footer>
</body>
</html>
