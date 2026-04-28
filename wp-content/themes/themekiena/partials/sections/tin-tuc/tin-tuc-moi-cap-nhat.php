<?php
defined('ABSPATH') || exit;

$query = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 9,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

if (!$query->have_posts()) return;

$groups = array_chunk($query->posts, 3);
wp_reset_postdata();
?>

<section class="tin-tuc-moi-cap-nhat slideSw pagination-pri custom-pri section-pd-t section-pd-b">
    <div class="container">

        <!-- Header: title trái + nav phải -->
        <div class="flex items-center justify-between mb-8 max-xl:mb-6 max-md:mb-5">
            <h2 class="title-main">TIN TỨC <span>CẬP NHẬT</span></h2>
            <div class="flex gap-1 items-center shrink-0">
                <button class="swiper-prev tts-btn w-8 h-8 md:w-11! md:h-11! rounded-full flex items-center justify-center shrink-0 transition" aria-label="Trước">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M5 8c0 .128.049.256.146.354l5 5a.5.5 0 0 0 .708-.708L6.207 8l4.647-4.646a.5.5 0 1 0-.708-.708l-5 5A.497.497 0 0 0 5 8Z" fill="#283377" />
                    </svg>
                </button>
                <button class="swiper-next tts-btn w-8 h-8 md:w-11! md:h-11! rounded-full flex items-center justify-center shrink-0 transition" aria-label="Tiếp theo">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M11 8a.497.497 0 0 0-.146-.354l-5-5a.5.5 0 1 0-.708.708L9.793 8l-4.647 4.646a.5.5 0 0 0 .708.708l5-5A.497.497 0 0 0 11 8Z" fill="#283377" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Swiper -->
        <div class="swiper rows overflow-hidden">
            <div class="swiper-wrapper">

                <?php foreach ($groups as $group) :
                    $big    = $group[0];
                    $smalls = array_slice($group, 1);

                    $big_thumb = get_the_post_thumbnail_url($big->ID, 'full');
                    $big_date  = get_the_date('d/m/Y', $big->ID);
                    $big_url   = get_permalink($big->ID);
                ?>
                    <div class="swiper-slide col">
                        <div class="flex gap-4 items-stretch max-md:flex-col">

                            <!-- Card lớn -->
                            <a href="<?php echo esc_url($big_url); ?>"
                                class="relative block rounded-lg overflow-hidden bg-pri flex-2 min-h-135 max-xl:min-h-105 max-md:min-h-65 group">
                                <?php if ($big_thumb) : ?>
                                    <img src="<?php echo esc_url($big_thumb); ?>"
                                        alt="<?php echo esc_attr($big->post_title); ?>"
                                        loading="lazy"
                                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <?php endif; ?>
                                <div class="absolute inset-0 bg-linear-to-b from-transparent to-[#1a1a1a] opacity-85 z-1"></div>
                                <div class="absolute bottom-0 left-0 right-0 z-2 p-4 flex flex-col gap-2 text-white">
                                    <p class="text-[12px] font-semibold tracking-[-0.04em]"><?php echo esc_html($big_date); ?></p>
                                    <h3 class="font-bold text-[28px] max-xl:text-[22px] max-md:text-[18px] tracking-[-0.04em] leading-normal line-clamp-3 transition-colors duration-300 group-hover:text-[#f4de96]">
                                        <?php echo esc_html($big->post_title); ?>
                                    </h3>
                                </div>
                            </a>

                            <!-- 2 card nhỏ -->
                            <?php if (!empty($smalls)) : ?>
                                <div class="flex flex-col gap-4 flex-1 max-md:flex-row max-md:flex-wrap">
                                    <?php foreach ($smalls as $small) :
                                        $sm_thumb = get_the_post_thumbnail_url($small->ID, 'large');
                                        $sm_date  = get_the_date('d/m/Y', $small->ID);
                                        $sm_url   = get_permalink($small->ID);
                                    ?>
                                        <a href="<?php echo esc_url($sm_url); ?>"
                                            class="relative block rounded-lg overflow-hidden flex-1 min-h-64 max-md:min-h-65 w-full group">
                                            <?php if ($sm_thumb) : ?>
                                                <img src="<?php echo esc_url($sm_thumb); ?>"
                                                    alt="<?php echo esc_attr($small->post_title); ?>"
                                                    loading="lazy"
                                                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                            <?php endif; ?>
                                            <div class="absolute inset-0 bg-linear-to-b from-transparent to-[#1a1a1a] opacity-85 z-1"></div>
                                            <div class="absolute bottom-0 left-0 right-0 z-2 p-4 flex flex-col gap-2 text-white">
                                                <p class="text-[12px] font-semibold tracking-[-0.04em]"><?php echo esc_html($sm_date); ?></p>
                                                <h4 class="font-bold text-[20px] max-xl:text-[17px] max-md:text-[15px] tracking-[-0.04em] leading-normal line-clamp-2 transition-colors duration-300 group-hover:text-[#f4de96]">
                                                    <?php echo esc_html($small->post_title); ?>
                                                </h4>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <!-- Pagination -->
            <div class="justify-center swiper-pagination mt-6"></div>
        </div>

    </div>
</section>

<script>
    (function() {
        var el = document.querySelector('.tt-news-swiper');
        if (!el || typeof Swiper === 'undefined') return;
        new Swiper(el, {
            loop: false,
            navigation: {
                prevEl: '.tt-news-prev',
                nextEl: '.tt-news-next',
            },
            pagination: {
                el: '.tt-news-pagination',
                clickable: true,
            },
        });
    })();
</script>