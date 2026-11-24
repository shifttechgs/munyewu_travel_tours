// Munyewu Travel & Tours — progressive enhancement only.
// The page is fully usable (navigation, enquiry form, tap-to-call) without this file.

/* ----------------------------------------------------------------------------
 * Lightweight analytics hook. No-ops unless a dataLayer is present, so it
 * respects "use existing analytics conventions, if present" without inventing one.
 * -------------------------------------------------------------------------- */
function track(event, detail = {}) {
    if (Array.isArray(window.dataLayer)) {
        window.dataLayer.push({ event, ...detail });
    }
}

/* ----------------------------------------------------------------------------
 * Header: flat over the hero, condenses into a floating pill once scrolled.
 * -------------------------------------------------------------------------- */
function initHeader() {
    const header = document.querySelector('[data-site-header]');
    if (!header) return;

    let ticking = false;
    const apply = () => {
        header.classList.toggle('is-scrolled', window.scrollY > 24);
        ticking = false;
    };
    const onScroll = () => {
        if (!ticking) {
            ticking = true;
            window.requestAnimationFrame(apply);
        }
    };

    apply(); // set correct state on load (e.g. refreshed mid-page)
    window.addEventListener('scroll', onScroll, { passive: true });
}

/* ----------------------------------------------------------------------------
 * Hero slider — crossfading background slides with dots + arrows.
 * Manual by default; gentle autoplay pauses on hover/focus/hidden tab and is
 * disabled entirely under prefers-reduced-motion. Heading + CTAs stay static.
 * -------------------------------------------------------------------------- */
function initHeroSlider() {
    const root = document.querySelector('[data-hero]');
    if (!root) return;
    const slides = [...root.querySelectorAll('[data-slide]')];
    const dots = [...root.querySelectorAll('[data-hero-dot]')];
    const prev = root.querySelector('[data-hero-prev]');
    const next = root.querySelector('[data-hero-next]');
    const locEl = root.querySelector('[data-hero-location]');
    const preview = root.querySelector('[data-hero-preview]');
    const previewImg = root.querySelector('[data-hero-preview-img]');
    const previewLoc = root.querySelector('[data-hero-preview-loc]');
    if (slides.length < 2) return;

    let index = 0;
    const show = (n) => {
        index = (n + slides.length) % slides.length;
        slides.forEach((s, k) => {
            const active = k === index;
            s.classList.toggle('is-active', active);
            s.setAttribute('aria-hidden', active ? 'false' : 'true');
        });
        dots.forEach((d, k) => {
            d.classList.toggle('is-active', k === index);
            if (k === index) d.setAttribute('aria-current', 'true');
            else d.removeAttribute('aria-current');
        });
        if (locEl && slides[index].dataset.location) {
            locEl.textContent = slides[index].dataset.location;
        }

        // Frosted "up next" card previews the slide that follows.
        const nextSlide = slides[(index + 1) % slides.length];
        const nextImg = nextSlide.querySelector('img');
        const nextLoc = nextSlide.dataset.location || '';
        if (previewImg && nextImg) previewImg.src = nextImg.currentSrc || nextImg.src;
        if (previewLoc) previewLoc.textContent = nextLoc;
        if (preview) preview.setAttribute('aria-label', `Next slide: ${nextLoc}`);
    };

    const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    let timer = null;
    const stop = () => { if (timer) { clearInterval(timer); timer = null; } };
    const start = () => { if (reduce) return; stop(); timer = window.setInterval(() => show(index + 1), 6000); };

    prev?.addEventListener('click', () => { show(index - 1); start(); });
    next?.addEventListener('click', () => { show(index + 1); start(); });
    preview?.addEventListener('click', () => { show(index + 1); start(); });
    dots.forEach((d, k) => d.addEventListener('click', () => { show(k); start(); }));
    root.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') { show(index - 1); start(); }
        else if (e.key === 'ArrowRight') { show(index + 1); start(); }
    });

    root.addEventListener('mouseenter', stop);
    root.addEventListener('mouseleave', start);
    root.addEventListener('focusin', stop);
    root.addEventListener('focusout', start);
    document.addEventListener('visibilitychange', () => (document.hidden ? stop() : start()));

    show(0);
    start();
}

/* ----------------------------------------------------------------------------
 * Mobile menu
 * -------------------------------------------------------------------------- */
function initMenu() {
    const toggle = document.querySelector('[data-menu-toggle]');
    const menu = document.querySelector('[data-menu]');
    if (!toggle || !menu) return;

    const setOpen = (open) => {
        toggle.setAttribute('aria-expanded', String(open));
        menu.hidden = !open;
    };

    toggle.addEventListener('click', () => {
        setOpen(toggle.getAttribute('aria-expanded') !== 'true');
    });

    // Close after choosing a destination, and on Escape.
    menu.addEventListener('click', (e) => {
        if (e.target.closest('a')) setOpen(false);
    });
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
            setOpen(false);
            toggle.focus();
        }
    });
}

/* ----------------------------------------------------------------------------
 * Enquiry form: service preselection + conditional fields + submit guard
 * -------------------------------------------------------------------------- */
function initEnquiry() {
    const form = document.querySelector('[data-enquiry-form]');
    const select = document.getElementById('service');
    if (!select) return;

    const groups = document.querySelectorAll('[data-when-service]');

    // Show only the fields relevant to the chosen service. All fields stay in the
    // DOM and optional server-side, so no-JS visitors can still complete the form.
    const syncFields = () => {
        const value = select.value;
        const isTransfer = value === 'airport-transfer' || value === 'private-chauffeur';
        groups.forEach((group) => {
            const show = group.dataset.whenService === (isTransfer ? 'transfer' : 'tour');
            group.hidden = !show;
        });
    };

    // Any control carrying data-service preselects the service before the
    // in-page jump to #enquiry, then moves focus to the first field.
    document.querySelectorAll('[data-service]').forEach((el) => {
        el.addEventListener('click', () => {
            select.value = el.dataset.service;
            syncFields();
            track('service_selected', { service: el.dataset.service });
            window.setTimeout(() => document.getElementById('name')?.focus(), 450);
        });
    });

    select.addEventListener('change', () => {
        syncFields();
        track('service_selected', { service: select.value });
    });
    syncFields();

    // Prevent duplicate submission; the native POST still performs the request.
    if (form) {
        form.addEventListener('submit', () => {
            const btn = form.querySelector('[data-submit]');
            if (btn) {
                btn.disabled = true;
                btn.dataset.label = btn.textContent;
                btn.textContent = 'Sending…';
            }
        });
    }
}

/* ----------------------------------------------------------------------------
 * Conversion tracking: phone taps + confirmed enquiry success
 * -------------------------------------------------------------------------- */
function initTracking() {
    document.querySelectorAll('a[href^="tel:"]').forEach((el) => {
        el.addEventListener('click', () => track('phone_click', { number: el.getAttribute('href') }));
    });

    const success = document.querySelector('[data-enquiry-success]');
    if (success) {
        track('enquiry_success', { service: success.dataset.enquirySuccess || '' });
        // Bring the confirmation into view for people returning after submit.
        success.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    initHeader();
    initHeroSlider();
    initMenu();
    initEnquiry();
    initTracking();
});
