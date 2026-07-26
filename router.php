<?php
/**
 * Development router for PHP's built-in server. Mirrors the .htaccess rules:
 *   php -S localhost:8000 router.php
 * Not used in production (Apache serves .htaccess; router.php is blocked there).
 */

$path = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// 301: legacy .html URLs and direct .php requests -> clean URLs
// (must run before the static-file check: .php files ARE files)
if (preg_match('#^(/en)?/(index|o-nama|galerija|kontakt)\.(html|php)$#', $path, $m)) {
    $slug = $m[2] === 'index' ? '' : $m[2];
    $target = ($m[1] !== '' ? '/en/' : '/') . $slug;
    header('Location: ' . $target, true, 301);
    exit;
}

// Never serve internals (mirrors .htaccess)
if (preg_match('#^/(includes|old|site-performance)(/|$)|^/router\.php$|/\.#', $path)) {
    http_response_code(404);
    require __DIR__ . '/404.php';
    return true;
}

// Existing static files (css/js/img/robots.txt/sitemap.xml/llms.txt/...)
if ($path !== '/' && is_file(__DIR__ . $path)) {
    return false;
}

// 301: /en -> /en/ ; strip trailing slashes from subpages
if ($path === '/en') {
    header('Location: /en/', true, 301);
    exit;
}
if ($path !== '/' && $path !== '/en/' && substr($path, -1) === '/') {
    header('Location: ' . rtrim($path, '/'), true, 301);
    exit;
}

// Resolve slug -> page file (language itself is detected from the URL in config.php)
$slug = trim(preg_replace('#^/en(/|$)#', '/', $path), '/');
$pages = [
    ''         => 'index.php',
    'o-nama'   => 'o-nama.php',
    'galerija' => 'galerija.php',
    'kontakt'  => 'kontakt.php',
];

if (array_key_exists($slug, $pages)) {
    header('Cache-Control: no-store');
    require __DIR__ . '/' . $pages[$slug];
    return true;
}

http_response_code(404);
require __DIR__ . '/404.php';
