# Jennifer Eddings — Personal Brand Website

WordPress theme for **SiteGround**, plus a static **GitHub Pages** preview for client review.

## Structure

| Path | Purpose |
|------|---------|
| `theme/jennifer-eddings/` | Installable WordPress theme (zip & upload on SiteGround) |
| `preview/` | Static HTML mirror — client share link via GitHub Pages |
| `_archive-openai-sites/` | Archived Next.js / OpenAI Sites first pass (not for production) |

## Client preview

After Pages is enabled from the `/preview` folder:

`https://<org-or-user>.github.io/jennifer-eddings-website/`

(Exact URL depends on the GitHub account that owns the repo.)

## SiteGround install

```bash
cd theme && zip -r jennifer-eddings.zip jennifer-eddings -x "*.DS_Store"
```

1. WordPress admin → **Appearance → Themes → Upload** → activate **Jennifer Eddings**
2. **Settings → Reading** → static front page
3. **Customize → Jennifer Eddings Brand** → email, booking, media kit, socials

## Content still needed from Jennifer

See Drive: `Documents/Jennifer_Eddings_Website_Content_Request.xlsx`

Public email is intentionally **not** set until she confirms a brand address.
