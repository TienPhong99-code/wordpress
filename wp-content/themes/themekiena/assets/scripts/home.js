$(document).ready(function () {
   gsap.registerPlugin(ScrollTrigger);
   initAboutsTimeline();
   initProjectParallax();
   initPopupDuAn();
});

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
   const banner = document.querySelector('.section-banner');
   const abouts = document.querySelector('.section-abouts');
   if (!banner || !abouts) return;

  
   const drawPaths = gsap.utils.toArray('.svg-draw-layer path');
   drawPaths.forEach(function (path) {
      const len = path.getTotalLength();
      gsap.set(path, { strokeDasharray: len, strokeDashoffset: len });
   });

   gsap.set('.svg-masked-group', { opacity: 0 });
   gsap.set('.about-content p', { opacity: 0, y: 28 });
   gsap.set('.about-img-bot', { y: 80, opacity: 0 });

   const tl = gsap.timeline({
      scrollTrigger: {
         trigger: abouts,
         start: 'top top',      
         end: '+=' + window.innerHeight * 2.5, 
         pin: true,
         scrub: 1,
      },
   });


   tl.to(drawPaths, {
      strokeDashoffset: 0,
      duration: 3,
      stagger: 0.5,
      ease: 'none',
   });


   tl.to('.svg-masked-group', {
      opacity: 1,
      duration: 1.5,
      ease: 'none',
   }, '-=1');

   tl.to('.svg-draw-layer', {
      opacity: 0,
      duration: 1,
      ease: 'none',
   }, '<');

  
   tl.to('.about-content p', {
      opacity: 1,
      y: 0,
      duration: 1.5,
      stagger: 0.5,
      ease: 'none',
   }, '-=0.5');

 
   tl.to('.about-img-bot', {
      y: 0,
      opacity: 1,
      duration: 2,
      ease: 'none',
   }, '-=1');
}