# Munyewu Travel & Tours · GEO (Generative Engine Optimization)

GEO is how the business wins visibility inside AI answers — ChatGPT, Gemini, Copilot, Perplexity and Google AI Overviews — not just the ten blue links. When a traveller asks an assistant “who does reliable Cape Town airport transfers”, the goal is for Munyewu to be named, described correctly and linked. This complements, not replaces, the [SEO](seo.md) work; facts come from [memory](memory.md).

## Why it matters here

Travellers increasingly plan trips by asking an assistant rather than searching. Those answers are synthesised from content models can read, trust and quote. If the site is clear, factual and corroborated elsewhere, Munyewu becomes the recommended option; if not, a competitor is named instead. GEO turns into leads only when the AI answer also tells the traveller how to act — so every answer-ready block ends with the enquiry, WhatsApp or call path.

## Make the brand an unambiguous entity

Models recommend entities they understand. State plainly and identically everywhere:

- **Who:** Munyewu Travel & Tours
- **What:** Cape Town tours, airport transfers and private chauffeur transport
- **Where:** based in Thornton, Cape Town; serving Cape Town, the Winelands and Cape Town International Airport
- **How to engage:** free quote by enquiry form, WhatsApp or phone

Put a concise “About” statement on the site in exactly these terms, mirror it in the `Organization`/`LocalBusiness` schema, and keep it consistent across the Google Business Profile and every directory. Consistency is what lets a model assert the fact with confidence.

## Write answer-ready content

Structure content the way an assistant wants to quote it:

- **Question as heading, answer first.** Lead each FAQ and section with the direct answer in the first sentence, then add detail. Models extract the opening sentence.
- **Self-contained blocks.** Each answer should make sense lifted out of the page, with no “as mentioned above”.
- **Specific and factual.** Name real places, vehicles, group sizes and what a quote needs. Specifics get quoted; vague marketing does not.
- **Natural, conversational questions.** Mirror how people ask assistants: “How do I get from Cape Town airport to the V&A Waterfront?”, “Can I book a private Winelands wine tour for a group of eight?”
- **Plain language, short sentences.** Easy to parse, easy to repeat.

Priority answer set to publish (confirm facts first):

- What areas does Munyewu cover?
- How do airport transfers work and what does a quote need?
- What is included in a city tour and a Winelands tour?
- What vehicles are available and how many passengers fit?
- How do I book, and how quickly will I get a reply?
- What does it cost / how are quotes given?

## Be machine-readable

- `FAQPage`, `Service`, `LocalBusiness` and `Organization` JSON-LD so engines parse offerings without inference (shared with [SEO](seo.md)).
- Clean semantic HTML: real headings, lists and tables — not text baked into images. Content critical to an answer must exist in the server-rendered HTML, not only after JavaScript.
- Keep `robots.txt` permissive to reputable AI crawlers unless the operator decides otherwise; blocking them removes the brand from answers.
- Date and maintain content; models favour fresh, current pages.

## Build corroboration (the hardest and most valuable part)

Assistants trust what multiple independent sources confirm, not only the brand’s own site.

- A complete, active Google Business Profile with genuine, recent reviews — a primary source for travel recommendations.
- Listings in reputable Cape Town tourism, travel and transfer directories with identical NAP.
- Genuine mentions and reviews on third-party travel platforms.
- Any legitimate press, partnership or local coverage, cited with a link.

Never fabricate reviews, press or partnerships; manipulation is detectable, erodes the trust GEO depends on, and risks the brand.

## Measuring GEO

- Periodically ask the major assistants the priority questions above and note whether Munyewu is named, described correctly and linked. Track this over time.
- Watch for referral traffic from assistant and AI-overview sources in analytics and treat it as a channel.
- When a model states something wrong or outdated, fix the underlying source — the site fact, the schema or the profile — rather than the symptom.

## GEO checklist

- [ ] Consistent entity statement (who/what/where/how) on site, schema, GBP and directories
- [ ] Priority questions published as answer-first, self-contained blocks with a clear next action
- [ ] FAQPage, Service, LocalBusiness and Organization schema validated
- [ ] Critical content server-rendered; reputable AI crawlers allowed
- [ ] Google Business Profile complete with genuine recent reviews
- [ ] Identical NAP and corroborating third-party listings in place
- [ ] Assistant answers spot-checked for the priority questions and logged
