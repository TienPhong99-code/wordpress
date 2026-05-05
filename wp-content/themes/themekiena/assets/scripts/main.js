// =============================================
// Lenis smooth scroll
// =============================================
const lenis = new Lenis({
   duration: .8,
   easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
   smooth: true,
});
window.lenis = lenis;

gsap.registerPlugin(ScrollTrigger);

// Sync Lenis với ScrollTrigger qua gsap.ticker (tránh double RAF)
lenis.on('scroll', ScrollTrigger.update);
gsap.ticker.add((time) => lenis.raf(time * 1000));
gsap.ticker.lagSmoothing(0);

$(document).ready(function () {
   initTitleMainAnim();
   initDuAnCategoryHero();
   initNumberCardsHover();
   initMissionCardsAnim();

   // =============================================
   // Mobile nav drawer
   // =============================================
   const $nav      = $('#hd-nav');
   const $backdrop = $('<div class="hd-nav-backdrop"></div>').appendTo('body');

   function openNav() {
      $nav.addClass('is-open').attr('aria-hidden', 'false');
      $backdrop.addClass('is-open');
      $('body').addClass('no-scroll');
   }
   function closeNav() {
      $nav.removeClass('is-open').attr('aria-hidden', 'true');
      $backdrop.removeClass('is-open');
      $('body').removeClass('no-scroll');
   }

   $(document).on('click', '.js-nav-open', openNav);
   $(document).on('click', '.js-nav-close', closeNav);
   $backdrop.on('click', closeNav);
   $(document).on('keydown', function (e) {
      if (e.key === 'Escape') closeNav();
   });

   // =============================================
   // Header sticky on scroll
   // =============================================
   const $hd = $('.hd');
   $(window).on('scroll', function () {
      if ($(this).scrollTop() > 100) {
         $hd.addClass('hd-sticky');
      } else {
         $hd.removeClass('hd-sticky');
      }
   });

   functionSlider('.slideSw', {
      speed: 1200,
      loop: false,
      slidesPerView: 'auto',
      autoplay: { delay: 2600 },
   });

   // ── Bất động sản swiper ──────────────────────────────────────────
   functionSlider('.sec-bds-projects', {
      speed: 800,
      slidesPerView: 1,
      loop: false,
      rewind: true,
        effect: 'fade',
          fadeEffect: {
    crossFade: true
  },
      allowTouchMove: true,
      autoplay: false,
      on: {
         slideChange: function () {
            var slide = this.slides[this.activeIndex];
            if (!slide) return;
            var first = slide.querySelector('.js-bds-item[data-index="0"]');
            if (first) bdsActivateItem(first, false);
         },
      },
   });

   document.addEventListener('click', function (e) {
      var btn = e.target.closest('.sec-bds-projects .js-bds-item');
      if (btn) bdsActivateItem(btn, true);
   });

   function bdsActivateItem(btn, animate) {
      if (!btn) return;
      var slide = btn.closest('.swiper-slide');
      if (!slide) return;
      var section = btn.closest('.sec-bds-projects');
      var isOdd = section && section.classList.contains('is-custom');

      slide.querySelectorAll('.js-bds-item').forEach(function (b) {
         var isActive = (b === btn);
         if (isOdd) {
            b.classList.toggle('bg-white', isActive);
            b.classList.toggle('text-pri', isActive);
         } else {
            b.classList.toggle('bg-pri', isActive);
            b.classList.toggle('text-white', isActive);
            b.classList.toggle('text-pri', !isActive);
         }
         var span = b.querySelector('span');
         if (span) span.style.fontWeight = isActive ? '700' : '400';
      });

      var right = slide.querySelector('.bds-slide-right');
      if (!right) return;

      function update() {
         var img = right.querySelector('.js-bds-image img');
         if (img) { img.src = btn.dataset.image || ''; img.alt = btn.dataset.name || ''; }
         var nameEl = right.querySelector('.js-bds-name');
         var descEl = right.querySelector('.js-bds-desc');
         if (nameEl) nameEl.textContent = btn.dataset.name || '';
         if (descEl) descEl.textContent = btn.dataset.description || '';
         right.querySelectorAll('.js-bds-meta').forEach(function (m) {
            var val = btn.dataset[m.dataset.key] || '';
            var valEl = m.querySelector('.js-bds-meta-value');
            if (valEl) valEl.textContent = val;
            m.style.display = val ? '' : 'none';
         });
      }

      update();
   }
   // ────────────────────────────────────────────────────────────────
      functionSlider('.slideFade', {
      speed: 1200,
      loop: false,
      effect: 'fade',
      slidesPerView: 'auto',
      autoplay: { delay: 2600 },
    fadeEffect: {
    crossFade: true
  },
   });

   // ── Journey swiper + timeline pagination ─────────────────────────
   (function () {
      var section = document.querySelector('.section-about-journey');
      if (!section) return;

      var swiperEl = section.querySelector('.journey-swiper');
      var tlItems  = section.querySelectorAll('.journey-tl-item');
      var fillEl   = section.querySelector('.journey-progress-fill');

      if (!swiperEl) return;

      function syncTimeline(sw, activeIndex) {
         tlItems.forEach(function (item) {
            item.classList.toggle('is-active', parseInt(item.dataset.index, 10) === activeIndex);
         });
         if (fillEl) {
            var total = sw.slides.length;
            var pct   = total > 1 ? (activeIndex / (total - 1)) * 100 : 0;
            fillEl.style.width = pct + '%';
         }
      }

      var swiper = new Swiper(swiperEl, {
         speed: 600,
         slidesPerView: 'auto',
         loop: false,
         allowTouchMove: true,
         autoplay: { delay: 3500, disableOnInteraction: false, pauseOnMouseEnter: true },
         navigation: {
            nextEl: section.querySelector('.swiper-next'),
            prevEl: section.querySelector('.swiper-prev'),
         },
         on: {
            init:        function () { syncTimeline(this, this.activeIndex); },
            slideChange: function () { syncTimeline(this, this.activeIndex); },
         },
      });

      tlItems.forEach(function (item) {
         item.addEventListener('click', function () {
            swiper.slideTo(parseInt(this.dataset.index, 10));
         });
      });
   })();
});

// =============================================
// Mission cols — auto-cycle highlight
// =============================================
function initMissionCardsAnim() {
   var section = document.querySelector('.sec-about-mission');
   if (!section) return;

   var cols = Array.from(section.querySelectorAll('.mission-col'));
   var bgs  = Array.from(section.querySelectorAll('.mission-bg'));
   if (!cols.length) return;

   var isMobile = window.innerWidth < 768;
   var currentIndex = -1;

   // Desktop: ẩn tất cả desc ban đầu bằng GSAP
   if (!isMobile) {
      cols.forEach(function (col) {
         gsap.set(col.querySelector('.mission-col-desc'), { maxHeight: 0, opacity: 0 });
         gsap.set(col.querySelector('.mission-col-overlay'), { opacity: 0 });
      });
      gsap.set(bgs[0], { opacity: 1 });
      bgs.slice(1).forEach(function (bg) { gsap.set(bg, { opacity: 0 }); });
   }

   function activate(idx) {
      cols.forEach(function (col, i) {
         var isActive = (i === idx);
         var bg      = bgs[i];
         var overlay = col.querySelector('.mission-col-overlay');
         var desc    = col.querySelector('.mission-col-desc');
         var title   = col.querySelector('.mission-col-title');

         if (bg) gsap.to(bg, { opacity: isActive ? 1 : 0, duration: 0.7, ease: 'power2.inOut' });
         if (overlay) gsap.to(overlay, { opacity: isActive ? 1 : 0, duration: 0.5 });
         if (title) gsap.to(title, { color: isActive ? '#f4de96' : '#ffffff', duration: 0.4 });

         if (!isMobile && desc) {
            gsap.to(desc, {
               maxHeight: isActive ? 300 : 0,
               opacity:   isActive ? 1 : 0,
               duration:  isActive ? 0.5 : 0.35,
               ease:      isActive ? 'power2.out' : 'power2.in',
            });
         }
      });
      currentIndex = idx;
   }

   function startCycle() {
      activate(0);
      setInterval(function () {
         activate((currentIndex + 1) % cols.length);
      }, 3500);
   }

   var rect = section.getBoundingClientRect();
   if (rect.top < window.innerHeight * 0.9) {
      setTimeout(startCycle, 200);
   } else {
      ScrollTrigger.create({
         trigger: section,
         start: 'top 85%',
         once: true,
         onEnter: startCycle,
      });
   }
}

// =============================================
// Number cards — hover đổi màu text
// =============================================
function initNumberCardsHover() {
   const cards = document.querySelectorAll('.section-about-number [data-num-card]');
   if (!cards.length) return;

   cards.forEach(function (card) {
      const color    = card.dataset.activeColor || '#ed1c24';
      const texts    = card.querySelectorAll('.num-card-text');
      const origColors = Array.from(texts).map(function (el) {
         return window.getComputedStyle(el).color;
      });

      card.addEventListener('mouseenter', function () {
         texts.forEach(function (el) {
            gsap.to(el, { color: color, duration: 0.3, ease: 'power2.out' });
         });
      });

      card.addEventListener('mouseleave', function () {
         texts.forEach(function (el, i) {
            gsap.to(el, { color: origColors[i] || '', duration: 0.3, ease: 'power2.out' });
         });
      });
   });
}

// =============================================
// Title main — hiệu ứng scroll cho .title-main
// =============================================
function initTitleMainAnim() {
   gsap.utils.toArray('.title-main').forEach(function (title) {
      const span = title.querySelector('span');

      if (!span) return;

      gsap.fromTo(span, {
         scale: 1.45,
         opacity: 0,
      }, {
         scale: 1,
         opacity: 1,
         color: '#ed1c24',
         duration: 0.6,
         ease: 'power3.out',
         scrollTrigger: {
            trigger: title,
            start: 'top 85%',
            toggleActions: 'play none none none',
         },
      });
   });
}

/**
 * Khởi tạo Swiper cho tất cả element khớp với selector.
 * Truyền class wrapper (chứa .swiper bên trong).
 *
 * @param {string} selector   - CSS selector của wrapper, vd: '.slideSw'
 * @param {object} options    - Swiper options override
 * @param {string} pagiType   - Loại pagination: 'bullets' | 'fraction' | 'progressbar'
 */
function functionSlider(selector, options = {}, pagiType = 'bullets') {
   const wrappers = document.querySelectorAll(selector);
   if (!wrappers.length) return;

   wrappers.forEach((wrap) => {
      const swiper = wrap.querySelector('.swiper');
      const pagi   = wrap.querySelector('.swiper-pagination');
      const next   = wrap.querySelector('.swiper-next');
      const prev   = wrap.querySelector('.swiper-prev');
      if (!swiper) return;

      new Swiper(swiper, {
         watchSlidesProgress: true,
         pagination: { el: pagi, type: pagiType, clickable: true },
         navigation:  { nextEl: next, prevEl: prev },
         ...options,
      });
   });
}
/**
 * CF7 Loading State Handler
 * Tự động thêm/xóa class is-loading cho nút submit của CF7
 */
(function () {
  'use strict';

  // Thêm loading khi bắt đầu submit
  document.addEventListener('wpcf7beforesubmit', function (event) {
    var form = event.target;
    var submitWrap = form.querySelector('.cf7-submit-wrap');
    if (submitWrap) {
      submitWrap.classList.add('is-loading');
    }
  }, false);

  // Xóa loading khi hoàn thành (bất kể thành công hay thất bại)
  function removeLoading(event) {
    var form = event.target;
    var submitWrap = form.querySelector('.cf7-submit-wrap');
    if (submitWrap) {
      submitWrap.classList.remove('is-loading');
    }
  }

  document.addEventListener('wpcf7submit', removeLoading, false);
  document.addEventListener('wpcf7invalid', removeLoading, false);
  document.addEventListener('wpcf7mailfailed', removeLoading, false);
  document.addEventListener('wpcf7spam', removeLoading, false);
})();
// =============================================
// Du-an category hero — fade-in on enter
// =============================================
function initDuAnCategoryHero() {
   const section = document.querySelector('.section-projects-hero');
   if (!section) return;

   const h1         = section.querySelector('h1');
   const paragraphs = section.querySelectorAll('.project-desc p');
   const img        = section.querySelector('img');

   if (h1) gsap.set(h1, { opacity: 0, y: 30 });
   if (paragraphs.length) gsap.set(paragraphs, { opacity: 0, y: 20 });
   if (img) gsap.set(img, { opacity: 0, y: 60 });

   const tl = gsap.timeline({ paused: true });

   if (h1) {
      tl.to(h1, { opacity: 1, y: 0, duration: 0.7, ease: 'power2.out' });
   }

   if (paragraphs.length) {
      tl.to(paragraphs, {
         opacity: 1,
         y: 0,
         duration: 0.6,
         stagger: 0.15,
         ease: 'power2.out',
      }, '-=0.4');
   }

   if (img) {
      tl.to(img, { opacity: 1, y: 0, duration: 1, ease: 'power2.out' }, '-=0.4');
   }

   ScrollTrigger.create({
      trigger: section,
      start: 'top 85%',
      once: true,
      onEnter: function () { tl.play(); },
   });
}

  window.addEventListener("load", function () {
    const speed = 0;

    const hash = window.location.hash;
    if ($(hash).length) scrollToID(hash, speed);

    $(".clickToSection").on("click", function (e) {
      e.preventDefault();
      const href = $(this).find("> a").attr("href") || $(this).attr("href");
      const id = href.slice(href.lastIndexOf("#"));
      if ($(id).length) {
        scrollToID(id, speed);
      } else {
        window.location.href = href;
      }
    });

    function scrollToID(id, speed) {
      const el = document.querySelector(id);
      if (!el) return;
      const offSet = document.querySelector('.hd')?.offsetHeight || 0;
      window.lenis.scrollTo(el, { offset: -offSet, duration: speed / 1000 || 0 });
    }
  });

  // ── Back to top ──────────────────────────────────────────────────────
  (function () {
    const btn = document.getElementById('backToTop');
    if (!btn) return;

    window.addEventListener('scroll', function () {
      if (window.scrollY > 300) {
        btn.classList.add('is-visible');
      } else {
        btn.classList.remove('is-visible');
      }
    }, { passive: true });

    btn.addEventListener('click', function () {
      if (window.lenis) {
        window.lenis.scrollTo(0, { duration: 1 });
      } else {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }
    });
  })();