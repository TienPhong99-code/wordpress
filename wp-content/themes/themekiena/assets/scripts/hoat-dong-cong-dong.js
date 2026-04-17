$(document).ready(function () {
    initVideoGallery();
});

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
            display: {
                left: [],
                middle: [],
                right: ['close'],
            },
        },
    });
}
