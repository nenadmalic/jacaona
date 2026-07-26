# Setup & Deployment

Operational notes for jacaona.com. For the project overview see [README.md](README.md).

## URL scheme

Croatian pages: `/`, `/o-nama`, `/galerija`, `/kontakt`. English: `/en/`, `/en/o-nama`, `/en/galerija`, `/en/kontakt`. The language is derived from the URL path in `includes/config.php`. In development, `router.php` emulates the production `.htaccess` (clean URLs, 301s from legacy `.html`/`.php` URLs, 404 handling) — without it, only `/` works.

## CSS build

One-time setup (the binary is gitignored):

```
curl -sLo tailwindcss https://github.com/tailwindlabs/tailwindcss/releases/download/v3.4.17/tailwindcss-macos-arm64
chmod +x tailwindcss
```

Rebuild after changing any Tailwind classes in `*.php`/`js/*.js` or rules in `css/input.css` (`--watch` rebuilds on save during development):

```
./tailwindcss -i css/input.css -o css/tailwind.css --minify
```

**Rule: any commit that touches classes must also include the rebuilt `css/tailwind.css`** — otherwise the new utilities silently ship unstyled.

## Images (Cloudinary)

Photos are served through Cloudinary (`f_auto,q_auto` + per-context width transforms) via the `img_url()` helper in `includes/config.php`; the originals stay committed in `img/` as source of truth and backup. SVGs and favicons are always served locally.

Setup:
1. Create a folder `jacaona` in the Cloudinary Media Library and upload the contents of `img/` into it, preserving subfolders (`gallery/`, `hero-slider/`, `feature/`, `testimonials/`) and filenames.
2. Set the cloud name in `includes/config.php`: `define('CLOUDINARY_CLOUD', '<cloud-name>');`

While `CLOUDINARY_CLOUD` is empty, `img_url()` falls back to serving the local files — the site works either way.

## Deployment (cPanel/Apache)

Upload the repo contents to the document root, **excluding**: `old/`, `site-performance/`, `tailwindcss` (the binary), `.git/`, and any `.DS_Store` files. Must ship: `.htaccess`, `404.php`, `robots.txt`, `sitemap.xml`, `llms.txt`, `img/favicon/site.webmanifest`.

`.htaccess` provides: clean bilingual URLs, 301 redirects from the old `.html` URLs, canonical host+HTTPS redirect, gzip compression, browser caching, and blocks `/includes`, `router.php`, dotfiles and `.md` files.

Post-deploy checklist:
1. Redirect matrix: `/o-nama.html` → `/o-nama`, `/kontakt.php` → `/kontakt`, `/en` → `/en/`, `jacaona.com` → `https://www.jacaona.com`.
2. All 8 pages render in both languages; the HR/EN switcher round-trips.
3. `curl -sI -H 'Accept-Encoding: gzip' https://www.jacaona.com/css/tailwind.css` shows `Content-Encoding: gzip` and an `Expires` header.
4. `https://www.jacaona.com/includes/config.php` returns 404.
5. Submit `sitemap.xml` in Google Search Console (the v2.0 site was `noindex` — v2.1 is the site’s indexing debut).
