# Munyewu Travel & Tours · Website design system

Use this specification for the Cape Town tour and private transport website. A visitor should be able to recognise the destination, choose a service and send the details needed for a quote from a phone.

## Touriva reference

Touriva opens with a photographic hero slider, then moves through packages, destinations, curated collections, offers, traveller reviews and FAQs. Its stylesheet pairs Urbanist with a 1320px container, 20px side padding, 80px display type and rounded controls. Its white canvas, dark grey text (#2E2E38) and indigo accent (#3538CD) are useful reference points. The specifications below adapt that structure to Munyewu’s smaller service catalogue and existing brand.

[Touriva homepage](https://touriva.webflow.io/?via=flowcub) · [Reference stylesheet](https://cdn.prod.website-files.com/68ba983807bbd2341aef80ae/css/touriva.webflow.shared.643fd7bb9.css) · [Munyewu business profile](business.md)

## Colour and identity

| Share of designed surfaces | Token | Colour | Placement |
| --- | --- | --- | --- |
| 70% | --navy | #24283D | Header, hero backing, service section and footer |
| 20% | --paper | #F5F4F0 | Copy on navy, enquiry panel and light detail sections |
| 10% | --gold | #E3B743 | Primary action, active marker and small emphasis on navy |

Apply the ratio across a page, excluding photography. Use navy text on gold buttons and paper panels. On a light panel, a gold accent needs an adjacent navy label. Place the supplied [logo](munyewu-logo.png) on navy, preserve its aspect ratio and allow at least 12px of clear space. The banner crop suits the header at small sizes.

## Type and layout

Pair Bebas Neue with Inter. Bebas Neue is a tall, condensed display face with clear geometry and an expressive character — use it for the big semantic accents, the hero heading and section titles, where it immediately draws the eye to the destination or service name. It is uppercase by nature, so let those headings read in capitals. Set everything else — card titles, body, labels, forms and UI — in Inter, chosen for its high readability and neutral character at any size, and keep all Inter text in sentence case. Keep itineraries, contact details and field labels easy to scan. Fall back to a system sans-serif if a face fails to load. Load only the weights in use — Bebas Neue 400, Inter 400 and 600/700 — with `font-display: swap`, and preload the hero face so the heading never reflows.

| Role | Typeface | Desktop | Mobile | Weight / line height |
| --- | --- | --- | --- | --- |
| Hero heading | Bebas Neue | 80px | 44px | 400 / 1.0, +0.5px tracking |
| Section title | Bebas Neue | 44px | 32px | 400 / 1.05 |
| Card title | Inter | 24px | 22px | 600 / 1.2 |
| Body | Inter | 18px | 16px | 400 / 1.5 |
| Label or action | Inter | 14px | 14px | 600 / 1.3 |

Because Bebas Neue is condensed, a hero line fits more characters than a normal face — let it run large and confident, but add 0.5–1px letter-spacing at display sizes so the caps breathe. Never set long or running text in Bebas Neue; it is an accent, not a reading face.

Centre sections in a border-box container (max 1320px) with fluid side gutters, and build every gap, padding and margin from the single scale defined in **Space and rhythm** below. Keep prose under 65 characters per line where practical.

Use three card columns from 992px, two from 768px and one below 768px. Collapse navigation below 992px. Let the hero heading wrap naturally. At 320px, stack its actions and allow form controls to use the full content width.

## Space and rhythm

Whitespace is the primary tool on this site, as it is on the work Awwwards rewards and the best Framer builds. Space signals quality, directs the eye and lets the photography and Bebas Neue headings carry weight. Be generous and consistent — never fill space for its own sake, and never crowd to fit more in. When in doubt, add space.

- **One scale, 8px base.** Build every gap, padding and margin from a single token scale so spacing feels deliberate: `4, 8, 12, 16, 24, 32, 48, 64, 96, 128, 160, 200`. Define it once as variables and never use off-scale values. Consistency is what reads as “designed”.
- **Fluid, not fixed.** Scale space with the viewport using `clamp()` — the Framer approach — so a layout breathes on desktop and tightens on a phone without a stack of breakpoints. For example, section padding `clamp(96px, 12vw, 200px)` and gutters `clamp(20px, 5vw, 80px)`.
- **Generous section rhythm.** The vertical space between sections is the signature of a premium site. Use `clamp(96px, 12vw, 200px)` top and bottom; err larger. Tight, crowded sections read cheap no matter how good the content is.
- **Container and gutters.** Centre content in a max width of 1320px with fluid side gutters so content never touches the viewport edge except full-bleed media. Keep a comfortable outer margin on every breakpoint.
- **Let the hero breathe.** Give the hero heading large clear space above, below and beside it. A Bebas Neue display line needs room to feel confident, not boxed in by its neighbours.
- **Space follows type.** More space around large type, tighter around small. Keep a consistent vertical rhythm between headings, paragraphs and controls so the page has a steady beat.
- **Micro-spacing.** 8px between related text, 12px from a label to its control, 16–24px inside cards, 24–32px between cards, and 32–48px from a section title to its grid.
- **Full-bleed moments.** A few sections — the hero, a signature image — may run edge to edge for contrast, but anchor their inner content back to the container so text stays aligned to the grid.
- **Whitespace is responsive too.** On mobile, step down the scale proportionally but keep the ratios; do not collapse everything to 16px. Protect breathing room on small screens — it is what keeps the premium feel on the device most travellers use.

## Photography

Lead with a recognisable Cape Town scene. Choose an image with clear space for the heading and keep the landmark visible in a portrait crop. For tour cards, show the actual destination. For transfers and chauffeur services, use approved images of the vehicles or pickup experience. Use a 4:3 crop for card images and a 20px corner radius. Place a navy gradient behind text on photographs and test the lightest part under the lettering.

## Components

| Component | Anatomy and behaviour |
| --- | --- |
| Header | Logo links home. Use Tours, Transfers, Private transport and Contact. A gold “Enquire” action opens the enquiry form. On mobile the menu button exposes its expanded state and returns focus when closed. |
| Hero | Use one location photograph, one H1 and one short supporting sentence. Suggested H1 “Cape Town tours and private transfers”. Primary action “Plan my trip”. Secondary link “Explore tours” scrolls to the cards. |
| Service card | Image, service title, one sentence and a descriptive link. Example “Winelands tours” with “Enquire about a Winelands tour”. Pass the service selection into the form. Use one link per card. |
| Primary button | Gold fill, navy label, pill radius, 20px horizontal padding and a minimum height of 44px. On hover underline the label. While sending, show “Sending…” and prevent duplicate submission. |
| FAQ | Use a button or native summary for each question. Keep the answer directly below it. Start with questions about pickup, group size and the information needed for a quote. Publish approved answers. |
| Enquiry form | Use a paper panel with navy labels and 10px field corners. Collect service, name and preferred contact detail. Ask for the trip date, passenger count and pickup location where relevant. Keep optional requests in a final notes field. |
| Footer | On navy, repeat the logo, Thornton address and tap-to-call numbers from the business profile. Give each number its own touch target. |

## Page composition

**Home.** Lead with the hero. Follow with service cards for city tours, Winelands tours, airport transfers and private chauffeur trips. Group vehicle options in one compact section. Finish with FAQs and the enquiry form. Add testimonials only when genuine customer comments are available for publication.

**Service detail.** Open with the service name and a representative photo. Explain who the service suits and what the traveller should provide. For a transfer, prompt for pickup and destination. For a tour, prompt for group size and places of interest. Repeat the enquiry action after these details.

**Form feedback.** Label the action “Send enquiry”. On validation failure, preserve entries, focus the first invalid field and explain how to fix it. After a successful submission, acknowledge receipt and show the service requested. A booking confirmation belongs after the operator confirms arrangements.

## Conversion design

The business goal is a qualified enquiry, not a checkout. In this market most travellers decide on a phone and prefer WhatsApp. Design every screen to move one visitor toward one next action with as little friction as possible.

- **One primary action per screen.** Enquire is the goal. Click-to-call and WhatsApp are equal-weight shortcuts, not competing buttons. Never show two gold buttons of equal size side by side.
- **WhatsApp first.** Offer a persistent WhatsApp action with a pre-filled message carrying the service name (for example, “Hi Munyewu, I’d like a quote for a Winelands tour”). Treat it as the lowest-friction path for mobile visitors.
- **Reduce the ask.** The enquiry form requests only what is needed to reply: service, name and one contact detail. Trip date, passenger count and pickup are requested only where relevant and marked optional until the operator needs them. Every removed field lifts completion.
- **Lead with proof above the fold.** Pair the hero H1 with one line of evidence (years operating, licensed PrDP drivers, typical reply time) and the primary action. A visitor should see what, why-trust and how-to-act without scrolling.
- **Carry context into the form.** A service card, hero action or sticky bar always passes the chosen service into the enquiry, so the traveller never re-states it and the operator can reply with a specific price.
- **Lower perceived risk.** State “free quote, no obligation” and a realistic reply window near every action. Confidence reduces hesitation more than discounts.
- **Earn trust visibly.** Place a trust bar near the hero and repeat signals before the form: genuine reviews, vehicle photos, licensing, safety, years in operation and service areas. Only publish claims the operator can stand behind.
- **Make contact effortless on mobile.** Phone numbers are tap-to-call. The sticky action bar keeps Enquire, Call and WhatsApp within thumb reach on every scroll position.

| Component | Anatomy and behaviour |
| --- | --- |
| WhatsApp action | Pill with the WhatsApp glyph and a short label. Opens a chat with a pre-filled, service-specific message. Keep it visually secondary to the gold Enquire action so the hierarchy stays clear. |
| Sticky mobile action bar | Fixed to the bottom below 992px. Three equal touch targets of at least 44px: Enquire, Call and WhatsApp. Hidden while the enquiry form or a field is focused so it never covers an input. |
| Trust bar | A single navy or paper strip under the hero. Three to four concise proofs with icons: years operating, licensed drivers, service areas, typical reply time. No filler. |
| Testimonial | Quote, traveller first name and the service taken. Use only genuine, publishable comments. Prefer three recent, specific quotes over many vague ones. |

## Measurement

Instrument the site so conversion can be improved with evidence, not opinion.

- Define the primary conversion as a completed enquiry (form submit, WhatsApp open or call tap) and track each path separately.
- Record which service and which entry point (hero, card, sticky bar, footer) produced each enquiry so high-intent paths are known.
- Track form starts versus completions and the first field abandoned, to find and remove friction.
- Review the hero, the sticky bar and the form on real mid-range Android devices on a mobile connection; most traffic will arrive this way.

## Craft and art direction

Aim for work that could be submitted to Awwwards: a clear concept, confident type, considered motion and detail that rewards attention. Craft earns trust and makes the brand memorable — but it never obstructs the enquiry or the person using a keyboard, a screen reader or a slow phone. Judged against the four pillars below, every signature moment must also pass the launch checks.

- **Concept.** One idea runs through the site: an unhurried, premium Cape Town journey. Express it with generous space, cinematic photography and restraint, not ornament. Every section answers “where could this take me, and can I trust them to drive”.
- **Design.** Let navy and paper carry the page and spend gold sparingly so it always reads as “act here”. Use oversized Bebas Neue display type as the hero of each section, set against calm Inter body copy for contrast. Align everything to the baseline grid; nothing sits by eye.
- **Signature moments.** Choose two or three, no more. A slow hero image scale on load, destination names that reveal line by line on scroll, service cards that lift with a soft navy shadow and a gold underline on hover, a number that counts to the years operating. Each is brief, purposeful and optional.
- **Motion system.** Micro-interactions 150–200ms, entrances 300–500ms, all ease-out. Stagger a grid by 60–80ms per item. Motion clarifies hierarchy and sequence; it never blocks reading or input. Everything degrades to an instant state under `prefers-reduced-motion`, and the hero never autoplays.
- **Detail.** Design the empty, loading, focus, hover, error and success states, not only the ideal one. Custom focus rings, a considered form success screen and a crafted 404 are where awards are won.
- **Content.** Specific, confident, sentence-case microcopy in the brand voice. No stock-photo clichés and no lorem ipsum ever ships; use real destinations, real vehicles and real words.
- **Performance is part of craft.** Target Largest Contentful Paint under 2.5s and Cumulative Layout Shift under 0.1 on mobile. Serve responsive AVIF or WebP with correct dimensions, lazy-load below the fold and preload only the hero image. A beautiful page that loads slowly fails both the judges and the traveller.

## Interaction and launch checks

- Use a visible 3px focus outline with a 3px offset. Choose navy on paper or gold and paper on navy. Match hover affordances for keyboard focus.
- Keep transitions to 150–200ms for colour and opacity. Honour reduced-motion settings and keep the hero still by default.
- Give informative photographs descriptive alt text. Use empty alt text for decorative repeats. Include a visible label for every input.
- At 320px, 768px and 1440px, check the hero crop, navigation, card order and form layout. Complete one tour enquiry and one transfer enquiry with keyboard input, including an invalid submission and a retry.
