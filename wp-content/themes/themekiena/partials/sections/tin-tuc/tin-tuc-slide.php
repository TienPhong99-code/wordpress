<?php
$query = new WP_Query([
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 12,
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

if (! $query->have_posts()) return;

?>

<section class="tin-tuc-slide relative py-(--pd-sc) slideSw">
    <span class="absolute inset-0 bg-[#f4f5f8] z-[-1]"></span>

    <div class="container">

        <!-- Header: tiêu đề + nav -->
        <div class="flex items-center justify-between mb-8">
            <h2 class="title-main">
                Tất cả <span>Tin tức</span>
            </h2>
            <div class="flex gap-1 shrink-0">
                <button class="tts-prev tts-btn swiper-prev w-11 h-11 rounded-full flex items-center justify-center shrink-0 transition" aria-label="Trước">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M5 8c0 .128.049.256.146.354l5 5a.5.5 0 0 0 .708-.708L6.207 8l4.647-4.646a.5.5 0 1 0-.708-.708l-5 5A.497.497 0 0 0 5 8Z" fill="#283377" />
                    </svg>
                </button>
                <button class="tts-next tts-btn swiper-next w-11 h-11 rounded-full flex items-center justify-center shrink-0 transition" aria-label="Tiếp theo">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M11 8a.497.497 0 0 0-.146-.354l-5-5a.5.5 0 1 0-.708.708L9.793 8l-4.647 4.646a.5.5 0 0 0 .708.708l5-5A.497.497 0 0 0 11 8Z" fill="#283377" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Slider -->
        <div class="relative">
            <div class="swiper rows">
                <div class="swiper-wrapper">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="swiper-slide col col-4 max-md:w-1/2! max-sm:w-2/3!">
                            <?php get_template_part('partials/components/card-tin-tuc', null, ['post_id' => get_the_ID(), 'layout' => 'vertical']); ?>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </div>

        </div>

    </div>
</section>