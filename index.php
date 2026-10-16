<?php
// index.php - Homepage template
require_once __DIR__ . '/includes/config.php';

$current_page = '';
$page_title = t('home_title', $lang);
$page_description = t('meta_description', $lang);
$preload_image = img_url('img/hero-slider/jacaona-smjena-sekcija-jiu-jitsu-i-dizanje-utega-2d.jpg', 'w_1920');

require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero Section with simple CSS slider -->
<section class="hero-section relative h-screen overflow-hidden" style="margin-top: 0; padding-top: 0;">
    <div id="hero-slider" class="relative h-full" role="region" aria-roledescription="carousel" aria-label="Jačaona">
        <!-- Slide 1 (LCP image — preloaded in the head) -->
        <div class="hero-slide active absolute inset-0 bg-cover bg-center bg-no-repeat"
             style="background-image: url('<?php echo $preload_image; ?>');">
            <div class="container mx-auto px-4 h-full flex items-center justify-center relative z-10">
                <div class="text-white max-w-3xl text-center">
                    <h1 class="text-5xl md:text-7xl font-bold mb-4 font-display">JAČAONA</h1>
                    <p class="text-2xl md:text-4xl font-display"><?php echo t('home_hero_1', $lang); ?></p>
                </div>
            </div>
        </div>
        
        <!-- Slide 2 (background applied after window load) -->
        <div class="hero-slide absolute inset-0 bg-cover bg-center bg-no-repeat"
             data-bg="<?php echo img_url('img/hero-slider/hero-1b.jpg', 'w_1920'); ?>">
            <div class="container mx-auto px-4 h-full flex items-center justify-center relative z-10">
                <div class="text-white max-w-3xl text-center">
                    <p class="text-5xl md:text-7xl font-bold mb-4 font-display">JAČAONA</p>
                    <p class="text-2xl md:text-4xl font-display"><?php echo t('home_hero_2', $lang); ?></p>
                </div>
            </div>
        </div>
        
        <!-- Slide 3 (background applied after window load) -->
        <div class="hero-slide absolute inset-0 bg-cover bg-center bg-no-repeat"
             data-bg="<?php echo img_url('img/hero-slider/hero-3b.jpg', 'w_1920'); ?>">
            <div class="container mx-auto px-4 h-full flex items-center justify-center relative z-10">
                <div class="text-white max-w-3xl text-center">
                    <p class="text-5xl md:text-7xl font-bold mb-4 font-display">JAČAONA</p>
                    <p class="text-2xl md:text-4xl font-display"><?php echo t('home_hero_3', $lang); ?></p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Slider Arrows -->
    <button id="hero-prev" type="button"
            class="absolute left-4 md:left-[75px] top-1/2 -translate-y-1/2 z-20 p-2 text-white opacity-75 hover:opacity-100 transition-opacity"
            aria-label="<?php echo t('hero_prev', $lang); ?>">
        <svg class="w-10 h-10 md:w-14 md:h-14" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
        </svg>
    </button>
    <button id="hero-next" type="button"
            class="absolute right-4 md:right-[75px] top-1/2 -translate-y-1/2 z-20 p-2 text-white opacity-75 hover:opacity-100 transition-opacity"
            aria-label="<?php echo t('hero_next', $lang); ?>">
        <svg class="w-10 h-10 md:w-14 md:h-14" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
        </svg>
    </button>

    <!-- Slider Controls -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20 flex items-center space-x-2">
        <button type="button" class="hero-dot active w-3 h-3 rounded-full bg-white opacity-75 hover:opacity-100 transition-opacity" data-slide="0" aria-label="<?php echo t('hero_goto', $lang); ?> 1"></button>
        <button type="button" class="hero-dot w-3 h-3 rounded-full bg-white opacity-75 hover:opacity-100 transition-opacity" data-slide="1" aria-label="<?php echo t('hero_goto', $lang); ?> 2"></button>
        <button type="button" class="hero-dot w-3 h-3 rounded-full bg-white opacity-75 hover:opacity-100 transition-opacity" data-slide="2" aria-label="<?php echo t('hero_goto', $lang); ?> 3"></button>
        <button id="hero-pause" type="button"
                class="!ml-4 text-white opacity-75 hover:opacity-100 transition-opacity"
                aria-label="<?php echo t('hero_pause', $lang); ?>"
                data-label-pause="<?php echo t('hero_pause', $lang); ?>"
                data-label-play="<?php echo t('hero_play', $lang); ?>">
            <svg class="icon-pause w-4 h-4" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path d="M5 3.5h3v13H5zM12 3.5h3v13h-3z"/>
            </svg>
            <svg class="icon-play w-4 h-4 hidden" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                <path d="M6 3.5l10 6.5-10 6.5z"/>
            </svg>
        </button>
    </div>
</section>

<!-- Feature Section -->
<section class="pb-16" style="margin-top: 96vh;">
    <div class="container mx-auto">
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-141414 rounded-lg shadow-md overflow-hidden group hover:shadow-xl transition-shadow">
                <div class="bg-cover bg-center" 
                     style="height: 380px; background-image: url('<?php echo img_url('img/feature/feature-6.jpg', 'w_800'); ?>');">
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-3 font-display text-white"><?php echo t('feature_1_title', $lang); ?></h2>
                    <p class="text-gray-300"><?php echo t('feature_1_text', $lang); ?></p>
                </div>
            </div>
            
            <!-- Feature 2 -->
            <div class="bg-141414 rounded-lg shadow-md overflow-hidden group hover:shadow-xl transition-shadow">
                <div class="bg-cover bg-center" 
                     style="height: 380px; background-image: url('<?php echo img_url('img/feature/feature-5.jpg', 'w_800'); ?>');">
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-3 font-display text-white"><?php echo t('feature_2_title', $lang); ?></h2>
                    <p class="text-gray-300"><?php echo t('feature_2_text', $lang); ?></p>
                </div>
            </div>
            
            <!-- Feature 3 -->
            <div class="bg-141414 rounded-lg shadow-md overflow-hidden group hover:shadow-xl transition-shadow">
                <div class="bg-cover bg-center" 
                     style="height: 380px; background-image: url('<?php echo img_url('img/feature/feature-4.jpg', 'w_800'); ?>');">
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-3 font-display text-white"><?php echo t('feature_3_title', $lang); ?></h2>
                    <p class="text-gray-300"><?php echo t('feature_3_text', $lang); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-16" id="o-nama">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl font-bold mb-6 font-display"><?php echo t('about_title', $lang); ?></h2>
                <p class="text-lg text-gray-300 mb-4"><?php echo t('about_short', $lang); ?></p>
                <p class="text-gray-300 mb-4"><?php echo t('about_text_1', $lang); ?></p>
                <p class="text-gray-300 mb-4"><?php echo t('about_text_2', $lang); ?></p>
                <p class="text-gray-300"><?php echo t('about_text_3', $lang); ?></p>
            </div>
            <div>
                <img src="<?php echo img_url('img/dizanje-utega-13b.jpeg', 'w_1200'); ?>"
                     alt="<?php echo htmlspecialchars(t('about_img_alt', $lang)); ?>"
                     width="1200" height="1200" loading="lazy" decoding="async"
                     class="rounded-lg shadow-lg w-full">
            </div>
        </div>
    </div>
</section>

<!-- Booking Section -->
<section class="py-20 bg-cover bg-center bg-no-repeat relative" 
         style="background-image: url('<?php echo img_url('img/classes-title-bg2.jpg', 'w_1920'); ?>');">
    <div class="absolute inset-0 bg-black/50" aria-hidden="true"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center text-white max-w-3xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 font-display"><?php echo mb_strtoupper(t('booking_title', $lang), 'UTF-8'); ?></h2>
            <p class="text-lg mb-4 font-bold"><?php echo t('booking_text_1', $lang); ?></p>
            <p class="text-lg mb-4"><?php echo t('booking_text_2', $lang); ?></p>
            <p class="text-lg"><?php echo t('booking_text_3', $lang); ?></p>
        </div>
    </div>
</section>

<!-- Schedule Section -->
<section class="py-20">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl md:text-5xl font-bold mb-6 font-display text-center"><?php echo mb_strtoupper(t('schedule_title', $lang), 'UTF-8'); ?></h2>
        
        <!-- Schedule Filters -->
        <div class="flex flex-wrap justify-center gap-2 mb-8">
            <button class="schedule-filter-btn px-4 py-2 rounded-md bg-e5 text-white font-medium" data-filter="all">
                <?php echo t('schedule_all', $lang); ?>
            </button>
            <button class="schedule-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold" data-filter="gts">
                <?php echo t('schedule_gts', $lang); ?>
            </button>
            <button class="schedule-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold" data-filter="contm">
                <?php echo t('schedule_contm', $lang); ?>
            </button>
            <button class="schedule-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold" data-filter="kvir">
                <?php echo t('schedule_kvir', $lang); ?>
            </button>
            <button class="schedule-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold" data-filter="ogym">
                <?php echo t('schedule_ogym', $lang); ?>
            </button>
            <button class="schedule-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold" data-filter="ona">
                <?php echo t('schedule_ona', $lang); ?>
            </button>
            <button class="schedule-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold" data-filter="ftren">
                <?php echo t('schedule_ftren', $lang); ?>
            </button>
            <button class="schedule-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold" data-filter="wchun">
                <?php echo t('schedule_wchun', $lang); ?>
            </button>
            <button class="schedule-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold" data-filter="crobran">
                <?php echo t('schedule_crobran', $lang); ?>
            </button>
        </div>
        
        <!-- Schedule Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse schedule-section">
                <thead>
                    <tr>
                        <th scope="col" class="border border-gray-300 px-4 py-3 text-left"><span class="sr-only"><?php echo t('schedule_time_col', $lang); ?></span></th>
                        <th scope="col" class="border border-gray-300 px-4 py-3 text-center"><?php echo t('day_monday', $lang); ?></th>
                        <th scope="col" class="border border-gray-300 px-4 py-3 text-center"><?php echo t('day_tuesday', $lang); ?></th>
                        <th scope="col" class="border border-gray-300 px-4 py-3 text-center"><?php echo t('day_wednesday', $lang); ?></th>
                        <th scope="col" class="border border-gray-300 px-4 py-3 text-center"><?php echo t('day_thursday', $lang); ?></th>
                        <th scope="col" class="border border-gray-300 px-4 py-3 text-center"><?php echo t('day_friday', $lang); ?></th>
                        <th scope="col" class="border border-gray-300 px-4 py-3 text-center"><?php echo t('day_saturday', $lang); ?></th>
                        <th scope="col" class="border border-gray-300 px-4 py-3 text-center"><?php echo t('day_sunday', $lang); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- 8:30 -->
                    <tr>
                        <th scope="row" class="border border-gray-300 px-4 py-3 font-bold">8.30</th>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="gts">
                            <span class="text-sm">8.30 - 9.30</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_gts', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="gts">
                            <span class="text-sm">8.30 - 9.30</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_gts', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="gts">
                            <span class="text-sm">8.30 - 9.30</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_gts', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="gts">
                            <span class="text-sm">8.30 - 9.30</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_gts', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="gts">
                            <span class="text-sm">8.30 - 9.30</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_gts', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="ogym">
                            <span class="text-sm">8.30.00 - 11.00</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_ogym', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="ogym">
                            <span class="text-sm">8.30.00 - 11.00</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_ogym', $lang); ?></span>
                        </td>
                    </tr>
                    <!-- 11:00 -->
                    <tr>
                        <th scope="row" class="border border-gray-300 px-4 py-3 font-bold">11.00</th>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="gts">
                            <span class="text-sm">11.00 - 12.00</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_gts', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="gts">
                            <span class="text-sm">11.00 - 12.00</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_gts', $lang); ?></span>
                        </td>
                    </tr>
                    
                    <!-- 15:00 -->
                    <tr>
                        <th scope="row" class="border border-gray-300 px-4 py-3 font-bold">15.00</th>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="contm">
                            <span class="text-sm">15.00 - 16.00</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_contm', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="kvir">
                            <span class="text-sm">15.00 - 16.00</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_kvir', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="contm">
                            <span class="text-sm">15.00 - 16.00</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_contm', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="kvir">
                            <span class="text-sm">15.00 - 16.00</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_kvir', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="contm">
                            <span class="text-sm">15.00 - 16.00</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_contm', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                    </tr>
                    
                    <!-- 16:30 -->
                    <tr>
                        <th scope="row" class="border border-gray-300 px-4 py-3 font-bold">16.30</th>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="gts">
                            <span class="text-sm">16.30 - 17.30</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_gts', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="gts">
                            <span class="text-sm">16.30 - 17.30</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_gts', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                    </tr>
                    
                    <!-- 17:00 -->
                    <tr>
                        <th scope="row" class="border border-gray-300 px-4 py-3 font-bold">17.00</th>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="ogym">
                            <span class="text-sm">17.00 - 19.00</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_ogym', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="ogym">
                            <span class="text-sm">17.00 - 19.00</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_ogym', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="ogym">
                            <span class="text-sm">17.00 - 19.00</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_ogym', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                    </tr>
                    
                    <!-- 17:30 -->
                    <tr>
                        <th scope="row" class="border border-gray-300 px-4 py-3 font-bold">17.30</th>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="ona">
                            <span class="text-sm">17.30 - 18.30</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_ona', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="ona">
                            <span class="text-sm">17.30 - 18.30</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_ona', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                    </tr>
                    
                    <!-- 19:00 -->
                    <tr>
                        <th scope="row" class="border border-gray-300 px-4 py-3 font-bold">19.00</th>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="gts">
                            <span class="text-sm">19.00 - 20.00</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_gts', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="gts">
                            <span class="text-sm">19.00 - 20.00</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_gts', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="gts">
                            <span class="text-sm">19.00 - 20.00</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_gts', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                    </tr>
                    
                    <!-- 20:00 -->
                    <tr>
                        <th scope="row" class="border border-gray-300 px-4 py-3 font-bold">20.00</th>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="wchun">
                            <span class="text-sm">20.00 - 21.30</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_wchun', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="wchun">
                            <span class="text-sm">20.00 - 21.30</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_wchun', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="wchun">
                            <span class="text-sm">20.00 - 21.30</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_wchun', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="wchun">
                            <span class="text-sm">20.00 - 21.30</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_wchun', $lang); ?></span>
                        </td>
                    </tr>
                    
                    <!-- 20:15 -->
                    <tr>
                        <th scope="row" class="border border-gray-300 px-4 py-3 font-bold">20.15</th>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="ftren">
                            <span class="text-sm">20.15 - 21.30</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_ftren', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="ftren">
                            <span class="text-sm">20.15 - 21.30</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_ftren', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                    </tr>
                    
                    <!-- 20:30 -->
                    <tr>
                        <th scope="row" class="border border-gray-300 px-4 py-3 font-bold">20.30</th>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3 schedule-item" data-category="crobran">
                            <span class="text-sm">20.30 - 22.00</span>
                            <span class="block font-bold text-e5"><?php echo t('schedule_crobran', $lang); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                        <td class="border border-gray-300 px-4 py-3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Map Section -->
<div class="relative h-[590px]">
    <?php $map_embed_src = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3324.450142695802!2d15.962028076814342!3d45.806464971081645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d6ef802283cd%3A0xa77df4a42a455490!2zSmHEjWFvbmE!5e1!3m2!1sen!2shr!4v1743364661029!5m2!1sen!2shr'; include __DIR__ . '/includes/map.php'; ?>

    <div class="absolute top-[12%] right-[6%] bg-white p-6 rounded-lg shadow-lg w-[420px] max-w-[calc(100vw-2rem)] text-black">
        <p class="text-lg font-bold mb-4 text-black"><?php echo t('contact_org_name', $lang); ?></p>
        <dl class="space-y-2 text-sm text-black">
            <div class="flex">
                <dt class="font-semibold text-black"><?php echo t('contact_location', $lang); ?>:</dt>
                <dd class="text-black ml-2"><?php echo t('contact_address', $lang); ?></dd>
            </div>
            <div class="flex">
                <dt class="font-semibold text-black"><?php echo t('contact_iban_title', $lang); ?>:</dt>
                <dd class="text-black ml-2"><?php echo t('contact_iban', $lang); ?></dd>
            </div>
            <div class="flex">
                <dt class="font-semibold text-black"><?php echo t('contact_oib_title', $lang); ?>:</dt>
                <dd class="text-black ml-2"><?php echo t('contact_oib', $lang); ?></dd>
            </div>
            <div class="flex">
                <dt class="font-semibold text-black"><?php echo t('contact_reg_title', $lang); ?>:</dt>
                <dd class="text-black ml-2"><?php echo t('contact_reg', $lang); ?></dd>
            </div>
        </dl>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

