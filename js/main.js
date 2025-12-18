// main.js - Minimal vanilla JavaScript for Jačaona website

document.addEventListener('DOMContentLoaded', function() {
    // Hero Slider
    const heroSlides = document.querySelectorAll('.hero-slide');
    const heroDots = document.querySelectorAll('.hero-dot');
    let currentSlide = 0;
    
    function showSlide(index) {
        heroSlides.forEach((slide, i) => {
            slide.classList.remove('active');
            if (i === index) {
                slide.classList.add('active');
            }
        });
        
        heroDots.forEach((dot, i) => {
            if (i === index) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }
    
    function nextSlide() {
        currentSlide = (currentSlide + 1) % heroSlides.length;
        showSlide(currentSlide);
    }
    
    // Auto-advance slides every 5 seconds
    if (heroSlides.length > 0) {
        setInterval(nextSlide, 5000);
        
        // Dot navigation
        heroDots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
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
    
    // Simple Image Lightbox
    const galleryImages = document.querySelectorAll('.gallery-item img, .gallery-lightbox-trigger');
    
    galleryImages.forEach(img => {
        img.addEventListener('click', function(e) {
            e.preventDefault();
            const imgSrc = this.src || this.href;
            
            // Create modal
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center p-4';
            modal.innerHTML = `
                <div class="relative max-w-7xl max-h-full">
                    <img src="${imgSrc}" class="max-w-full max-h-[90vh] object-contain mx-auto" alt="Gallery image">
                    <button class="absolute top-4 right-4 text-white text-4xl font-bold hover:text-gray-300 transition-colors" aria-label="Close">
                        &times;
                    </button>
                </div>
            `;
            
            document.body.appendChild(modal);
            document.body.style.overflow = 'hidden';
            
            // Close handlers
            const closeModal = () => {
                modal.remove();
                document.body.style.overflow = '';
            };
            
            modal.querySelector('button').addEventListener('click', closeModal);
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeModal();
                }
            });
            
            // ESC key to close
            const escHandler = (e) => {
                if (e.key === 'Escape') {
                    closeModal();
                    document.removeEventListener('keydown', escHandler);
                }
            };
            document.addEventListener('keydown', escHandler);
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

