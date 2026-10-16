<?php
/**
 * Site configuration, routing helpers and language detection
 */

define('SITE_URL', 'https://www.jacaona.com');

// Cloudinary cloud name for photo delivery (f_auto/q_auto CDN).
// Leave empty to serve all images from this server (local fallback).
define('CLOUDINARY_CLOUD', '');

// Language is determined by the URL path alone: /en and /en/... are English,
// everything else is Croatian. Anchored so paths like /enduro stay Croatian.
$request_path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$lang = preg_match('#^/en(/|$)#', $request_path) ? 'en' : 'hr';

// Base URL for assets
$base_url = '/';

// Load translations
require_once __DIR__ . '/translations.php';

/**
 * Clean extensionless URL for a page slug.
 * @param string $path Page slug ('', 'o-nama', 'galerija', 'kontakt')
 * @param string|null $lang Language code (null = current language)
 * @return string Root-relative URL ('/', '/kontakt', '/en/', '/en/kontakt')
 */
function url($path = '', $lang = null) {
    if ($lang === null) {
        $lang = $GLOBALS['lang'];
    }
    $path = trim($path, '/');
    if ($lang === 'en') {
        return $path === '' ? '/en/' : '/en/' . $path;
    }
    return $path === '' ? '/' : '/' . $path;
}

/**
 * Absolute canonical URL for a page. Derived from the page's own slug, never
 * from PHP_SELF/SCRIPT_NAME (on Apache the executing script is kontakt.php
 * but the public route is /kontakt).
 * @param string $path Page slug
 * @param string|null $lang Language code (null = current language)
 * @return string Absolute URL
 */
function canonical_url($path = '', $lang = null) {
    return SITE_URL . url($path, $lang);
}

/**
 * Get asset URL.
 * @param string $path Asset path relative to root
 * @param bool $versioned Append ?v=<filemtime> for cache busting
 * @return string Root-relative asset URL
 */
function asset($path, $versioned = false) {
    global $base_url;
    $path = ltrim($path, '/');
    $url = $base_url . $path;
    if ($versioned) {
        $file = __DIR__ . '/../' . $path;
        if (is_file($file)) {
            $url .= '?v=' . filemtime($file);
        }
    }
    return $url;
}

/**
 * Photo URL, served via Cloudinary when configured (originals stay in git;
 * Cloudinary public IDs mirror the img/ tree inside a 'jacaona' folder).
 * Non-photos (svg, ico) and the local fallback go through asset(); locally,
 * a .webp sibling (scripts/build-webp.sh) is served instead of the jpg/png.
 * @param string $path Local image path (e.g. 'img/gallery/foo.jpg')
 * @param string $transform Extra Cloudinary transforms (e.g. 'w_1600,c_limit')
 * @return string Image URL
 */
function img_url($path, $transform = '') {
    $path = ltrim($path, '/');
    if (CLOUDINARY_CLOUD === '' || !preg_match('/\.(jpe?g|png)$/i', $path)) {
        // Local delivery: prefer the WebP copy built by scripts/build-webp.sh
        $webp = preg_replace('/\.(jpe?g|png)$/i', '.webp', $path);
        if ($webp !== $path && is_file(__DIR__ . '/../' . $webp)) {
            return asset($webp, true);
        }
        return asset($path);
    }
    $t = 'f_auto,q_auto' . ($transform !== '' ? ',' . $transform : '');
    $public_path = preg_replace('#^img/#', '', $path);
    $public_path = implode('/', array_map('rawurlencode', explode('/', $public_path)));
    return 'https://res.cloudinary.com/' . CLOUDINARY_CLOUD . '/image/upload/' . $t . '/jacaona/' . $public_path;
}
