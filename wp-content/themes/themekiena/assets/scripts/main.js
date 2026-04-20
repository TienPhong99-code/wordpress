// =============================================
// Lenis smooth scroll
// =============================================
const lenis = new Lenis({
   duration: 1.2,
   easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
   smooth: true,
});
window.lenis = lenis;

gsap.registerPlugin(ScrollTrigger);

// Sync Lenis với ScrollTrigger
lenis.on('scroll', ScrollTrigger.update);
lenis.on('scroll', function () { $(window).trigger('scroll'); });

function raf(time) {
   lenis.raf(time);
   requestAnimationFrame(raf);
}
requestAnimationFrame(raf);

$(document).ready(function () {
   initTitleMainAnim();

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
      if ($(this).scrollTop() > 0) {
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
});

// =============================================
// Title main — hiệu ứng scroll cho .title-main
// =============================================
function initTitleMainAnim() {
   gsap.utils.toArray('.title-main').forEach(function (title) {
      const span = title.querySelector('span');

      if (!span) return;

      // Span trượt từ phải vào + highlight màu đỏ, title đứng yên
      gsap.fromTo(span, {
         x: 50,
         opacity: 0,
      }, {
         x: 0,
         opacity: 1,
         color: '#ed1c24',
         duration: 0.7,
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