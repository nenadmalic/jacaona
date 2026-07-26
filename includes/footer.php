    </main>

    <!-- Footer -->
    <footer class="bg-[#151515] text-[#afb4bf] pt-[72px]">
        <div class="container mx-auto px-4 pb-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8">
                <!-- Logo and Description -->
                <div class="lg:col-span-3">
                    <div class="mb-10">
                        <a href="<?php echo url('', $lang); ?>">
                            <img src="<?php echo asset('img/jacaona-logo-2025.svg'); ?>"
                                 alt="Jačaona logo"
                                 width="775" height="135" loading="lazy"
                                 class="w-[218px] max-w-full h-auto">
                        </a>
                    </div>
                    <p class="mb-8"><?php echo t('footer_tagline', $lang); ?></p>
                    <div>
                        <h2 class="text-white font-medium uppercase mb-5"><?php echo t('footer_follow', $lang); ?></h2>
                        <div class="flex space-x-8">
                            <a href="https://www.facebook.com/jacaona/" target="_blank" rel="noopener noreferrer" 
                               class="text-white hover:text-e5 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/jacaona/" target="_blank" rel="noopener noreferrer" 
                               class="text-white hover:text-e5 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/company/jacaona/" target="_blank" rel="noopener noreferrer" 
                               class="text-white hover:text-e5 transition-colors">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Navigation -->
                <div class="lg:col-span-2 lg:col-start-5">
                    <h2 class="font-display text-xl font-medium uppercase text-white mb-4 md:mb-10"><?php echo t('footer_nav', $lang); ?></h2>
                    <ul class="footer-inline-list flex flex-wrap gap-x-4 gap-y-2 md:block md:space-y-5">
                        <li><a href="<?php echo url('', $lang); ?>" class="uppercase text-white hover:text-e5 transition-colors"><?php echo t('nav_home', $lang); ?></a></li>
                        <li><a href="<?php echo url('o-nama', $lang); ?>" class="uppercase text-white hover:text-e5 transition-colors"><?php echo t('nav_about', $lang); ?></a></li>
                        <li><a href="<?php echo url('galerija', $lang); ?>" class="uppercase text-white hover:text-e5 transition-colors"><?php echo t('nav_gallery', $lang); ?></a></li>
                        <li><a href="<?php echo url('kontakt', $lang); ?>" class="uppercase text-white hover:text-e5 transition-colors"><?php echo t('nav_contact', $lang); ?></a></li>
                    </ul>
                </div>

                <!-- Sections -->
                <div class="lg:col-span-3">
                    <h2 class="font-display text-xl font-medium uppercase text-white mb-4 md:mb-10"><?php echo t('footer_sections', $lang); ?></h2>
                    <ul class="footer-inline-list flex flex-wrap gap-x-4 gap-y-2 md:block md:space-y-[22px] font-display font-medium text-white">
                        <li><?php echo t('section_gts', $lang); ?></li>
                        <li><?php echo t('section_contm', $lang); ?></li>
                        <li><?php echo t('section_ogym', $lang); ?></li>
                        <li><?php echo t('section_ona', $lang); ?></li>
                        <li><?php echo t('section_ftren', $lang); ?></li>
                        <li><?php echo t('section_kvir', $lang); ?></li>
                        <li><?php echo t('section_wchun', $lang); ?></li>
                        <li><?php echo t('section_crobran', $lang); ?></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div class="lg:col-span-3">
                    <h2 class="font-display text-xl font-medium uppercase text-white mb-10"><?php echo t('footer_contact', $lang); ?></h2>
                    <ul class="space-y-5">
                        <li>
                            <div class="flex items-start">
                                <svg class="w-6 h-6 mr-3 mt-0.5 flex-shrink-0 text-e5" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                                <div>
                                    <span class="block font-display font-medium text-white"><?php echo t('contact_whatsapp', $lang); ?></span>
                                    <a href="https://wa.me/385915050644" target="_blank" rel="noopener noreferrer" class="text-e5 hover:underline">+385 91 5050 644</a>
                                    <span class="block text-xs"><?php echo t('contact_fastest_response', $lang); ?></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-start">
                                <svg class="w-6 h-6 mr-3 mt-0.5 flex-shrink-0 text-e5" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <div>
                                    <span class="block font-display font-medium text-white"><?php echo t('contact_email', $lang); ?></span>
                                    <a href="mailto:info@jacaona.com" class="text-e5 hover:underline">info@jacaona.com</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-start">
                                <svg class="w-6 h-6 mr-3 mt-0.5 flex-shrink-0 text-e5" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <div>
                                    <span class="block font-display font-medium text-white"><?php echo t('contact_location', $lang); ?></span>
                                    <a href="https://maps.app.goo.gl/ZodRCzAtwRG8pqNd9" target="_blank" rel="noopener noreferrer" class="text-e5 hover:underline">
                                        <?php echo t('contact_address_full', $lang); ?>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <p class="text-xs mt-6 text-[#afb4bf]">
                        <?php echo t('footer_copyright', $lang); ?> &copy; <?php echo date('Y'); ?> <?php echo t('footer_rights', $lang); ?><br>
                        <?php echo t('footer_credits', $lang); ?>
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Copyright Footer -->
        <div class="bg-black border-t border-0a0a0a">
            <div class="container mx-auto px-4 py-5">
                <div class="flex flex-col items-center justify-center space-y-2">
                    <p class="text-sm text-center">
                        <?php echo t('footer_founded', $lang); ?>
                        <svg class="w-4 h-4 inline text-e5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                        <?php echo t('footer_founded_in', $lang); ?>
                        <span class="text-[#4d94ff] font-semibold"><?php echo t('footer_zagreb', $lang); ?></span>
                    </p>
                    <img src="<?php echo asset('img/zagreb-coat-of-arms.svg'); ?>" alt="Grad Zagreb grb" width="356" height="426" loading="lazy" class="h-8 w-auto">
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Main JavaScript -->
    <script>window.JACAONA_I18N = <?php echo json_encode(['lightboxClose' => t('lightbox_close', $lang), 'lightboxLabel' => t('lightbox_label', $lang)], JSON_UNESCAPED_UNICODE); ?>;</script>
    <script src="<?php echo asset('js/main.js', true); ?>"></script>
</body>
</html>




