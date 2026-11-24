# Munyewu Travel & Tours · SEO

How the site wins visibility and turns it into leads. Three fronts: **technical** (be crawlable and fast), **local** (own “near me” and Cape Town searches), and **AI** (be the answer assistants quote). Generative-engine specifics live in [GEO](geo.md). Facts come from [memory](memory.md); keep NAP identical everywhere.

## Keyword intent

Target the searches of someone ready to enquire, not browse. Map one primary intent per page.

| Page | Primary intent | Example queries |
| --- | --- | --- |
| Home | Brand + category | “Munyewu travel”, “Cape Town tours and transfers” |
| City tours | Tour intent | “Cape Town city tour”, “private Cape Town tour” |
| Winelands tours | Tour intent | “Winelands tour from Cape Town”, “Stellenbosch wine tour” |
| Airport transfers | High-intent transfer | “Cape Town airport transfer”, “airport shuttle Cape Town” |
| Private transport | Premium intent | “private chauffeur Cape Town”, “luxury transfer Cape Town” |

Write for intent, not keyword density: one clear `<h1>`, descriptive subheadings, and body copy that answers what the service is, who it suits and what a quote needs.

## Technical SEO

- **Indexing.** Clean, lowercase, hyphenated URLs (`/cape-town-airport-transfers`). One canonical URL per page; avoid duplicate paths. Submit an XML sitemap and a sensible `robots.txt`; do not block CSS/JS.
- **Metadata.** Unique `<title>` (≈55–60 chars) and meta description (≈150–160 chars) per page, each naming the service and Cape Town and inviting an enquiry. One `<h1>`; logical `<h2>`/`<h3>`.
- **Structured data (JSON-LD).** Add `LocalBusiness` (or `TravelAgency`) with exact NAP, geo, areas served and hours; `Service` for each service; `FAQPage` for the FAQ; `BreadcrumbList` for navigation; `Organization` with logo and `sameAs` social links. Validate before launch.
- **Performance (ranking + conversion).** LCP < 2.5s, CLS < 0.1, INP < 200ms on mobile. Responsive AVIF/WebP with width/height set, hero preloaded, everything else lazy-loaded. Cache static assets.
- **Mobile.** Mobile-first indexing is the default; the mobile layout is the real site. Tap targets ≥44px, no horizontal scroll at 320px, legible type without zoom.
- **Crawl health.** HTTPS everywhere, no mixed content, no broken links, meaningful 404, 301 any changed URLs. Descriptive `alt` text doubles as image SEO.
- **Social.** Open Graph and Twitter card tags with a branded navy/gold image so shared links look intentional.

## Local SEO (the main growth engine)

Most leads will come from people searching in or planning to visit Cape Town. Win the map and the local pack.

- **Google Business Profile.** Claim and fully complete it: exact NAP, categories (travel agency, airport shuttle service, tour operator), service areas (Cape Town, Thornton, Winelands, CPT airport), hours, phone, website, and real photos of the vehicles and destinations. This is often the highest-ROI task on the whole project.
- **Reviews.** Ask every happy client for a Google review and reply to each one. Volume, recency and owner responses drive local ranking and are the strongest trust signal for conversion. Never buy or fake reviews.
- **NAP consistency.** Identical name, address and phone on the site, GBP, Bing Places, and local directories (for example, travel and Cape Town tourism listings). Mismatches split your authority.
- **Local content.** Pages and copy that name real places — Table Mountain, V&A Waterfront, Stellenbosch, Franschhoek, Cape Town International — and real routes (“airport to V&A Waterfront transfer”). This is what matches “near me” and place-specific searches.
- **Local schema.** `areaServed`, `geo` coordinates and `address` in the LocalBusiness JSON-LD so engines place the business correctly.
- **Click-to-call tracking.** Ensure map-pack and GBP calls are attributable so local effort can be tied to leads.

## AI SEO

Assistants (ChatGPT, Gemini, Copilot, Perplexity, Google AI Overviews) increasingly answer “best airport transfer in Cape Town” directly. To be the answer, the site must be machine-readable and quotable — the deeper playbook is in [GEO](geo.md).

- Publish clear, self-contained answers: a question as a heading, the answer in the first sentence, detail after. Assistants lift these.
- Keep facts explicit and consistent — services, areas served, vehicles, what a quote needs — so an engine can state them confidently.
- Use `FAQPage` and `Service` schema so models can parse offerings without guessing.
- State entity relationships plainly (“Munyewu Travel & Tours is a Cape Town airport transfer and tour company based in Thornton”) so models associate the brand with the category and place.
- Earn mentions on third-party sites and listings; models weight corroborated, cited sources, not just your own claims.
- Keep content fresh and dated; assistants favour current, maintained pages.

## Launch and ongoing checklist

- [ ] One intent, one `<h1>`, unique title and description per page
- [ ] LocalBusiness, Service, FAQPage, Breadcrumb and Organization JSON-LD validated
- [ ] Sitemap submitted; robots.txt sane; canonicals correct
- [ ] Core Web Vitals green on mobile
- [ ] Google Business Profile claimed, complete, with photos and a review-request routine
- [ ] NAP identical across site, GBP and directories
- [ ] Place-specific local copy published; alt text written
- [ ] Search Console and analytics live, with form, call and WhatsApp conversions tracked
