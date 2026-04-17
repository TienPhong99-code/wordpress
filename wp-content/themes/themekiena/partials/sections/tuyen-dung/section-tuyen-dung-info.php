<?php
$sample = [
    'title'      => 'Môi trường làm việc',
    'title_span' => 'tại KIẾN Á',
    'items'      => [
        [
            'number' => '01',
            'title'  => 'Không gian khai phóng sáng tạo',
            'desc'   => 'Môi trường hiện đại, nơi mỗi ý tưởng khác biệt đều được lắng nghe và tôn trọng',
            'image'  => 'tuyen-dung/td-img-1.png',
        ],
        [
            'number' => '02',
            'title'  => 'Lộ trình thăng tiến không giới hạn',
            'desc'   => 'Đầu tư toàn diện vào năng lực cá nhân thông qua đào tạo chuyên sâu và văn hóa kế thừa',
            'image'  => 'tuyen-dung/td-img-2.png',
        ],
        [
            'number' => '03',
            'title'  => 'Hệ sinh thái phúc lợi chuẩn mực',
            'desc'   => 'Lương thưởng cạnh tranh, bảo hiểm, du lịch công ty',
            'image'  => 'tuyen-dung/td-img-3.png',
        ],
        [
            'number' => '04',
            'title'  => 'Di sản nhân văn',
            'desc'   => 'Tự hào làm việc tại đơn vị luôn đặt con người làm tâm điểm trong mọi chiến lược phát triển',
            'image'  => 'tuyen-dung/td-img-4.png',
        ],
    ],
];
$data = $sample;
?>

<section class="section-tuyen-dung-info relative py-(--pd-sc)">
    <div class="container">

        <!-- Tiêu đề -->
        <h2 class="title-main text-center mb-16 max-md:mb-10">
            <?php echo esc_html($data['title']); ?> <br> <span><?php echo esc_html($data['title_span']); ?></span>
        </h2>

        <!-- Danh sách items -->
        <div class="flex flex-col gap-16 max-md:gap-10">
            <?php foreach ($data['items'] as $item) : ?>
                <div class="row items-center">

                    <!-- Text: số + tiêu đề + mô tả -->
                    <div class="col col-6 max-md:col-12">
                        <div class="flex flex-col gap-2 text-pri">
                            <p class="text-[120px] max-xl:text-[80px] max-md:text-[60px] font-black leading-none tracking-tight uppercase">
                                <?php echo esc_html($item['number']); ?>
                            </p>
                            <div class="flex flex-col gap-2">
                                <p class="text-[36px] max-xl:text-[28px] max-md:text-[22px] font-bold leading-normal">
                                    <?php echo esc_html($item['title']); ?>
                                </p>
                                <p class="text-[16px] max-md:text-[14px] leading-normal">
                                    <?php echo esc_html($item['desc']); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Ảnh -->
                    <div class="col col-6 max-md:w-full!">
                        <div class="relative rounded-lg overflow-hidden bg-pri aspect-500/380">
                            <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/<?php echo esc_attr($item['image']); ?>"
                                class="w-full h-full block object-cover" alt="">
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>