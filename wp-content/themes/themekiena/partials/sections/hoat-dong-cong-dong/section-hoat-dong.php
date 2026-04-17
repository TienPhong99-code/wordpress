<?php
// =============================================
// SAMPLE DATA — dev tự kết nối ACF sau
// =============================================
$sample = [
    'title'       => 'Các',
    'title_span'  => 'hoạt động',
    'items'       => [
        [
            'image' => 'hoat-dong-cong-dong/hoat-dong-img-1.png',
            'title' => 'Từ thiện Bến Tre',
            'url'   => '#',
        ],
        [
            'image' => 'hoat-dong-cong-dong/hoat-dong-img-2.png',
            'title' => 'Trao tặng học bổng cho trường tiểu học Mỹ Thuỷ',
            'url'   => '#',
        ],
        [
            'image' => 'hoat-dong-cong-dong/hoat-dong-img-3.png',
            'title' => 'Trao tặng học bổng cho trường Mầm Non Sơn Ca',
            'url'   => '#',
        ],
        [
            'image' => 'hoat-dong-cong-dong/hoat-dong-img-7.png',
            'title' => 'Trao tặng học bổng cho trường tiểu học Mỹ Thuỷ 2015 - 2016',
            'url'   => '#',
        ],
        [
            'image' => 'hoat-dong-cong-dong/hoat-dong-img-8.png',
            'title' => 'Tài trợ chương trình học tiếng anh cho cụm trường Cát Lái',
            'url'   => '#',
        ],
        [
            'image' => 'hoat-dong-cong-dong/hoat-dong-img-9.png',
            'title' => 'Trao tặng học bổng cho trường tiểu học Mỹ Thuỷ',
            'url'   => '#',
        ],
        [
            'image' => 'hoat-dong-cong-dong/hoat-dong-img-4.png',
            'title' => 'Chương trình từ thiện Phú Yên',
            'url'   => '#',
        ],
        [
            'image' => 'hoat-dong-cong-dong/hoat-dong-img-5.png',
            'title' => 'Trao tặng học bổng cho sinh viên trường UEF',
            'url'   => '#',
        ],
        [
            'image' => 'hoat-dong-cong-dong/hoat-dong-img-6.png',
            'title' => 'Tài trợ học bổng cho trường UEF',
            'url'   => '#',
        ],
    ],
];
$data = $sample;
?>

<section class="section-hoat-dong relative pt-(--pd-sc) pb-(--pd-sc)">

    <div class="container">

        <!-- Title -->
        <h2 class="title-main text-center mb-16">
            <?php echo esc_html($data['title']); ?> <span><?php echo esc_html($data['title_span']); ?></span>
        </h2>

        <!-- Row 1: big left + 2 stacked right -->
        <div class="relative mb-4">
            <div class="row items-stretch small">
                <div class="col col-8">
                    <div class="relative rounded-[8px] overflow-hidden bg-[#0a0d1e] h-full">
                        <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/<?php echo esc_attr($data['items'][0]['image']); ?>"
                            class="absolute inset-0 w-full h-full object-cover" alt="">
                        <div class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-[rgba(26,26,26,0.8)] to-[rgba(26,26,26,0)] pt-8 pb-4 px-4">
                            <p class="text-white text-[20px] font-bold"><?php echo esc_html($data['items'][0]['title']); ?></p>
                        </div>
                        <a href="<?php echo esc_url($data['items'][0]['url']); ?>" class="absolute inset-0 z-1" aria-label="<?php echo esc_attr($data['items'][0]['title']); ?>"></a>
                    </div>
                </div>
                <div class="col col-4">
                    <div class="flex flex-col gap-4 h-full">
                        <div class="relative rounded-[8px] overflow-hidden bg-[#0a0d1e] h-[296px]">
                            <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/<?php echo esc_attr($data['items'][1]['image']); ?>"
                                class="absolute inset-0 w-full h-full object-cover" alt="">
                            <div class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-[rgba(26,26,26,0.8)] to-[rgba(26,26,26,0)] pt-8 pb-4 px-4">
                                <p class="text-white text-[20px] font-bold"><?php echo esc_html($data['items'][1]['title']); ?></p>
                            </div>
                            <a href="<?php echo esc_url($data['items'][1]['url']); ?>" class="absolute inset-0 z-1" aria-label="<?php echo esc_attr($data['items'][1]['title']); ?>"></a>
                        </div>
                        <div class="relative rounded-[8px] overflow-hidden bg-[#0a0d1e] h-[296px]">
                            <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/<?php echo esc_attr($data['items'][2]['image']); ?>"
                                class="absolute inset-0 w-full h-full object-cover" alt="">
                            <div class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-[rgba(26,26,26,0.8)] to-[rgba(26,26,26,0)] pt-8 pb-4 px-4">
                                <p class="text-white text-[20px] font-bold"><?php echo esc_html($data['items'][2]['title']); ?></p>
                            </div>
                            <a href="<?php echo esc_url($data['items'][2]['url']); ?>" class="absolute inset-0 z-1" aria-label="<?php echo esc_attr($data['items'][2]['title']); ?>"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 2: 3 equal cards -->
        <div class="relative mb-4">
            <div class="row small">
                <?php foreach (array_slice($data['items'], 3, 3) as $item) : ?>
                    <div class="col col-4">
                        <div class="relative rounded-[8px] overflow-hidden bg-[#0a0d1e] aspect-4/3">
                            <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/<?php echo esc_attr($item['image']); ?>"
                                class="absolute inset-0 w-full h-full object-cover" alt="">
                            <div class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-[rgba(26,26,26,0.8)] to-[rgba(26,26,26,0)] pt-8 pb-4 px-4">
                                <p class="text-white text-[20px] font-bold"><?php echo esc_html($item['title']); ?></p>
                            </div>
                            <a href="<?php echo esc_url($item['url']); ?>" class="absolute inset-0 z-1" aria-label="<?php echo esc_attr($item['title']); ?>"></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Row 3: 2 stacked left + big right -->
        <div class="relative">
            <div class="row items-stretch small">
                <div class="col col-4">
                    <div class="flex flex-col gap-4 h-full">
                        <div class="relative rounded-[8px] overflow-hidden bg-[#0a0d1e] h-[296px]">
                            <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/<?php echo esc_attr($data['items'][6]['image']); ?>"
                                class="absolute inset-0 w-full h-full object-cover" alt="">
                            <div class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-[rgba(26,26,26,0.8)] to-[rgba(26,26,26,0)] pt-8 pb-4 px-4">
                                <p class="text-white text-[20px] font-bold"><?php echo esc_html($data['items'][6]['title']); ?></p>
                            </div>
                            <a href="<?php echo esc_url($data['items'][6]['url']); ?>" class="absolute inset-0 z-1" aria-label="<?php echo esc_attr($data['items'][6]['title']); ?>"></a>
                        </div>
                        <div class="relative rounded-[8px] overflow-hidden bg-[#0a0d1e] h-[296px]">
                            <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/<?php echo esc_attr($data['items'][7]['image']); ?>"
                                class="absolute inset-0 w-full h-full object-cover" alt="">
                            <div class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-[rgba(26,26,26,0.8)] to-[rgba(26,26,26,0)] pt-8 pb-4 px-4">
                                <p class="text-white text-[20px] font-bold"><?php echo esc_html($data['items'][7]['title']); ?></p>
                            </div>
                            <a href="<?php echo esc_url($data['items'][7]['url']); ?>" class="absolute inset-0 z-1" aria-label="<?php echo esc_attr($data['items'][7]['title']); ?>"></a>
                        </div>
                    </div>
                </div>
                <div class="col col-8">
                    <div class="relative rounded-[8px] overflow-hidden bg-[#0a0d1e] h-full">
                        <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/<?php echo esc_attr($data['items'][8]['image']); ?>"
                            class="absolute inset-0 w-full h-full object-cover" alt="">
                        <div class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-[rgba(26,26,26,0.8)] to-[rgba(26,26,26,0)] pt-8 pb-4 px-4">
                            <p class="text-white text-[20px] font-bold"><?php echo esc_html($data['items'][8]['title']); ?></p>
                        </div>
                        <a href="<?php echo esc_url($data['items'][8]['url']); ?>" class="absolute inset-0 z-1" aria-label="<?php echo esc_attr($data['items'][8]['title']); ?>"></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>