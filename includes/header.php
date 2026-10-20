<?php
// header.php - Reusable header with Tailwind CSS
$page_title = $page_title ?? t('home_title', $lang);
$page_description = $page_description ?? t('meta_description', $lang);
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
<?php if (!empty($noindex)): ?>
    <meta name="robots" content="noindex">
<?php else: ?>
    <link rel="canonical" href="<?php echo canonical_url($current_page ?? '', $lang); ?>">
    <link rel="alternate" hreflang="hr" href="<?php echo canonical_url($current_page ?? '', 'hr'); ?>">
    <link rel="alternate" hreflang="en" href="<?php echo canonical_url($current_page ?? '', 'en'); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo canonical_url($current_page ?? '', 'hr'); ?>">
<?php endif; ?>
    <meta name="theme-color" content="#0a0a0a">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Jačaona">
    <meta property="og:locale" content="<?php echo $lang === 'en' ? 'en_US' : 'hr_HR'; ?>">
    <meta property="og:locale:alternate" content="<?php echo $lang === 'en' ? 'hr_HR' : 'en_US'; ?>">
    <meta property="og:url" content="<?php echo canonical_url($current_page ?? '', $lang); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="og:image" content="<?php echo SITE_URL . asset('img/jacaona-share-' . $lang . '.jpg'); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Jačaona - <?php echo htmlspecialchars(t('home_hero_1', $lang)); ?>">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="twitter:image" content="<?php echo SITE_URL . asset('img/jacaona-share-' . $lang . '.jpg'); ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo asset('img/favicon/favicon-96x96.png'); ?>" sizes="96x96">
    <link rel="icon" type="image/svg+xml" href="<?php echo asset('img/favicon/favicon.svg'); ?>">
    <link rel="shortcut icon" href="<?php echo asset('img/favicon/favicon.ico'); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo asset('img/favicon/apple-touch-icon.png'); ?>">
    <link rel="manifest" href="<?php echo asset('img/favicon/site.webmanifest'); ?>">
    
<?php foreach ($preload_images ?? [] as $pre): ?>
    <link rel="preload" as="image" href="<?php echo htmlspecialchars($pre['href']); ?>" media="<?php echo $pre['media']; ?>">
<?php endforeach; ?>
<?php if (CLOUDINARY_CLOUD !== ''): ?>
    <link rel="preconnect" href="https://res.cloudinary.com">
<?php endif; ?>
    <!-- Fonts: self-hosted, @font-face in css/input.css -->
    <link rel="preload" href="/fonts/nunito-sans-latin.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/oswald-latin.woff2" as="font" type="font/woff2" crossorigin>

    <!-- Styles (built via Tailwind standalone CLI — see README) -->
    <link rel="stylesheet" href="<?php echo asset('css/tailwind.css', true); ?>">
<?php if (empty($noindex)):
    // Structured data (schema.org JSON-LD)
    $org_id = SITE_URL . '/#organization';
    $website_id = SITE_URL . '/#website';
    $graph = [
        [
            '@type' => ['SportsClub', 'SportsActivityLocation'],
            '@id' => $org_id,
            'name' => 'Jačaona',
            'legalName' => 'Sportsko rekreativno društvo Jačaona',
            'description' => t('meta_description', $lang),
            'url' => SITE_URL . '/',
            'logo' => SITE_URL . asset('img/jacaona-logo-2025.svg'),
            'image' => SITE_URL . asset('img/jacaona-share-' . $lang . '.jpg'),
            'foundingDate' => '2011',
            'taxID' => '06688496520',
            'identifier' => ['@type' => 'PropertyValue', 'propertyID' => 'OIB', 'value' => '06688496520'],
            'telephone' => '+385915050644',
            'email' => 'info@jacaona.com',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Pierottijeva 11',
                'postalCode' => '10000',
                'addressLocality' => 'Zagreb',
                'addressCountry' => 'HR',
            ],
            'geo' => ['@type' => 'GeoCoordinates', 'latitude' => 45.806464, 'longitude' => 15.962028],
            'sameAs' => [
                'https://www.facebook.com/jacaona/',
                'https://www.instagram.com/jacaona/',
                'https://www.linkedin.com/company/jacaona/',
            ],
        ],
        [
            '@type' => 'WebSite',
            '@id' => $website_id,
            'url' => SITE_URL . '/',
            'name' => 'Jačaona',
            'inLanguage' => ['hr', 'en'],
            'publisher' => ['@id' => $org_id],
        ],
        [
            '@type' => $schema_page_type ?? 'WebPage',
            'url' => canonical_url($current_page ?? '', $lang),
            'name' => $page_title,
            'description' => $page_description,
            'inLanguage' => $lang,
            'isPartOf' => ['@id' => $website_id],
            'about' => ['@id' => $org_id],
        ],
    ];
    $breadcrumb_keys = ['o-nama' => 'nav_about', 'galerija' => 'nav_gallery', 'kontakt' => 'nav_contact'];
    if (isset($breadcrumb_keys[$current_page ?? ''])) {
        $graph[] = [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => t('nav_home', $lang), 'item' => canonical_url('', $lang)],
                ['@type' => 'ListItem', 'position' => 2, 'name' => t($breadcrumb_keys[$current_page], $lang), 'item' => canonical_url($current_page, $lang)],
            ],
        ];
    }
?>
    <script type="application/ld+json"><?php echo json_encode(['@context' => 'https://schema.org', '@graph' => $graph], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
<?php endif; ?>
</head>
<body class="font-sans antialiased text-white bg-0a0a0a">
    <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:z-[60] focus:top-2 focus:left-2 focus:bg-white focus:text-black focus:px-4 focus:py-2 focus:rounded"><?php echo t('skip_to_content', $lang); ?></a>
    <!-- Header -->
           <header id="main-header" class="bg-transparent shadow-sm sticky top-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <!-- Logo -->
                <a href="<?php echo url('', $lang); ?>" class="flex items-center">
                    <img src="<?php echo asset('img/jacaona-logo-2025.svg', true); ?>"
                         alt="Jačaona logo"
                         width="775" height="135"
                         class="h-9 w-auto">
                </a>
                
                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-6">
                    <?php include __DIR__ . '/nav.php'; ?>
                </nav>
                
                <!-- Language Switcher (desktop; on phones it is inside the mobile menu) -->
                <div class="hidden md:flex items-center space-x-2">
                    <a href="<?php echo url($current_page ?? '', 'hr'); ?>" hreflang="hr" aria-label="Hrvatski"
                       class="px-3 py-1 rounded text-sm font-medium transition-colors <?php echo $lang === 'hr' ? 'bg-e5 text-white' : 'text-white hover:bg-gray-800'; ?>">
                        <abbr title="Hrvatski" lang="hr" class="no-underline">HR</abbr>
                    </a>
                    <a href="<?php echo url($current_page ?? '', 'en'); ?>" hreflang="en" aria-label="English"
                       class="px-3 py-1 rounded text-sm font-medium transition-colors <?php echo $lang === 'en' ? 'bg-e5 text-white' : 'text-white hover:bg-gray-800'; ?>">
                        <abbr title="English" lang="en" class="no-underline">EN</abbr>
                    </a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" type="button" class="md:hidden flex items-center gap-2 p-2 text-white hover:text-e5"
                        aria-expanded="false" aria-controls="mobile-menu">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <span class="font-display uppercase text-lg"><?php echo t('menu_label', $lang); ?></span>
                </button>
            </div>
        </div>
    </header>
    <?php include __DIR__ . '/mobile-menu.php'; ?>
    
    <!-- Mobile menu: open/close, Esc, focus kept inside while open -->
    <script>
        (function() {
            const menu = document.getElementById('mobile-menu');
            const openBtn = document.getElementById('mobile-menu-btn');
            const closeBtn = document.getElementById('mobile-menu-close');
            if (!menu || !openBtn || !closeBtn) return;
            function open() {
                menu.hidden = false;
                openBtn.setAttribute('aria-expanded', 'true');
                document.body.style.overflow = 'hidden';
                closeBtn.focus();
            }
            function close() {
                menu.hidden = true;
                openBtn.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
                openBtn.focus();
            }
            openBtn.addEventListener('click', open);
            closeBtn.addEventListener('click', close);
            document.addEventListener('keydown', function(e) {
                if (menu.hidden) return;
                if (e.key === 'Escape') { close(); return; }
                if (e.key === 'Tab') {
                    const items = menu.querySelectorAll('a[href], button');
                    const first = items[0], last = items[items.length - 1];
                    if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
                    else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
                }
            });
            window.matchMedia('(min-width: 768px)').addEventListener('change', function(e) { if (e.matches && !menu.hidden) close(); });
        })();
    </script>

    <main id="main">

