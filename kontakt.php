<?php
// kontakt.php - Contact page template
require_once __DIR__ . '/includes/config.php';

$current_page = 'kontakt';
$page_title = t('contact_title', $lang);
$page_description = t('contact_meta_description', $lang);
$schema_page_type = 'ContactPage';

require_once __DIR__ . '/includes/header.php';
?>

<!-- Map Section -->
<div class="relative h-[530px]">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2330.636655491703!2d15.964237153026524!3d45.806424585215936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d6ef802283cd%3A0xa77df4a42a455490!2zSmHEjWFvbmE!5e1!3m2!1sen!2shr!4v1752521016705!5m2!1sen!2shr"
            class="w-full h-full border-0"
            title="<?php echo htmlspecialchars(t('map_title', $lang)); ?>"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>

<!-- Contact Section -->
<section class="py-16 bg-black">
    <div class="container mx-auto px-4">
        <h1 class="sr-only"><?php echo t('contact_h1', $lang); ?></h1>
        <div class="grid md:grid-cols-2 gap-12 max-w-4xl mx-auto">
            <!-- Contact Info -->
            <div>
                <h2 class="text-2xl font-bold mb-6 font-display uppercase text-white"><?php echo t('contact_info_title', $lang); ?></h2>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 mr-3 mt-1 text-e5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        <div>
                            <a href="https://wa.me/385915050644" target="_blank" rel="noopener noreferrer" class="text-e5 hover:underline font-medium">
                                +385 91 5050 644
                            </a>
                            <span class="block text-sm text-[#afb4bf]"><?php echo t('contact_fastest_response', $lang); ?></span>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 mr-3 mt-1 text-e5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <div>
                            <a href="mailto:info@jacaona.com" class="text-e5 hover:underline font-medium">
                                info@jacaona.com
                            </a>
                        </div>
                    </li>
                </ul>

                <h2 class="text-2xl font-bold mt-8 mb-6 font-display uppercase text-white"><?php echo t('contact_location_title', $lang); ?></h2>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 mr-3 mt-1 text-e5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <div>
                            <a href="https://maps.app.goo.gl/ZodRCzAtwRG8pqNd9" target="_blank" rel="noopener noreferrer" class="text-e5 hover:underline font-medium">
                                <?php echo t('contact_address', $lang); ?>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Organization Details -->
            <div>
                <div class="mb-6">
                    <h2 class="text-2xl font-bold mb-6 font-display uppercase text-white"><abbr lang="en" title="International Bank Account Number"><?php echo t('contact_iban_title', $lang); ?></abbr></h2>
                    <p class="text-white"><?php echo t('contact_iban', $lang); ?></p>
                </div>

                <div class="mb-6">
                    <h2 class="text-2xl font-bold mb-6 font-display uppercase text-white"><abbr title="<?php echo $lang === 'en' ? 'Personal Identification Number' : 'Osobni identifikacijski broj'; ?>"><?php echo t('contact_oib_title', $lang); ?></abbr></h2>
                    <p class="text-white"><?php echo t('contact_oib', $lang); ?></p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold mb-6 font-display uppercase text-white"><?php echo t('contact_reg_title', $lang); ?></h2>
                    <p class="text-white"><?php echo t('contact_reg', $lang); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

