# Jennifer Eddings — WordPress theme (SiteGround)

Custom theme for Jennifer Eddings’ personal brand site and The Call Light Collective.

## Install on SiteGround

1. Zip the `jennifer-eddings` folder (the folder itself should be the zip root).
2. In WordPress: **Appearance → Themes → Add New → Upload Theme**.
3. Activate **Jennifer Eddings**.
4. **Settings → Reading**: set a static front page (create a blank “Home” page if needed).
5. Create a page titled **Appearances**, template **Appearances**, slug `appearances`.
6. Publish posts (categories like Podcast / Speaking / Feature) to fill the Appearances feed. Optional custom field `appearance_external_url` links a card out to Buzzsprout, etc.
7. **Appearance → Customize → Jennifer Eddings Brand**: add public email, booking URL, podcast URL, media kit, and confirm socials when the client sheet returns.

## Customize fields

- Public contact email (leave blank until confirmed — site shows “coming soon”)
- Booking / speaking URL
- Podcast URL
- Media kit URL
- Instagram, LinkedIn, Facebook, YouTube
- Hero headline + support line

## Package zip (from this repo root)

```bash
cd theme && zip -r jennifer-eddings.zip jennifer-eddings -x "*.DS_Store"
```
