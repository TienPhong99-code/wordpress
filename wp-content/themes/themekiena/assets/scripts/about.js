$(document).ready(function () {
   initAboutInfoTimeline();
   initAboutNumberCounter();
   initAboutMission();
   initAboutNumberParallax();
   initAboutJourney();
});

function initAboutJourney() {
   const section = document.querySelector('.section-about-journey');
   if (!section) return;

   gsap.registerPlugin(ScrollTrigger);

   const track        = section.querySelector('.journey-track');
   const slides       = gsap.utils.toArray('.journey-slide', track);
   const spacers      = section.querySelectorAll('.journey-spacer');
   const progressFill = section.querySelector('.journey-progress-fill');

   function setSpacers() {
      const offset = Math.max(16, (window.innerWidth - 1200) / 2);
      spacers.forEach(el => { el.style.width = offset + 'px'; });
   }

   function updateActive(idx) {
      section.querySelectorAll('.journey-tl-item').forEach(el => {
         el.classList.toggle('is-active', parseInt(el.dataset.index) === idx);
      });
      slides.forEach((el, i) => el.classList.toggle('active', i === idx));
   }

   setSpacers();
   updateActive(0);

   const mm = gsap.matchMedia();
   mm.add('(min-width: 1024px)', () => {
      setSpacers();

      const getTotalMove = () => track.scrollWidth - window.innerWidth;

      const tween = gsap.to(track, {
         x: () => -getTotalMove(),
         ease: 'none',
         scrollTrigger: {
            trigger: section,
            pin: true,
            scrub: 1,
            invalidateOnRefresh: true,
            end: () => '+=' + getTotalMove(),
            onUpdate(self) {
               const idx = Math.round(self.progress * (slides.length - 1));
               updateActive(idx);
               if (progressFill) progressFill.style.width = (self.progress * 100) + '%';
            },
         },
      });

      window.addEventListener('load', () => {
         setSpacers();
         ScrollTrigger.refresh();
      }, { once: true });

      const onResize = () => { setSpacers(); ScrollTrigger.refresh(); };
      window.addEventListener('resize', onResize, { passive: true });

      return () => {
         tween.kill();
         window.removeEventListener('resize', onResize);
      };
   });
}

function initAboutNumberParallax() {
   const imgs = document.querySelectorAll('.section-about-number [data-parallax-bg]');
   if (!imgs.length) return;

   const SPEED = 0.12;

   function update() {
      imgs.forEach(img => {
         const card = img.parentElement;
         const rect = card.getBoundingClientRect();
         const viewH = window.innerHeight;
         if (rect.bottom < 0 || rect.top > viewH) return;
         const progress = (viewH - rect.top) / (viewH + rect.height);
         const offset = ((progress - 0.5) * rect.height * SPEED).toFixed(2);
         const scaleX = img.dataset.scaleX || '1';
         img.style.transform = `translateY(${offset}px) scaleX(${scaleX}) scale(1.1)`;
      });
   }

   window.addEventListener('scroll', update, { passive: true });
   window.addEventListener('resize', update, { passive: true });
   update();
}

function initAboutNumberCounter() {
   const counterBlock = document.querySelector('.counter-js');
   if (!counterBlock) return;

   let fired = false;

   function formatNumber(num) {
      return (!isNaN(num) && isFinite(num))
         ? Math.floor(num).toLocaleString('de-DE')
         : num;
   }

   function startCounter() {
      if (fired) return;
      const rect = counterBlock.getBoundingClientRect();
      if (rect.top > window.innerHeight || rect.bottom < 0) return;

      fired = true;
      $(window).off('scroll.counter');

      $('.countNum').each(function () {
         const $this   = $(this);
         const countStr = $this.attr('data-count');
         if (!countStr) return;

         if (countStr.includes('/')) { $this.text(countStr); return; }

         const match  = countStr.match(/^([^\d]*)(\d+)([^\d]*)$/);
         const prefix = match ? match[1] : '';
         const countTo = match ? parseInt(match[2], 10) : NaN;
         const suffix = match ? match[3] : '';

         if (!isNaN(countTo)) {
            $({ countNum: 0 }).animate({ countNum: countTo }, {
               duration: 3000,
               easing: 'swing',
               step: function () { $this.text(prefix + formatNumber(this.countNum) + suffix); },
               complete: function () { $this.text(prefix + formatNumber(this.countNum) + suffix); },
            });
         } else {
            $this.text(countStr);
         }
      });
   }

   startCounter();
   $(window).on('scroll.counter', startCounter);
}

function initAboutMission() {
   const $section = $('#secMission');
   if (!$section.length) return;

   const $cols = $section.find('.mission-col');
   const $bgs  = $section.find('.mission-bg');

   function setActive(index) {
      $bgs.each(function (i) {
         $(this).toggleClass('opacity-100', i === index).toggleClass('opacity-0', i !== index);
      });

      $cols.each(function (i) {
         const $col = $(this);
         $col.find('.mission-col-overlay')
            .toggleClass('opacity-100', i === index)
            .toggleClass('opacity-0', i !== index);
         $col.find('.mission-col-desc')
            .toggleClass('is-active', i === index);
      });
   }

   $cols.on('mouseenter', function () {
      setActive(parseInt($(this).data('index')));
   });
}

function initAboutInfoTimeline() {
   const section = document.querySelector('.section-about-info');
   if (!section) return;

   const drawPaths = gsap.utils.toArray('.section-about-info .svg-draw-layer path');
   drawPaths.forEach(function (path) {
      const len = path.getTotalLength();
      gsap.set(path, { strokeDasharray: len, strokeDashoffset: len });
   });

   gsap.set('.section-about-info .svg-fill-layer', { opacity: 0 });
   gsap.set('.section-about-info .about-info-content p', { opacity: 0, y: 28 });
   gsap.set('.section-about-info .about-info-img', { y: 80, opacity: 0 });

   const tl = gsap.timeline({ delay: 0.2 });

   tl.to(drawPaths, {
      strokeDashoffset: 0,
      duration: 1.2,
      stagger: 0.18,
      ease: 'power2.out',
   });

   tl.to('.section-about-info .svg-fill-layer', {
      opacity: 1,
      duration: 0.6,
      ease: 'power2.out',
   }, '-=0.5');

   tl.to('.section-about-info .svg-draw-layer', {
      opacity: 0,
      duration: 0.5,
      ease: 'power2.out',
   }, '<');

   tl.to('.section-about-info .about-info-content p', {
      opacity: 1,
      y: 0,
      duration: 0.8,
      stagger: 0.2,
      ease: 'power2.out',
   }, '-=0.3');

   tl.to('.section-about-info .about-info-img', {
      y: 0,
      opacity: 1,
      duration: 1,
      ease: 'power2.out',
   }, '-=0.4');
}
