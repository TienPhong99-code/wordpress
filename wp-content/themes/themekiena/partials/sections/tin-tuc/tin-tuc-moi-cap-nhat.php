<?php
$query = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 6,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

if (! $query->have_posts()) return;

$total = (int) $query->found_posts;
?>

<section class="tin-tuc-moi-cap-nhat relative pt-(--pd-sc) pb-(--pd-sc)"
    data-total="<?php echo $total; ?>"
    data-ajaxurl="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">

    <div class="container">
        <div class="flex flex-col gap-4">

            <h2 class="title-main text-center mb-8 max-xl:mb-5 max-md:mb-4">
                Tin tức <span>mới cập nhật</span>
            </h2>

            <div class="row js-news-grid">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="col col-6 max-md:w-full! mb-6 max-xl:mb-4 max-md:mb-3">
                        <?php get_template_part('partials/components/card-tin-tuc', null, ['post_id' => get_the_ID()]); ?>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Spinner -->
            <div class="js-news-loading hidden justify-center py-4">
                <div class="w-10 h-10 flex justify-center items-center">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2400 2400" xml:space="preserve">
                        <g stroke-width="200" stroke-linecap="round" stroke="currentColor" fill="none" id="spinner">
                            <line x1="1200" y1="600" x2="1200" y2="100" />
                            <line opacity="0.5" x1="1200" y1="2300" x2="1200" y2="1800" />
                            <line opacity="0.917" x1="900" y1="680.4" x2="650" y2="247.4" />
                            <line opacity="0.417" x1="1750" y1="2152.6" x2="1500" y2="1719.6" />
                            <line opacity="0.833" x1="680.4" y1="900" x2="247.4" y2="650" />
                            <line opacity="0.333" x1="2152.6" y1="1750" x2="1719.6" y2="1500" />
                            <line opacity="0.75" x1="600" y1="1200" x2="100" y2="1200" />
                            <line opacity="0.25" x1="2300" y1="1200" x2="1800" y2="1200" />
                            <line opacity="0.667" x1="680.4" y1="1500" x2="247.4" y2="1750" />
                            <line opacity="0.167" x1="2152.6" y1="650" x2="1719.6" y2="900" />
                            <line opacity="0.583" x1="900" y1="1719.6" x2="650" y2="2152.6" />
                            <line opacity="0.083" x1="1750" y1="247.4" x2="1500" y2="680.4" />
                            <animateTransform attributeName="transform" attributeType="XML" type="rotate" keyTimes="0;0.08333;0.16667;0.25;0.33333;0.41667;0.5;0.58333;0.66667;0.75;0.83333;0.91667" values="0 1199 1199;30 1199 1199;60 1199 1199;90 1199 1199;120 1199 1199;150 1199 1199;180 1199 1199;210 1199 1199;240 1199 1199;270 1199 1199;300 1199 1199;330 1199 1199" dur="0.83333s" begin="0s" repeatCount="indefinite" calcMode="discrete" />
                        </g>
                    </svg>
                </div>
            </div>
            <!-- Sentinel: IntersectionObserver bám vào đây để trigger load more -->
            <div class="js-news-sentinel h-px"></div>

        </div>
    </div>

</section>
<?php wp_reset_postdata(); ?>

<script>
    (function() {
        const section = document.querySelector('.tin-tuc-moi-cap-nhat');
        if (!section) return;

        const grid = section.querySelector('.js-news-grid');
        const sentinel = section.querySelector('.js-news-sentinel');
        const loader = section.querySelector('.js-news-loading');
        const total = parseInt(section.dataset.total, 10);
        const ajaxurl = section.dataset.ajaxurl;

        let offset = 6;
        let loading = false;

        // Không còn bài nào để load
        if (offset >= total) return;

        function loadMore() {
            if (loading || offset >= total) return;
            loading = true;
            loader.classList.remove('hidden');
            loader.classList.add('flex');

            fetch(ajaxurl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        action: 'kiena_load_more_tin_tuc',
                        offset
                    }),
                })
                .then(r => r.json())
                .then(res => {
                    if (res.success && res.html) {
                        grid.insertAdjacentHTML('beforeend', res.html);
                        offset += 4;
                    }
                    loader.classList.add('hidden');
                    loader.classList.remove('flex');
                    if (!res.has_more || offset >= total) {
                        observer.disconnect();
                    }
                    loading = false;

                    // Nếu sentinel vẫn trong viewport sau khi append, load tiếp luôn
                    if (res.has_more && offset < total) {
                        const rect = sentinel.getBoundingClientRect();
                        if (rect.top < window.innerHeight) loadMore();
                    }
                })
                .catch(() => {
                    loader.classList.add('hidden');
                    loader.classList.remove('flex');
                    loading = false;
                });
        }

        const observer = new IntersectionObserver(
            entries => {
                if (entries[0].isIntersecting) loadMore();
            }, {
                rootMargin: '0px'
            }
        );

        observer.observe(sentinel);
    })();
</script>