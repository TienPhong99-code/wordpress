<?php
$sample = [
    'title'      => 'Môi trường làm việc',
    'title_span' => 'tại KIẾN Á',
    'items'      => [
        [
            'title' => 'Không gian khai phóng sáng tạo',
            'desc'  => 'Môi trường hiện đại, nơi mỗi ý tưởng khác biệt đều được lắng nghe và tôn trọng',
            'image' => 'tuyen-dung/td-img-1.png',
        ],
        [
            'title' => 'Lộ trình thăng tiến không giới hạn',
            'desc'  => 'Đầu tư toàn diện vào năng lực cá nhân thông qua đào tạo chuyên sâu và văn hóa kế thừa',
            'image' => 'tuyen-dung/td-img-2.png',
        ],
        [
            'title' => 'Hệ sinh thái phúc lợi chuẩn mực',
            'desc'  => 'Lương thưởng cạnh tranh, bảo hiểm, du lịch công ty',
            'image' => 'tuyen-dung/td-img-3.png',
        ],
        [
            'title' => 'Di sản nhân văn',
            'desc'  => 'Tự hào làm việc tại đơn vị luôn đặt con người làm tâm điểm trong mọi chiến lược phát triển',
            'image' => 'tuyen-dung/td-img-4.png',
        ],
    ],
];
$data = $sample;
?>

<section class="section-tuyen-dung-info slideSw pagination-pri custom-pri section-pd-t section-pd-b">
    <div class="container">

        <!-- Header: title trái + nav phải -->
        <div class="flex items-start justify-between gap-4 mb-8 max-xl:mb-6 max-md:mb-5 max-md:flex-col max-md:items-center max-md:text-center">
            <h2 class="title-main">
                <?php echo esc_html($data['title']); ?><br>
                <span><?php echo esc_html($data['title_span']); ?></span>
            </h2>
            <div class="flex gap-1 items-center shrink-0 mt-2">
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
                <?php foreach ($data['items'] as $item) : ?>
                    <div class="swiper-slide col col-4 max-xl:w-1/2! max-sm:w-3/4!">
                        <div class="flex flex-col gap-3">
                            <!-- Ảnh -->
                            <div class="relative rounded-2xl overflow-hidden bg-pri aspect-4/3">
                                <img src="<?php echo esc_url(MONA_THEME_PATH_URI . '/assets/images/' . $item['image']); ?>"
                                    class="absolute inset-0 w-full h-full object-cover"
                                    loading="lazy"
                                    alt="<?php echo esc_attr($item['title']); ?>">
                            </div>
                            <!-- Text -->
                            <div class="flex flex-col gap-2 text-pri">
                                <p class="font-bold text-[28px] max-xl:text-[22px] max-md:text-[18px] leading-normal tracking-[-0.04em]">
                                    <?php echo esc_html($item['title']); ?>
                                </p>
                                <p class="text-[16px] max-md:text-[14px] leading-normal tracking-[-0.04em]">
                                    <?php echo esc_html($item['desc']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="swiper-pagination justify-center mt-6"></div>
        </div>

    </div>
</section>