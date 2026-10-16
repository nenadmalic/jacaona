<?php
// o-nama.php - About page template
require_once __DIR__ . '/includes/config.php';

$current_page = 'o-nama';
$page_title = t('about_page_title', $lang);
$page_description = t('about_meta_description', $lang);

require_once __DIR__ . '/includes/header.php';
?>

<!-- Breadcrumb Section -->
<section class="breadcrumb-section bg-cover bg-center bg-no-repeat relative flex items-center justify-center"
         style="background-image: url('<?php echo img_url('img/about-us-triculja.jpg', 'w_1920'); ?>'); height: 300px;">
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-white text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 font-display"><?php echo t('about_breadcrumb', $lang); ?></h1>
            <div class="flex items-center justify-center space-x-2 text-sm">
                <a href="<?php echo url('', $lang); ?>" class="hover:underline">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <?php echo t('about_breadcrumb_home', $lang); ?>
                </a>
                <span>/</span>
                <span><?php echo t('about_breadcrumb_current', $lang); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto mb-12 text-center">
            <h2 class="text-4xl font-bold mb-4 font-display"><?php echo t('about_main_title', $lang); ?></h2>
            <p class="text-lg text-gray-300"><?php echo t('about_main_text', $lang); ?></p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-12 mb-12">
            <div>
                <h3 class="text-2xl font-bold mb-4 font-display"><?php echo t('about_section_1_title', $lang); ?></h3>
                <p class="text-gray-300 mb-4"><?php echo t('about_section_1_text_1', $lang); ?></p>
                <p class="text-gray-300 mb-4"><?php echo t('about_section_1_text_2', $lang); ?></p>
                <p class="text-gray-300 mb-4"><?php echo t('about_section_1_text_3', $lang); ?></p>
                <p class="text-gray-300"><?php echo t('about_section_1_text_4', $lang); ?></p>
            </div>
            <div>
                <h3 class="text-2xl font-bold mb-4 font-display"><?php echo t('about_section_2_title', $lang); ?></h3>
                <p class="text-gray-300 mb-4"><?php echo t('about_section_2_text_1', $lang); ?></p>
                <p class="text-gray-300 mb-4"><?php echo t('about_section_2_text_2', $lang); ?></p>
                <p class="text-gray-300"><?php echo t('about_section_2_text_3', $lang); ?></p>
            </div>
        </div>
        
        <div class="grid md:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-bold mb-4 font-display"><?php echo t('about_section_3_title', $lang); ?></h3>
                <p class="text-gray-300 mb-4"><?php echo t('about_section_3_text_1', $lang); ?></p>
                <p class="text-gray-300 mb-4"><?php echo t('about_section_3_text_2', $lang); ?></p>
                <p class="text-gray-300 mb-4"><?php echo t('about_section_3_text_3', $lang); ?></p>
                <p class="text-gray-300"><?php echo t('about_section_3_text_4', $lang); ?></p>
            </div>
            <div>
                <h3 class="text-2xl font-bold mb-4 font-display"><?php echo t('about_section_4_title', $lang); ?></h3>
                <p class="text-gray-300 mb-4"><?php echo t('about_section_4_text_1', $lang); ?></p>
                <p class="text-gray-300 mb-4"><?php echo t('about_section_4_text_2', $lang); ?></p>
                <p class="text-gray-300"><?php echo t('about_section_4_text_3', $lang); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-16 bg-0a0a0a">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-141414 rounded-lg shadow-lg p-8">
                <div class="flex mb-4">
                    <?php for($i = 0; $i < 5; $i++): ?>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    <?php endfor; ?>
                </div>
                <blockquote class="text-xl font-semibold mb-4 text-white"><?php echo t('testimonial_1', $lang); ?></blockquote>
                <div class="flex items-center">
                    <div class="mr-4">
                        <img src="<?php echo img_url('img/testimonials/sanh-logo-60px.png', 'w_128'); ?>" alt="SANH logo" width="64" height="64" loading="lazy" decoding="async" class="w-16 h-16 object-contain">
                    </div>
                    <div>
                        <p class="font-bold text-white"><?php echo t('testimonial_1_author', $lang); ?></p>
                        <span class="text-gray-300 text-sm"><?php echo t('testimonial_1_role', $lang); ?></span>
                    </div>
                </div>
            </div>
            
            <div class="bg-141414 rounded-lg shadow-lg p-8">
                <div class="flex mb-4">
                    <?php for($i = 0; $i < 5; $i++): ?>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    <?php endfor; ?>
                </div>
                <blockquote class="text-xl font-semibold mb-4 text-white"><?php echo t('testimonial_2', $lang); ?></blockquote>
                <div class="flex items-center">
                    <div class="mr-4">
                        <img src="<?php echo img_url('img/testimonials/mario-poljak-o-jacaoni.jpg', 'w_128,c_fill,ar_1:1'); ?>" alt="Mario Poljak" width="64" height="64" loading="lazy" decoding="async" class="w-16 h-16 rounded-full object-cover">
                    </div>
                    <div>
                        <p class="font-bold text-white"><?php echo t('testimonial_2_author', $lang); ?></p>
                        <span class="text-gray-300 text-sm"><?php echo t('testimonial_2_role', $lang); ?></span>
                    </div>
                </div>
            </div>
            
            <div class="bg-141414 rounded-lg shadow-lg p-8">
                <div class="flex mb-4">
                    <?php for($i = 0; $i < 5; $i++): ?>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    <?php endfor; ?>
                </div>
                <blockquote class="text-xl font-semibold mb-4 text-white"><?php echo t('testimonial_3', $lang); ?></blockquote>
                <div class="flex items-center">
                    <div class="mr-4">
                        <img src="<?php echo img_url('img/testimonials/3b-ju-jitsu-logo.png', 'w_128'); ?>" alt="3B Ju-Jitsu logo" width="64" height="64" loading="lazy" decoding="async" class="w-16 h-16 object-contain">
                    </div>
                    <div>
                        <p class="font-bold text-white"><?php echo t('testimonial_3_author', $lang); ?></p>
                        <span class="text-gray-300 text-sm"><?php echo t('testimonial_3_role', $lang); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Organization Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4 font-display text-white"><?php echo t('org_title', $lang); ?></h2>
            <p class="text-lg text-gray-300"><?php echo t('org_subtitle', $lang); ?></p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Existing members -->
            <div class="bg-141414 rounded-lg p-6 text-center">
                <p class="font-bold mb-2 text-white">Nenad Malić<span class="text-sm font-normal text-gray-300">, bacc.oec.</span></p>
                <p class="text-sm text-gray-300"><?php echo t('org_president', $lang); ?></p>
            </div>
            <div class="bg-141414 rounded-lg p-6 text-center">
                <p class="font-bold mb-2 text-white">Darijo Juričić<span class="text-sm font-normal text-gray-300">, mag. ing. tch. graph.</span></p>
                <p class="text-sm text-gray-300"><?php echo t('org_vice_president', $lang); ?></p>
            </div>
            <div class="bg-141414 rounded-lg p-6 text-center">
                <p class="font-bold mb-2 text-white">Jure Dean<span class="text-sm font-normal text-gray-300">, univ. mag. oec.</span></p>
                <p class="text-sm text-gray-300"><?php echo t('org_secretary', $lang); ?></p>
            </div>
            <div class="bg-141414 rounded-lg p-6 text-center">
                <p class="font-bold mb-2 text-white">Marko Domgjoni<span class="text-sm font-normal text-gray-300">, mag. ing. geol.</span></p>
                <p class="text-sm text-gray-300"><?php echo t('org_founding_member', $lang); ?></p>
            </div>
            
            <!-- Other members -->
            <div class="bg-141414 rounded-lg p-6 text-center">
                <p class="font-bold mb-2 text-white">Lucija Matanović<span class="text-sm font-normal text-gray-300">, mag. psych.</span></p>
                <p class="text-sm text-gray-300"><?php echo t('org_founding_member', $lang); ?></p>
            </div>
            <div class="bg-141414 rounded-lg p-6 text-center">
                <p class="font-bold mb-2 text-white">Saša Kovačević</p>
                <p class="text-sm text-gray-300"><?php echo t('org_founding_member', $lang); ?></p>
            </div>
            <div class="bg-141414 rounded-lg p-6 text-center">
                <p class="font-bold mb-2 text-white">Mario Poljak<span class="text-sm font-normal text-gray-300">, mag. iur.</span></p>
                <p class="text-sm text-gray-300"><?php echo t('org_trainer', $lang); ?></p>
            </div>
            <div class="bg-141414 rounded-lg p-6 text-center">
                <p class="font-bold mb-2 text-white">Josip Barbača<span class="text-sm font-normal text-gray-300">, mag. ing. traff.</span></p>
                <p class="text-sm text-gray-300"><?php echo t('org_founding_member', $lang); ?></p>
            </div>
            <div class="bg-141414 rounded-lg p-6 text-center">
                <p class="font-bold mb-2 text-white">Petra G. Puljek<span class="text-sm font-normal text-gray-300">, bacc. rel. int.</span></p>
                <p class="text-sm text-gray-300"><?php echo t('org_founding_member', $lang); ?></p>
            </div>
            <div class="bg-141414 rounded-lg p-6 text-center">
                <p class="font-bold mb-2 text-white">Josip Kornet</p>
                <p class="text-sm text-gray-300"><?php echo t('org_trainer', $lang); ?></p>
            </div>
            <div class="bg-141414 rounded-lg p-6 text-center">
                <p class="font-bold mb-2 text-white">Vida Štefan<span class="text-sm font-normal text-gray-300">, univ. mag. cin.</span></p>
                <p class="text-sm text-gray-300"><?php echo t('org_trainer', $lang); ?></p>
            </div>
            <div class="bg-141414 rounded-lg p-6 text-center">
                <p class="font-bold mb-2 text-white">Luka Pešun<span class="text-sm font-normal text-gray-300">, mag. art.</span></p>
                <p class="text-sm text-gray-300"><?php echo t('org_trainer', $lang); ?></p>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

