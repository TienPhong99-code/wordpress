$(document).ready(function () {
    initVideoGallery();
    initHoatDongGallery();

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
