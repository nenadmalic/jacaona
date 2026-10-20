<?php
// mobile-menu.php - Full-screen mobile navigation: pages, contact and social links, language switch.
// Opened by #mobile-menu-btn in header.php.
$current_path = $current_page ?? '';
$mobile_pages = [
    '' => t('nav_home', $lang),
    'o-nama' => t('nav_about', $lang),
    'galerija' => t('nav_gallery', $lang),
    'kontakt' => t('nav_contact', $lang),
];
$chip = 'inline-flex items-center gap-2 bg-e5 hover:bg-white hover:text-black text-white text-sm px-4 py-3 transition-colors';
?>
<div id="mobile-menu" class="md:hidden fixed inset-0 z-[60] bg-0a0a0a overflow-y-auto" role="dialog" aria-modal="true"
     aria-label="<?php echo htmlspecialchars(t('menu_label', $lang)); ?>" hidden>
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between py-4">
            <a href="<?php echo url('', $lang); ?>">
                <img src="<?php echo asset('img/jacaona-logo-2025.svg', true); ?>" alt="Jačaona logo" width="775" height="135" class="h-9 w-auto">
            </a>
            <button id="mobile-menu-close" type="button" class="p-2 text-white hover:text-e5"
                    aria-label="<?php echo htmlspecialchars(t('menu_close', $lang)); ?>">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <nav class="mt-8">
            <ul class="space-y-2">
<?php foreach ($mobile_pages as $slug => $label): $active = $current_path === $slug; ?>
                <li>
                    <a href="<?php echo url($slug, $lang); ?>"<?php echo $active ? ' aria-current="page"' : ''; ?>
                       class="block font-display uppercase text-3xl py-2 pl-4 border-l-4 <?php echo $active ? 'border-e5 text-white font-semibold' : 'border-transparent text-white hover:border-e5'; ?>">
                        <?php echo $label; ?>
                    </a>
                </li>
<?php endforeach; ?>
            </ul>
        </nav>

        <div class="h-1 bg-e5 w-full mt-10 mb-8" aria-hidden="true"></div>

        <div class="flex flex-wrap gap-3">
            <a href="https://wa.me/385915050644" target="_blank" rel="noopener noreferrer" class="<?php echo $chip; ?>">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                WhatsApp
            </a>
            <a href="mailto:info@jacaona.com" class="<?php echo $chip; ?>">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                info@jacaona.com
            </a>
            <a href="https://maps.app.goo.gl/ZodRCzAtwRG8pqNd9" target="_blank" rel="noopener noreferrer" class="<?php echo $chip; ?>">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <?php echo t('contact_address', $lang); ?>
            </a>
            <a href="https://www.facebook.com/jacaona/" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="<?php echo $chip; ?>">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
            </a>
            <a href="https://www.instagram.com/jacaona/" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="<?php echo $chip; ?>">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </a>
            <a href="https://www.linkedin.com/company/jacaona/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="<?php echo $chip; ?>">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
            </a>
        </div>

        <div class="flex gap-3 mt-8 mb-10">
            <a href="<?php echo url($current_path, 'hr'); ?>" hreflang="hr" lang="hr"<?php echo $lang === 'hr' ? ' aria-current="true"' : ''; ?>
               class="px-4 py-2 font-display uppercase <?php echo $lang === 'hr' ? 'bg-e5 text-white' : 'border border-white text-white hover:bg-e5 hover:border-e5'; ?>">Hrvatski</a>
            <a href="<?php echo url($current_path, 'en'); ?>" hreflang="en" lang="en"<?php echo $lang === 'en' ? ' aria-current="true"' : ''; ?>
               class="px-4 py-2 font-display uppercase <?php echo $lang === 'en' ? 'bg-e5 text-white' : 'border border-white text-white hover:bg-e5 hover:border-e5'; ?>">English</a>
        </div>
    </div>
</div>
