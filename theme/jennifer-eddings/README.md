# Jennifer Eddings — WordPress theme (SiteGround)

Custom theme for Jennifer Eddings’ personal brand site and The Call Light Collective.

## Site shape

Two pages: **Home** (landing) + **Blog** (auto-updating podcast/YouTube/posts feed).

## Install on SiteGround

1. Zip the `jennifer-eddings` folder (the folder itself should be the zip root).
2. In WordPress: **Appearance → Themes → Add New → Upload Theme**.
3. Activate **Jennifer Eddings**.
4. **Settings → Reading**:
   - Homepage: a blank **Home** page (uses `front-page.php`)
   - Posts page: create **Blog** (uses `home.php` / Blog template)
5. Optional: page template **Blog** if you prefer a page instead of the posts index.
6. Publish WordPress posts (categories like Speaking / Feature) for anything that isn’t in RSS. Optional custom field `appearance_external_url` for outbound links.
7. **Appearance → Customize → Jennifer Eddings Brand**: email, booking, podcast URL, podcast RSS, YouTube RSS, socials.

Legacy `/appearances/` URLs 301 to the Blog posts page.

## Customize fields

- Public contact email (leave blank until confirmed — site shows “coming soon”)
- Booking / speaking URL
- Podcast URL + Podcast RSS URL
- YouTube URL + YouTube RSS URL
- Media kit URL
- Instagram, LinkedIn, Facebook
- Hero headline + support line

## Package zip (from this repo root)

```bash
cd theme && zip -r jennifer-eddings.zip jennifer-eddings -x "*.DS_Store"
```
