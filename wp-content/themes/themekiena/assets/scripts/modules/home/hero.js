function initVideoLoopCrossfade() {
   document.querySelectorAll('.section-banner .swiper-slide').forEach(function (slide) {
      var a = slide.querySelector('.video-loop-a');
      var b = slide.querySelector('.video-loop-b');
      if (!a || !b) return;

      var BEFORE = 0.5;
      var FADE   = 0.5;
      var switching = false;

      function crossfade(from, to) {
         if (switching) return;
         switching = true;

         to.currentTime = 0;
         to.play();
         to.style.transition   = 'opacity ' + FADE + 's';
         to.style.opacity      = 1;
         from.style.transition = 'opacity ' + FADE + 's';
         from.style.opacity    = 0;

         setTimeout(function () {
            from.pause();
            switching = false;
         }, FADE * 1000);
      }

      a.addEventListener('timeupdate', function () {
         if (a.duration && a.currentTime >= a.duration - BEFORE) crossfade(a, b);
      });

      b.addEventListener('timeupdate', function () {
         if (b.duration && b.currentTime >= b.duration - BEFORE) crossfade(b, a);
      });
   });
}

function initBannerIntro() {
   const banner = document.querySelector('.section-banner');
   if (!banner) return;

   gsap.registerPlugin(MorphSVGPlugin, SplitText);

   const logoPath = document.querySelector('#banner-logo-path');
   if (!logoPath) return;

   const logoD = logoPath.getAttribute('d');
   const pillD = 'M14,45 Q14,44 16,44 L450,44 Q452,44 452,45 L452,51 Q452,52 450,52 L16,52 Q14,52 14,51 Z';

   // ── Logo setup TRƯỚC — không phụ thuộc SplitText ─────────────────────────
   gsap.set(logoPath, { morphSVG: pillD });
   gsap.set('#banner-logo-svg', { opacity: 1 });
   gsap.set('.banner-scroll-down', { opacity: 0, y: 10 });

   // ── SplitText — bọc try/catch (có thể có <br> hoặc nested element) ───────
   var titleEls = gsap.utils.toArray('.banner-hero-title', banner);
   var allChars  = [];
   titleEls.forEach(function (el) {
      try {
         var split = new SplitText(el, { type: 'chars', charsClass: 'banner-char' });
         allChars  = allChars.concat(split.chars);
      } catch (e) {}
   });

   gsap.set(allChars,               { opacity: 0, x: 40 });
   gsap.set('.banner-hero-caption', { opacity: 0, y: 12 });

   var tl = gsap.timeline({ delay: 0.2 });

   // ── Phase 1: Pill → logo ──────────────────────────────────────────────────
   tl.to(logoPath, {
      morphSVG: logoD,
      duration: 1.1,
      ease: 'expo.inOut',
   }, 0);

   // ── Phase 2: Hold logo ────────────────────────────────────────────────────
   tl.to({}, { duration: 0.5 });

   // ── Phase 3: Logo exits upward ────────────────────────────────────────────
   tl.to('.frame-logo', {
      opacity: 0,
      y: -28,
      duration: 0.4,
      ease: 'power3.inOut',
   });

   // ── Phase 4: Text reveals ─────────────────────────────────────────────────
   tl.set('.banner-hero-overlay', { opacity: 1 });

   if (allChars.length) {
      tl.to(allChars, {
         opacity: 1,
         x: 0,
         duration: 0.5,
         stagger: 0.015,
         ease: 'power3.out',
      }, '-=0.08');
   }

   tl.to('.banner-hero-caption', {
      opacity: 1,
      y: 0,
      duration: 0.35,
      ease: 'power2.out',
   }, '-=0.3');

   tl.to('.banner-scroll-down', {
      opacity: 1,
      y: 0,
      duration: 0.3,
      ease: 'power2.out',
   }, '-=0.2');
}
