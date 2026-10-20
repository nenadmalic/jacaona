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
            slide.style.setProperty('--bg', "url('" + slide.dataset.bg + "')");
            slide.style.setProperty('--bg-m', "url('" + (slide.dataset.bgMobile || slide.dataset.bg) + "')");
            slide.classList.add('hero-bg');
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


// Cookie consent: one first-party cookie (jacaona_consent, 180 days) stores the choice.
// Google Analytics and the Google map load only after "Accept"; "Show map" loads one map without storing consent.
document.addEventListener('DOMContentLoaded', function() {
    const COOKIE = 'jacaona_consent';
    const banner = document.getElementById('consent-banner');

    function getConsent() {
        const m = document.cookie.match(/(?:^|;\s*)jacaona_consent=(granted|denied)/);
        return m ? m[1] : null;
    }

    function setConsent(value) {
        const secure = location.protocol === 'https:' ? '; Secure' : '';
        document.cookie = COOKIE + '=' + value + '; Max-Age=' + 180 * 24 * 3600 + '; Path=/; SameSite=Lax' + secure;
    }

    function loadMap(placeholder) {
        const iframe = document.createElement('iframe');
        iframe.src = placeholder.dataset.mapSrc;
        iframe.title = placeholder.dataset.mapTitle;
        iframe.className = 'absolute inset-0 w-full h-full border-0';
        iframe.allowFullscreen = true;
        iframe.loading = 'lazy';
        iframe.referrerPolicy = 'no-referrer-when-downgrade';
        placeholder.replaceWith(iframe);
    }

    function loadAnalytics() {
        const id = window.JACAONA_GA4;
        // Only on the live domain, so local and staging visits never reach GA4
        if (!id || window.gtag || !/^(www\.)?jacaona\.com$/.test(location.hostname)) return;
        window.dataLayer = window.dataLayer || [];
        window.gtag = function() { window.dataLayer.push(arguments); };
        window.gtag('js', new Date());
        window.gtag('config', id);
        const s = document.createElement('script');
        s.async = true;
        s.src = 'https://www.googletagmanager.com/gtag/js?id=' + encodeURIComponent(id);
        document.head.appendChild(s);
    }

    function loadPostHog() {
        const ph = window.JACAONA_POSTHOG;
        if (!ph || window.posthog || !/^(www\.)?jacaona\.com$/.test(location.hostname)) return;
        const s = document.createElement('script');
        s.async = true;
        s.src = ph.host.replace('.i.posthog.com', '-assets.i.posthog.com') + '/static/array.full.js';
        s.onload = () => window.posthog.init(ph.key, { api_host: ph.host, person_profiles: 'identified_only' });
        document.head.appendChild(s);
    }

    function deleteAnalyticsCookies() {
        const host = location.hostname.replace(/^www\./, '');
        document.cookie.split(';').map(c => c.trim().split('=')[0])
            .filter(name => /^(_ga|ph_)/.test(name))
            .forEach(name => {
                [location.hostname, '.' + host, ''].forEach(domain => {
                    document.cookie = name + '=; Max-Age=0; Path=/' + (domain ? '; Domain=' + domain : '');
                });
            });
        try {
            Object.keys(localStorage).filter(k => /^ph_/.test(k)).forEach(k => localStorage.removeItem(k));
        } catch (e) { /* storage unavailable */ }
    }

    function applyConsent() {
        if (getConsent() !== 'granted') return;
        document.querySelectorAll('.map-consent').forEach(loadMap);
        loadAnalytics();
        loadPostHog();
    }

    // GA4 events for contact clicks (mark whatsapp_click and email_click as key events in GA4)
    document.addEventListener('click', e => {
        const a = e.target.closest('a[href]');
        if (!a || !window.gtag) return;
        const href = a.getAttribute('href');
        const name = /^https:\/\/wa\.me\//.test(href) ? 'whatsapp_click'
            : href.startsWith('mailto:') ? 'email_click'
            : href.startsWith('tel:') ? 'phone_click' : null;
        if (name) window.gtag('event', name, { link_url: href, transport_type: 'beacon' });
    });

    document.querySelectorAll('.map-consent-show').forEach(btn => {
        btn.addEventListener('click', () => loadMap(btn.closest('.map-consent')));
    });

    if (banner) {
        banner.querySelectorAll('[data-consent]').forEach(btn => {
            btn.addEventListener('click', () => {
                const previous = getConsent();
                setConsent(btn.dataset.consent);
                banner.hidden = true;
                if (btn.dataset.consent === 'granted') {
                    applyConsent();
                } else if (previous === 'granted') {
                    // Withdrawn: remove analytics cookies and reload so loaded scripts and maps are gone
                    deleteAnalyticsCookies();
                    location.reload();
                }
            });
        });
        document.querySelectorAll('[data-consent-open]').forEach(btn => {
            btn.addEventListener('click', () => {
                banner.hidden = false;
                banner.querySelector('[data-consent]').focus();
            });
        });
        if (getConsent() === null) banner.hidden = false;
    }

    applyConsent();
});
