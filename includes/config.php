<?php
/**
 * Site configuration and language detection
 */

// Detect language from URL or default to Croatian
$lang = 'hr';
if (isset($_GET['lang']) && in_array($_GET['lang'], ['hr', 'en'])) {
    $lang = $_GET['lang'];
} elseif (isset($_SERVER['REQUEST_URI'])) {
    if (strpos($_SERVER['REQUEST_URI'], '/en/') !== false || strpos($_SERVER['REQUEST_URI'], '/en') !== false) {
        $lang = 'en';
    }
}

// Base URL for assets (adjust for your setup)
$base_url = '/';
$lang_prefix = $lang === 'hr' ? '' : '/' . $lang;

// Load translations
require_once __DIR__ . '/translations.php';

/**
 * Generate URL with language prefix
 * @param string $path Page path (e.g., 'o-nama', 'kontakt')
 * @param string|null $lang Language code (null = current language)
 * @return string Full URL path
 */
function url($path = '', $lang = null) {
    global $lang_prefix;
    if ($lang === null) {
        $lang = $GLOBALS['lang'];
    }
    $prefix = $lang === 'hr' ? '' : '/' . $lang;
    $path = ltrim($path, '/');
    
    // Detect if we're in development (PHP files) or production (HTML files)
    // Check if current script is a .php file
    $is_development = (strpos($_SERVER['PHP_SELF'] ?? '', '.php') !== false) || 
                      (strpos($_SERVER['SCRIPT_NAME'] ?? '', '.php') !== false);
    
    if ($path === '') {
        $url = $prefix === '' ? '/' : $prefix;
        return $is_development ? ($url === '/' ? '/index.php' : $url . '/index.php') : $url;
    }
    
    $url = $prefix . '/' . $path;
    return $is_development ? $url . '.php' : $url . '.html';
}

/**
 * Get asset URL
 * @param string $path Asset path relative to root
 * @return string Full asset URL
 */
function asset($path) {
    global $base_url;
    return $base_url . ltrim($path, '/');
}
?>

