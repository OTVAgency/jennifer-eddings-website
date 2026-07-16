# Jennifer Eddings — SiteGround + Juliette (Elementor) production guide

**Production stack:** SiteGround WordPress → **Juliette** (OKThemes / Envato Elements) → Elementor (+ Elementor Pro as required)  
**Interim client preview:** https://otvagency.github.io/jennifer-eddings-website/  
**Custom theme** at `theme/jennifer-eddings/` is reference/archive only — not the live production path.

Demo reference: https://juliettewp.okthemes.com/

---

## 1. Prerequisites

| Item | Notes |
|------|--------|
| SiteGround WordPress install | Domain or temp URL + admin login |
| Envato Elements (or ThemeForest) | Download **Juliette** full theme *or* Elementor Template Kit |
| Elementor | Free plugin (required) |
| Elementor Pro | Required for many Juliette kit features (Theme Builder, forms, loops) |
| Client content sheet | `Documents/Jennifer_Eddings_Website_Content_Request.xlsx` |

Prefer the **full WordPress theme** from OKThemes if available on Elements; otherwise use Hello Elementor + Juliette **Template Kit** + Elementor Pro.

---

## 2. Install order (SiteGround)

1. Log into WordPress on SiteGround.
2. Install & activate **Elementor** (and **Elementor Pro** if licensed).
3. Install Juliette:
   - **Full theme:** Appearance → Themes → Upload → activate Juliette → run one-click demo import if offered.
   - **Template kit:** Install Envato Elements / Template Kit Import plugin → import Juliette kit pages, headers, footers, global styles.
4. **Settings → Reading:** set Home as static front page.
5. **Settings → Permalinks:** Post name.
6. Do **not** publish a public email until the content sheet returns one (no CMC inbox).

---

## 3. Brand system (replace Juliette fashion defaults)

Apply in Elementor **Site Settings / Global Colors & Fonts** (and Juliette global style kit if present).

### Colors

| Token | Hex | Use |
|-------|-----|-----|
| Plum 950 | `#24192B` | Headings, primary buttons, dark panels |
| Plum 800 | `#563764` | Secondary text accents |
| Plum 700 | `#704782` | Eyebrows, links hover |
| Cream | `#F7F1EB` | Page background |
| Surface | `#FFFAF5` | Soft panels |
| Gold | `#C8912D` | Accents, bullets, small marks |
| Muted | `#6D6073` | Body secondary |

Avoid leaving pink / fashion pastels from the demo.

### Typography

| Role | Suggestion |
|------|------------|
| Display / headings | Cormorant Garamond (or Juliette serif closest match) |
| Body | Source Sans 3 (or clean sans already in kit) |

### Logo / media assets (from client folder)

Copy into Media Library from:

- `Assets/Logos/` — CLC monogram, watermark, feather circle, podcast cover
- `Website/theme/jennifer-eddings/assets/` or `docs/` — intro MP4, OG image, favicon
- Headshot — still **needed** from Jennifer (Photos folder empty)

---

## 4. Page map (Juliette → Jennifer)

| Juliette page | Jennifer use | Primary CTA |
|---------------|--------------|-------------|
| Home | Personal brand hero + roles + path to About / Collective / Connect | Connect / Listen |
| About | Bio, credentials (BSN, RN, NPD-BC), Daisy Award, ICU / NPD | Connect |
| Services (or Method) | Speaking, podcast guest/host collabs, sponsorships, panels, advocacy | Booking (when URL ready) |
| Pricing / Gift | **Hide or repurpose** — not core unless she sells packages | — |
| Blog | Optional stories / episode notes later | — |
| Contact | Socials + pending email / form | Email when confirmed |

Header nav (suggested): **About · The Collective · Speak / Collaborate · Connect**

Footer: © Jennifer Eddings · The Call Light Collective · social icons only until email is confirmed.

---

## 5. Approved draft copy (paste into Elementor)

### Home — eyebrow
`BSN, RN, NPD-BC`

### Home — headline
`Nurse leader, storyteller, and host of The Call Light Collective.`

### Home — support
`A grounded home for Jennifer Eddings — professionalism with authenticity, heart, and humor.`

### Home — roles line
`Podcast Host · Nurse Leader · Speaker`

### About — body
Jennifer Eddings is a Daisy Award–winning nurse leader whose work spans Critical Care, ICU leadership, and nursing professional development. She builds spaces where people feel seen and supported — pairing professionalism with authenticity and unfiltered honesty.

As founder and host of The Call Light Collective, she champions healthcare storytelling and culture that helps nurses and leaders stay human in the work. Her voice has been featured in Women’s History Month healthcare storytelling, and she collaborates across podcast sponsorships, speaking, panels, advocacy, and brand partnerships.

### About — pull quote
`Spaces where people feel seen, supported, and still able to laugh.`

### Collective / Services blurb
The Call Light Collective is Jennifer’s platform for healing-centered storytelling — a place to grow the podcast, guest features, and future press without losing the human tone that makes the brand trustable.

### Connect — body
For podcast sponsorships, speaking, panels, advocacy, or brand partnerships — start here. Public email and booking details will appear as soon as Jennifer confirms them.

### Connect — email placeholder
Button label: `Public email coming soon` (disabled or non-linked until sheet returns an address)

### Socials (draft — confirm on sheet)

- Instagram: https://www.instagram.com/jen_the_rn_82
- LinkedIn: https://www.linkedin.com/in/chiefspiritofficer/
- Facebook: https://www.facebook.com/jennifer.eddings.33
- YouTube: https://www.youtube.com/@ComfortMeasuresMedia

---

## 6. Media on Home / Collective

- Embed `call-light-intro.mp4` (or YouTube once episode URLs are confirmed)
- Poster / fallback: CLC watermark or podcast cover
- Prefer Jennifer headshot in hero once provided; monogram is fine as interim

---

## 7. Forms & email

- Elementor Pro form → send to **her confirmed public email** only after the spreadsheet is filled
- Until then: no mailto to `comfortmeasures24@gmail.com`
- Optional later: SiteGround email / Google Workspace brand address

---

## 8. Go-live checklist

- [ ] Juliette + Elementor (+ Pro) installed on SiteGround
- [ ] Global colors/fonts match brand table above
- [ ] Demo fashion imagery replaced with CLC / Jennifer assets
- [ ] Pages mapped and unused Juliette pages drafted as drafts or deleted
- [ ] Socials confirmed
- [ ] Public email + booking wired from content sheet
- [ ] Media kit link added
- [ ] Mobile pass on Home / About / Contact
- [ ] Replace GitHub Pages URL with SiteGround domain in client communications

---

## 9. What stays in this repo

| Path | Role after Juliette pivot |
|------|---------------------------|
| `docs/` + `preview/` | Interim client preview until SiteGround live |
| `theme/jennifer-eddings/` | Copy/asset reference; optional offline fallback |
| `_archive-openai-sites/` | Historical only |
| `SITEGROUND_JULIETTE.md` | This production runbook |
