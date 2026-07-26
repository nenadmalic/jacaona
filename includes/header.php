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
    <meta property="og:image" content="<?php echo SITE_URL . asset('img/jacaona-website-thumbnail.jpg'); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Jačaona - <?php echo htmlspecialchars(t('home_hero_1', $lang)); ?>">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="twitter:image" content="<?php echo SITE_URL . asset('img/jacaona-website-thumbnail.jpg'); ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo asset('img/favicon/favicon-96x96.png'); ?>" sizes="96x96">
    <link rel="icon" type="image/svg+xml" href="<?php echo asset('img/favicon/favicon.svg'); ?>">
    <link rel="shortcut icon" href="<?php echo asset('img/favicon/favicon.ico'); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo asset('img/favicon/apple-touch-icon.png'); ?>">
    <link rel="manifest" href="<?php echo asset('img/favicon/site.webmanifest'); ?>">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700;800;900&family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
            'image' => SITE_URL . asset('img/jacaona-website-thumbnail.jpg'),
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
           <!-- Header -->
           <header id="main-header" class="bg-transparent shadow-sm sticky top-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <!-- Logo -->
                <a href="<?php echo url('', $lang); ?>" class="flex items-center">
                    <img src="<?php echo asset('img/jacaona-logo-2025.svg'); ?>" 
                         alt="Jačaona logo" 
                         class="h-9 w-auto">
                </a>
                
                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-6">
                    <?php include __DIR__ . '/nav.php'; ?>
                </nav>
                
                <!-- Language Switcher -->
                <div class="flex items-center space-x-2">
                    <a href="<?php echo url($current_page ?? '', 'hr'); ?>" 
                       class="px-3 py-1 rounded text-sm font-medium transition-colors <?php echo $lang === 'hr' ? 'bg-blue-600 text-white' : 'text-white hover:bg-gray-800'; ?>">
                        HR
                    </a>
                    <a href="<?php echo url($current_page ?? '', 'en'); ?>" 
                       class="px-3 py-1 rounded text-sm font-medium transition-colors <?php echo $lang === 'en' ? 'bg-blue-600 text-white' : 'text-white hover:bg-gray-800'; ?>">
                        EN
                    </a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden p-2 text-white hover:text-gray-300" aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Mobile Navigation -->
            <nav id="mobile-menu" class="hidden md:hidden pb-4">
                <?php include __DIR__ . '/nav.php'; ?>
            </nav>
        </div>
    </header>
    
    <!-- Minimal JavaScript for mobile menu -->
    <script>
        document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            if (menu) {
                menu.classList.toggle('hidden');
            }
        });
    </script>

