# Jennifer Eddings — Personal Brand Website

**Look:** Juliette-inspired editorial personal brand with CLC glam (gold sparkles, scroll motion).  
**Interim preview:** https://otvagency.github.io/jennifer-eddings-website/  
**SiteGround:** Upload `theme/jennifer-eddings/` when hosting is ready.

## Site shape

1. **Landing** — `preview/index.html` / WP front page  
2. **Blog** — `preview/blog.html` / WP posts page — podcast + YouTube feeds + manual speaking/feature items

Nav: **Home · Blog · Connect**

## Structure

| Path | Purpose |
|------|---------|
| `docs/` / `preview/` | Live GitHub Pages preview |
| `preview/data/feed.json` | Cached feed (fallback when live RSS is blocked) |
| `scripts/refresh-feed.py` | Refresh `feed.json` from Buzzsprout (+ YouTube if available) |
| `theme/jennifer-eddings/` | WordPress theme for SiteGround |
| `SITEGROUND_JULIETTE.md` | Optional notes if installing the real Juliette theme later |
| `_archive-openai-sites/` | Archived Next.js first pass |

## Refresh the blog cache

```bash
python3 scripts/refresh-feed.py
```

The live blog page also tries to pull Buzzsprout/YouTube via rss2json in the browser, then falls back to `data/feed.json`.

## Content still needed

See Drive: `Documents/Jennifer_Eddings_Website_Content_Request.xlsx`  
Public email stays unset until confirmed.
