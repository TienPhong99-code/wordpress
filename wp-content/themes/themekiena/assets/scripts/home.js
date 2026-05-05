$(document).ready(function () {
   gsap.registerPlugin(ScrollTrigger, MorphSVGPlugin, SplitText);
   initBannerIntro();
   initVideoLoopCrossfade();
   initAboutsTimeline();
   initProjectParallax();
   initPopupDuAn();
   initScrollDown();
});

function initScrollDown() {
   var $btn = $('.banner-scroll-down');
   var $target = $('.section-abouts');
   if (!$btn.length || !$target.length) return;

   $btn.on('click', function () {
      $('html, body').animate({ scrollTop: $target.offset().top }, 600, 'swing');
   });
}

function initPopupDuAn() {
   var STORAGE_KEY = 'kiena_popup_du_an_seen';
   if (sessionStorage.getItem(STORAGE_KEY)) return;
   sessionStorage.setItem(STORAGE_KEY, '1');
   setTimeout(function () {
      if (window.modalOpen) window.modalOpen('popup-du-an');
   }, 800);
}

function initProjectParallax() {
   const section = document.querySelector('.section-project');
   if (!section) return;

   const imgs = section.querySelectorAll('.parallax-img-wrap img');
   if (!imgs.length) return;

   gsap.set(imgs, { scale: 1.2 });

   imgs.forEach(function (img) {
      gsap.fromTo(img,
         { yPercent: -12 },
         {
            yPercent: 12,
            ease: 'none',
            scrollTrigger: {
               trigger: img.closest('.swiper-slide'),
               start: 'top bottom',
               end: 'bottom top',
               scrub: true,
            },
         }
      );
   });
}

function initAboutsTimeline() {
   const abouts = document.querySelector('.section-abouts');
   if (!abouts) return;

   const drawPaths = gsap.utils.toArray('.svg-draw-layer path');
   drawPaths.forEach(function (path) {
      const len = path.getTotalLength();
      gsap.set(path, { strokeDasharray: len, strokeDashoffset: len });
   });

   gsap.set('.svg-masked-group', { opacity: 0 });
   var aboutWords = [];
   document.querySelectorAll('.about-content p').forEach(function (el) {
      try {
         var s = new SplitText(el, { type: 'words', wordsClass: 'about-word' });
         aboutWords = aboutWords.concat(s.words);
      } catch (e) {}
   });
   gsap.set(aboutWords, { opacity: 0, y: 20 });
   gsap.set('.about-img-bot', { y: 80, opacity: 0 });

   const tl = gsap.timeline({ paused: true });

   tl.to(drawPaths, {
      strokeDashoffset: 0,
      duration: 0.7,
      stagger: 0.07,
      ease: 'power2.out',
   });

   tl.to('.svg-masked-group', {
      opacity: 1,
      duration: 0.4,
      ease: 'power2.out',
   }, '-=0.3');

   tl.to('.svg-draw-layer', {
      opacity: 0,
      duration: 0.3,
      ease: 'none',
   }, '<');

   tl.to(aboutWords, {
      opacity: 1,
      y: 0,
      duration: 0.25,
      stagger: 0.015,
      ease: 'power2.out',
   }, '-=0.3');

   tl.to('.about-img-bot', {
      y: 0,
      opacity: 1,
      duration: 1,
      ease: 'power2.out',
   }, '-=0.5');

   ScrollTrigger.create({
      trigger: abouts,
      start: 'top 80%',
      once: true,
      onEnter: function () { tl.play(); },
   });
}