/* ============================================================
   MALFAUR ENGINEERING PRODUCTS — Main JavaScript
   ============================================================ */

document.addEventListener('DOMContentLoaded', function () {

    /* ── Sticky Header ── */
    const header = document.getElementById('site-header');
    if (header) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 40) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }, { passive: true });
    }

    /* ── Mobile Navigation ── */
    const hamburger = document.getElementById('hamburger');
    const mobileNav = document.getElementById('mobile-nav');
    if (hamburger && mobileNav) {
        hamburger.addEventListener('click', function () {
            const isOpen = mobileNav.classList.toggle('open');
            hamburger.classList.toggle('open', isOpen);
            document.body.style.overflow = isOpen ? 'hidden' : '';
        });
        // Close on link click
        mobileNav.querySelectorAll('.mobile-nav-link').forEach(function (link) {
            link.addEventListener('click', function () {
                mobileNav.classList.remove('open');
                hamburger.classList.remove('open');
                document.body.style.overflow = '';
            });
        });
        // Close on outside click
        document.addEventListener('click', function (e) {
            if (!header.contains(e.target) && mobileNav.classList.contains('open')) {
                mobileNav.classList.remove('open');
                hamburger.classList.remove('open');
                document.body.style.overflow = '';
            }
        });
    }

    /* ── Scroll Fade Animations ── */
    const fadeEls = document.querySelectorAll('.fade-up');
    if (fadeEls.length > 0 && 'IntersectionObserver' in window) {
        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        fadeEls.forEach(function (el) {
            observer.observe(el);
        });
    } else {
        fadeEls.forEach(function (el) { el.classList.add('visible'); });
    }

    /* ── Product Filtering (Products Page) ── */
    const filterBtns = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('.product-card[data-category]');
    const searchInput = document.getElementById('product-search');
    const filterClear = document.getElementById('filter-clear');
    const productsCount = document.getElementById('products-count');

    let activeCategory = 'all';
    let searchQuery = '';

    function updateDisplay() {
        let visible = 0;
        productCards.forEach(function (card) {
            const cat = card.getAttribute('data-category');
            const name = card.getAttribute('data-name') || '';
            const desc = card.getAttribute('data-desc') || '';
            const matchCat = activeCategory === 'all' || cat === activeCategory;
            const matchSearch = searchQuery === '' ||
                name.toLowerCase().includes(searchQuery) ||
                desc.toLowerCase().includes(searchQuery) ||
                cat.toLowerCase().includes(searchQuery);

            if (matchCat && matchSearch) {
                card.style.display = '';
                visible++;
            } else {
                card.style.display = 'none';
            }
        });

        if (productsCount) {
            productsCount.textContent = visible + ' product' + (visible !== 1 ? 's' : '') + ' found';
        }
    }

    if (filterBtns.length > 0) {
        filterBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                filterBtns.forEach(function (b) { b.classList.remove('active'); });
                btn.classList.add('active');
                activeCategory = btn.getAttribute('data-filter');
                updateDisplay();
            });
        });
    }

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            searchQuery = searchInput.value.trim().toLowerCase();
            updateDisplay();
        });
    }

    if (filterClear) {
        filterClear.addEventListener('click', function () {
            searchQuery = '';
            activeCategory = 'all';
            if (searchInput) searchInput.value = '';
            filterBtns.forEach(function (b) {
                b.classList.toggle('active', b.getAttribute('data-filter') === 'all');
            });
            updateDisplay();
        });
    }

    /* ── Product Modal ── */
    const modalOverlay = document.getElementById('product-modal');
    const modalClose = document.getElementById('modal-close');

    function openModal(data) {
        if (!modalOverlay) return;
        document.getElementById('modal-img').src = data.img;
        document.getElementById('modal-img').alt = data.name;
        document.getElementById('modal-category').textContent = data.category;
        document.getElementById('modal-name').textContent = data.name;
        document.getElementById('modal-desc').textContent = data.desc;
        // Specs
        const specsBody = document.getElementById('modal-specs-body');
        if (specsBody && data.specs) {
            specsBody.innerHTML = data.specs.map(function (s) {
                return '<div class="spec-row"><span class="spec-key">' + s[0] + '</span><span class="spec-val">' + s[1] + '</span></div>';
            }).join('');
        }
        modalOverlay.classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        if (!modalOverlay) return;
        modalOverlay.classList.remove('open');
        document.body.style.overflow = '';
    }

    if (modalClose) modalClose.addEventListener('click', closeModal);
    if (modalOverlay) {
        modalOverlay.addEventListener('click', function (e) {
            if (e.target === modalOverlay) closeModal();
        });
    }
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeModal();
    });

    // Attach to all "View Details" buttons
    document.querySelectorAll('.js-view-product').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const card = btn.closest('.product-card');
            if (!card) return;
            openModal({
                img: card.getAttribute('data-img'),
                name: card.getAttribute('data-name'),
                category: card.getAttribute('data-category'),
                desc: card.getAttribute('data-desc'),
                specs: JSON.parse(card.getAttribute('data-specs') || '[]')
            });
        });
    });

    /* ── Contact Form Handling ── */
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const btn = contactForm.querySelector('[type="submit"]');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> Enquiry Sent';
            btn.disabled = true;
            btn.style.background = '#16a34a';
            btn.style.borderColor = '#16a34a';
            setTimeout(function () {
                btn.innerHTML = originalText;
                btn.disabled = false;
                btn.style.background = '';
                btn.style.borderColor = '';
                contactForm.reset();
            }, 4000);
        });
    }

    /* ── Smooth anchor links ── */
    document.querySelectorAll('a[href^="#"]').forEach(function (a) {
        a.addEventListener('click', function (e) {
            const target = document.querySelector(a.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
});
