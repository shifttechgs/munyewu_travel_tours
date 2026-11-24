# Munyewu Travel & Tours · Build and content instructions

How to work on this website so it stays high-converting, award-standard and visible. Read [memory](memory.md) first for the goal and the facts, then follow the rules below. Pair this with the [design system](design-system.md), [SEO](seo.md) and [GEO](geo.md).

## Order of work

1. **Facts.** Confirm anything in the “Open items” list in [memory](memory.md) before writing copy or schema. Never invent a credential, review or number.
2. **Structure.** Build the page composition from the design system: hero → service cards → vehicles → trust → FAQ → enquiry form.
3. **Conversion.** Place the primary action, the sticky mobile bar, WhatsApp and click-to-call, and carry the service into the form.
4. **Craft.** Add the chosen signature moments and state design once the structure converts.
5. **Visibility.** Apply the SEO and GEO checklists before launch, not after.
6. **Verify.** Run the launch checks on a real mid-range Android phone.

## Stack

Laravel application. Follow the repository’s own `CLAUDE.md` / `AGENTS.md` and Laravel Boost guidelines for framework conventions, routing, Blade and asset tooling. Keep the design tokens (navy, paper, gold, the Bebas Neue / Inter type pairing, spacing scale) defined once as CSS variables and reused; do not hardcode hex values per component. Load Bebas Neue 400 and Inter 400/600/700 only, with `font-display: swap`, and preload the hero face.

## Conversion rules (non-negotiable)

- One primary action per screen. Enquire is gold; Call and WhatsApp are secondary shortcuts of equal weight to each other.
- Every CTA passes the chosen service into the enquiry form or the WhatsApp pre-filled message.
- The enquiry form asks only for service, name and one contact detail by default. Everything else is optional until the operator needs it.
- A sticky bottom action bar (Enquire · Call · WhatsApp) is present below 992px and hides while a field is focused.
- Phone numbers are always `tel:` links; WhatsApp is always a `wa.me` link with a service-specific message.
- State “free quote, no obligation” and a realistic reply window near every action.
- Preserve form entries on error, focus the first invalid field, and confirm the service requested on success.

## Content rules

- Sentence case, brand voice, specific and confident. Real destinations and vehicles only.
- One `<h1>` per page describing what and where (for example, “Cape Town tours and private transfers”).
- Describe the traveller the service suits and exactly what to provide for a quote.
- Write FAQ answers that a person and an AI can quote verbatim: pickup, group size, vehicles, areas covered, what a quote needs, how to book. See [GEO](geo.md).
- No lorem ipsum, no stock-photo clichés, no unverifiable claims reach production.

## Accessibility and quality (ship-blocking)

- Visible 3px focus outline with 3px offset; keyboard reaches every action including the sticky bar and WhatsApp.
- A visible label for every input; descriptive alt text for informative images, empty alt for decorative ones.
- Colour contrast meets WCAG AA: navy on paper and navy on gold both pass; never put gold text on paper.
- Honour `prefers-reduced-motion`; the hero never autoplays.
- Targets: LCP < 2.5s, CLS < 0.1 on mobile. Preload only the hero image; lazy-load the rest; serve AVIF/WebP at correct dimensions.

## Definition of done

A page is done when it: states one clear next action and three contact paths; carries the service into every enquiry; passes the keyboard and screen-reader checks; hits the performance targets on a real phone; includes the correct metadata, schema and internal links from [SEO](seo.md); and contains answer-ready content per [GEO](geo.md). Then complete one tour enquiry and one transfer enquiry end to end, including an invalid submission and a retry.
