<?php
defined('ABSPATH') || exit;

// =============================================
// ACF DATA
// =============================================
$_post_id  = get_the_ID();
$items_raw = get_field('hoat_dong_items', $_post_id) ?: [];

$data = [
    'title'      => get_field('hoat_dong_title',      $_post_id) ?: 'Hình',
    'title_span' => get_field('hoat_dong_title_span', $_post_id) ?: 'ảnh',
    'items'      => array_map(function ($row) {
        return [
            'image'   => $row['image'] ?? '',
            'title'   => $row['hoat_dong_item_title'] ?? '',
            'gallery' => ! empty($row['gallery']) ? $row['gallery'] : [$row['image'] ?? ''],
        ];
    }, $items_raw),
];

$groups = array_chunk($data['items'], 3);
if (empty($groups)) return;
?>

<section class="section-hoat-dong slideFade pagination-pri custom-pri relative section-pd">
    <span class="absolute inset-0 bg-[#f4f5f8] z-[-1]"></span>
    <div class="container">

        <!-- Header: title trái + nav phải -->
        <div class="flex items-center justify-between mb-8 max-xl:mb-6 max-md:mb-5">
            <h2 class="title-main">
                <?php echo esc_html($data['title']); ?> <span><?php echo esc_html($data['title_span']); ?></span>
            </h2>
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
        <div class="swiper hd-swiper overflow-hidden">

            <div class="swiper-wrapper">

                <?php foreach ($groups as $group) :
                    $big    = $group[0];
                    $smalls = array_slice($group, 1);
                    $big_gallery = array_map(fn($u) => ['src' => $u, 'type' => 'image'], $big['gallery']);
                ?>
                    <div class="swiper-slide">
                        <div class="flex gap-4 items-stretch h-152 max-xl:h-120 max-md:flex-col max-md:h-auto">

                            <!-- Card lớn -->
                            <a href="#"
                                class="relative block rounded-lg overflow-hidden bg-[#0a0d1e] flex-[2_1_0%] group js-hoat-dong-gallery"
                                data-gallery="<?php echo esc_attr(wp_json_encode($big_gallery)); ?>"
                                aria-label="<?php echo esc_attr($big['title']); ?>">
                                <?php if ($big['image']) : ?>
                                    <img src="<?php echo esc_url($big['image']); ?>"
                                        alt="<?php echo esc_attr($big['title']); ?>"
                                        loading="lazy"
                                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <?php endif; ?>
                                <div class="absolute inset-0 bg-linear-to-b from-transparent to-[#1a1a1a] opacity-85 z-1"></div>
                                <div class="absolute bottom-0 left-0 right-0 z-2 p-4 text-white">
                                    <p class="font-bold text-[20px] max-md:text-[16px] tracking-[-0.04em] leading-normal"><?php echo esc_html($big['title']); ?></p>
                                </div>
                            </a>

                            <!-- 2 card nhỏ -->
                            <?php if (!empty($smalls)) : ?>
                                <div class="flex flex-col gap-4 flex-1 max-md:flex-row max-md:flex-wrap">
                                    <?php foreach ($smalls as $small) :
                                        $sm_gallery = array_map(fn($u) => ['src' => $u, 'type' => 'image'], $small['gallery']);
                                    ?>
                                        <a href="#"
                                            class="relative block rounded-lg overflow-hidden flex-1 min-h-0 group js-hoat-dong-gallery max-md:min-h-65 w-full"
                                            data-gallery="<?php echo esc_attr(wp_json_encode($sm_gallery)); ?>"
                                            aria-label="<?php echo esc_attr($small['title']); ?>">
                                            <?php if ($small['image']) : ?>
                                                <img src="<?php echo esc_url($small['image']); ?>"
                                                    alt="<?php echo esc_attr($small['title']); ?>"
                                                    loading="lazy"
                                                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                            <?php endif; ?>
                                            <div class="absolute inset-0 bg-linear-to-b from-transparent to-[#1a1a1a] opacity-85 z-1"></div>
                                            <div class="absolute bottom-0 left-0 right-0 z-2 p-4 text-white">
                                                <p class="font-bold text-[20px] max-md:text-[16px] tracking-[-0.04em] leading-normal line-clamp-2"><?php echo esc_html($small['title']); ?></p>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                <?php endforeach; ?>

            </div>


        </div>

    </div>
</section>