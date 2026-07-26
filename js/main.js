// main.js - Minimal vanilla JavaScript for Jačaona website

document.addEventListener('DOMContentLoaded', function() {
    // Hero Slider
    const heroSlides = document.querySelectorAll('.hero-slide');
    const heroDots = document.querySelectorAll('.hero-dot');
    const heroPrev = document.getElementById('hero-prev');
    const heroNext = document.getElementById('hero-next');
    const heroPause = document.getElementById('hero-pause');
    let currentSlide = 0;
    let sliderInterval = null;
    let sliderPlaying = !window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function showSlide(index) {
        heroSlides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });

        heroDots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
            if (i === index) {
                dot.setAttribute('aria-current', 'true');
            } else {
                dot.removeAttribute('aria-current');
            }
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % heroSlides.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + heroSlides.length) % heroSlides.length;
        showSlide(currentSlide);
    }

    function stopAuto() {
        if (sliderInterval) {
            clearInterval(sliderInterval);
            sliderInterval = null;
        }
    }

    function startAuto() {
        stopAuto();
        sliderInterval = setInterval(nextSlide, 5000);
    }

    // Manual navigation restarts the timer so the next auto-advance
    // doesn't fire right after a click
    function restartAuto() {
        if (sliderPlaying) startAuto();
    }

    function updatePauseButton() {
        if (!heroPause) return;
        heroPause.setAttribute('aria-label', sliderPlaying
            ? (heroPause.dataset.labelPause || 'Pause')
            : (heroPause.dataset.labelPlay || 'Play'));
        const pauseIcon = heroPause.querySelector('.icon-pause');
        const playIcon = heroPause.querySelector('.icon-play');
        if (pauseIcon && playIcon) {
            pauseIcon.classList.toggle('hidden', !sliderPlaying);
            playIcon.classList.toggle('hidden', sliderPlaying);
        }
    }

    // Slides 2-3 carry their background in data-bg so only the first slide
    // competes with first paint; applied once the page has loaded
    window.addEventListener('load', () => {
        document.querySelectorAll('.hero-slide[data-bg]').forEach(slide => {
            slide.style.backgroundImage = "url('" + slide.dataset.bg + "')";
        });
    });

    if (heroSlides.length > 0) {
        if (sliderPlaying) startAuto();
        updatePauseButton();

        heroDots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
                restartAuto();
            });
        });

        if (heroPrev) heroPrev.addEventListener('click', () => { prevSlide(); restartAuto(); });
        if (heroNext) heroNext.addEventListener('click', () => { nextSlide(); restartAuto(); });

        if (heroPause) heroPause.addEventListener('click', () => {
            sliderPlaying = !sliderPlaying;
            if (sliderPlaying) startAuto(); else stopAuto();
            updatePauseButton();
        });
    }
    
    // Schedule Filter
    const scheduleFilterBtns = document.querySelectorAll('.schedule-filter-btn');
    const scheduleItems = document.querySelectorAll('.schedule-item');
    
    scheduleFilterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.dataset.filter;
            
            // Update button states
            scheduleFilterBtns.forEach(b => {
                b.classList.remove('bg-e5', 'text-white', 'font-bold');
            });
            this.classList.add('bg-e5', 'text-white', 'font-bold');
            
            // Filter schedule items - keep cells visible but hide content
            scheduleItems.forEach(item => {
                if (filter === 'all' || item.dataset.category === filter) {
                    item.style.display = 'table-cell';
                    item.style.visibility = 'visible';
                    item.style.opacity = '1';
                } else {
                    // Hide content but keep the cell structure
                    item.style.display = 'table-cell';
                    item.style.visibility = 'hidden';
                    item.style.opacity = '0';
                }
            });
            
            // Show/hide rows based on whether they have visible schedule items
            document.querySelectorAll('tbody tr').forEach(row => {
                const hasScheduleItems = row.querySelectorAll('.schedule-item').length > 0;
                
                if (filter === 'all') {
                    // Reset all cells to visible
                    row.querySelectorAll('.schedule-item').forEach(cell => {
                        cell.style.display = 'table-cell';
                        cell.style.visibility = 'visible';
                        cell.style.opacity = '1';
                    });
                    row.style.display = '';
                } else if (hasScheduleItems) {
                    // Check if any schedule items in this row match the filter
                    const hasMatchingItems = Array.from(row.querySelectorAll('.schedule-item')).some(cell => 
                        cell.dataset.category === filter
                    );
                    if (hasMatchingItems) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                } else {
                    // Row has no schedule items, always show it
                    row.style.display = '';
                }
            });
        });
    });
    
    // Gallery Filter
    const galleryFilterBtns = document.querySelectorAll('.gallery-filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    galleryFilterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.dataset.filter;
            
            // Update button states
            galleryFilterBtns.forEach(b => {
                b.classList.remove('bg-e5', 'text-white', 'font-bold');
            });
            this.classList.add('bg-e5', 'text-white', 'font-bold');
            
            // Filter gallery items
            galleryItems.forEach(item => {
                if (filter === 'all') {
                    item.style.display = '';
                } else {
                    const categories = item.dataset.categories ? item.dataset.categories.split(' ') : [];
                    if (categories.includes(filter)) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                }
            });
        });
    });
    
    // Image lightbox (gallery)
    const I18N = window.JACAONA_I18N || {};
    const lightboxTriggers = document.querySelectorAll('.gallery-lightbox-trigger');

    lightboxTriggers.forEach(trigger => {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            const imgSrc = this.href || this.src;
            const triggerImg = this.querySelector('img');
            const imgAlt = (triggerImg && triggerImg.alt) || this.alt || '';

            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center p-4';
            modal.setAttribute('role', 'dialog');
            modal.setAttribute('aria-modal', 'true');
            modal.setAttribute('aria-label', I18N.lightboxLabel || 'Enlarged photo');
            modal.innerHTML = `
                <div class="relative max-w-7xl max-h-full">
                    <img src="${imgSrc}" class="max-w-full max-h-[90vh] object-contain mx-auto" alt="">
                    <button type="button" class="absolute top-4 right-4 text-white text-4xl font-bold hover:text-gray-300 transition-colors" aria-label="${I18N.lightboxClose || 'Close'}">
                        &times;
                    </button>
                </div>
            `;
            modal.querySelector('img').alt = imgAlt;

            document.body.appendChild(modal);
            document.body.style.overflow = 'hidden';

            const closeBtn = modal.querySelector('button');
            closeBtn.focus();

            const closeModal = () => {
                modal.remove();
                document.body.style.overflow = '';
                document.removeEventListener('keydown', keyHandler);
                trigger.focus();
            };

            closeBtn.addEventListener('click', closeModal);
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeModal();
                }
            });

            // ESC closes; Tab stays on the close button (the only focusable element)
            const keyHandler = (e) => {
                if (e.key === 'Escape') {
                    closeModal();
                } else if (e.key === 'Tab') {
                    e.preventDefault();
                    closeBtn.focus();
                }
            };
            document.addEventListener('keydown', keyHandler);
        });
    });
    
    // Header scroll effect
    const header = document.getElementById('main-header');
    if (header) {
        let ticking = false;
        
        function handleScroll() {
            const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
            
            if (currentScroll > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }
        
        // Throttle scroll event for better performance
        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    handleScroll();
                    ticking = false;
                });
                ticking = true;
            }
        });
        
        // Check initial scroll position
        handleScroll();
    }
});

