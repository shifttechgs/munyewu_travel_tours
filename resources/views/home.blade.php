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

        {{-- ===================== Transfers & private travel ===================== --}}
        <section id="transfers" class="section bg-paper text-navy">
            <div class="wrap">
                <header class="max-w-2xl">
                    <p class="mb-3 text-xs font-semibold uppercase tracking-[0.25em] text-gold-600">Transfers</p>
                    <h2 class="font-display text-[clamp(2.25rem,5vw,3.5rem)] leading-[1.02]">Arrange a private transfer</h2>
                    <p class="mt-4 text-lg text-navy/70">
                        Point-to-point travel with a private driver. Luxury car, SUV or 11-seater, confirmed to your group size.
                    </p>
                </header>

                <div class="mt-12 grid gap-6 lg:grid-cols-2">
                    <article class="flex flex-col rounded-xl border border-navy/10 bg-white p-7">
                        <h3 class="font-display text-3xl leading-none">Airport transfers</h3>
                        <p class="mt-3 text-navy/70">
                            Door-to-door transfers to and from Cape Town International. Share your flight and pickup, and we'll plan the timing around it.
                        </p>
                        <a href="#enquiry" class="btn bg-navy text-paper hover:bg-navy-800 mt-6 self-start" data-service="airport-transfer">
                            Request a transfer
                        </a>
                    </article>

                    <article class="flex flex-col rounded-xl border border-navy/10 bg-white p-7">
                        <h3 class="font-display text-3xl leading-none">Private chauffeur</h3>
                        <p class="mt-3 text-navy/70">
                            A private driver for the day or the evening — meetings, an event, or a route you set yourself.
                        </p>
                        <a href="#enquiry" class="btn bg-navy text-paper hover:bg-navy-800 mt-6 self-start" data-service="private-chauffeur">
                            Request a chauffeur
                        </a>
                    </article>
                </div>

                <p class="mt-6 text-sm text-navy/55">Availability and arrangements are confirmed with you directly.</p>
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
