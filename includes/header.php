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
    <meta name="keywords" content="<?php echo htmlspecialchars(t('meta_keywords', $lang)); ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.jacaona.com<?php echo url($current_page ?? '', $lang); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="og:image" content="https://www.jacaona.com<?php echo asset('img/jacaona-website-thumbnail.jpg'); ?>">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.jacaona.com<?php echo url($current_page ?? '', $lang); ?>">
    <meta property="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="twitter:image" content="https://www.jacaona.com<?php echo asset('img/jacaona-website-thumbnail.jpg'); ?>">
    
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

