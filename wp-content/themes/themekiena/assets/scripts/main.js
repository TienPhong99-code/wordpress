// =============================================
// Lenis smooth scroll
// =============================================
const lenis = new Lenis({
   duration: 1.2,
   easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
   smooth: true,
});

function raf(time) {
   lenis.raf(time);
   requestAnimationFrame(raf);
}
requestAnimationFrame(raf);

$(document).ready(function () {
   // =============================================
   // Header nav toggle
   // =============================================
   const $nav = $('#hd-nav');

   // Mở menu
   $(document).on('click', '.js-nav-open', function () {
      $nav.addClass('is-open').attr('aria-hidden', 'false');
      $('body').addClass('no-scroll');
   });

   // Đóng menu
   $(document).on('click', '.js-nav-close', function () {
      $nav.removeClass('is-open').attr('aria-hidden', 'true');
      $('body').removeClass('no-scroll');
   });

   // Đóng khi click backdrop (click ngoài nav items)
   $nav.on('click', function (e) {
      if ($(e.target).is($nav)) {
         $nav.removeClass('is-open').attr('aria-hidden', 'true');
         $('body').removeClass('no-scroll');
      }
   });

   // Đóng khi nhấn Escape
   $(document).on('keydown', function (e) {
      if (e.key === 'Escape' && $nav.hasClass('is-open')) {
         $nav.removeClass('is-open').attr('aria-hidden', 'true');
         $('body').removeClass('no-scroll');
      }
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
