$(document).ready(function () {
    initVideoGallery();
    initHoatDongGallery();
    initAboutHoatDong();
});



function initHoatDongGallery() {
    document.querySelectorAll('.js-hoat-dong-gallery').forEach(function (trigger) {
        trigger.addEventListener('click', function (e) {
            e.preventDefault();
            var items = JSON.parse(this.dataset.gallery);
            Fancybox.show(items, {
                Thumbs: {
                    autoStart: true,
                },
                Toolbar: {
                    display: ['infobar', 'close'],
                },
            });
        });
    });
}

function initAboutHoatDong() {
    const section = document.querySelector('.section-about-hoat-dong');
    if (!section) return;

    const desc = section.querySelector('.mona-content');
    const img  = section.querySelector('img');

    if (desc) gsap.set(desc, { opacity: 0, y: 20 });
    if (img)  gsap.set(img,  { opacity: 0, y: 60 });

    const tl = gsap.timeline({ paused: true });

    if (desc) {
        tl.to(desc, { opacity: 1, y: 0, duration: 0.7, ease: 'power2.out' });
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

function initVideoGallery() {
    const wrap = document.querySelector('.section-hoat-dong-video');
    if (!wrap) return;

    Fancybox.bind('[data-fancybox="videos"]', {
        Html: {
            videoTpl: '<video class="fancybox__html5video" playsinline controls controlsList="nodownload" src="%s"></video>',
            youtube: {
                controls: 1,
                nocookie: 0,
            },
        },
        Toolbar: {
            display: ['close'],
        },
    });
}
