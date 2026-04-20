<?php
// =============================================
// SAMPLE DATA — dev tự kết nối ACF sau
// =============================================
$sample = [
    'title'    => 'Liên hệ',
    'title_em' => 'chúng tôi',
    'subtitle' => 'Hãy kết nối ngay với chúng tôi nếu bạn có câu hỏi hoặc muốn hợp tác',
    'phone'    => '028 3911 6599',
    'email'    => 'info@kiena.vn',
    'address'  => 'Phòng 311A-312 & 301 Tầng 3, Tòa nhà Saigon Trade Center, Số 37 Đường Tôn Đức Thắng, Phường Sài Gòn, Thành phố Hồ Chí Minh, Việt Nam',
    'socials'  => [
        ['icon' => 'ic-facebook.svg', 'url' => '#', 'label' => 'Facebook'],
        ['icon' => 'ic-linkedin.svg', 'url' => '#', 'label' => 'LinkedIn'],
        ['icon' => 'ic-youtube.svg', 'url' => '#', 'label' => 'YouTube'],
    ],
    'cf7_shortcode' => '[contact-form-7 id="lien-he" title="Liên hệ"]',
];
$data = $sample;
?>

<section class="sec-lien-he relative py-20">
    <span class="absolute inset-0 bg-[#f5f7fb] z-[-1]"></span>

    <div class="container">
        <div class="text-center mb-10">
            <h2 class="title-main"><?php echo esc_html($data['title']); ?> <span><?php echo esc_html($data['title_em']); ?></span></h2>
            <p class="text-pri text-[16px] mt-2"><?php echo esc_html($data['subtitle']); ?></p>
        </div>

        <div class="bg-white rounded-2xl overflow-hidden pl-2 md:pr-8 pr-2 py-2 relative">
            <div class="row">
                <div class="col col-5 max-md:w-full!">
                    <div class="relative overflow-hidden rounded-lg h-[491px]">
                        <div class="absolute inset-0">
                            <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/lien-he/lien-he-img-1.png"
                                class="block w-full h-full object-cover" alt="">
                        </div>
                        <div class="absolute inset-0 bg-pri mix-blend-multiply"></div>
                        <div class="absolute inset-0 flex flex-col justify-between p-6">
                            <div class="flex flex-col gap-2">
                                <div class="flex gap-2 items-center">
                                    <div class="w-4 h-4 shrink-0">
                                        <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/ic-phone.svg"
                                            class="block w-full h-full object-contain" alt="">
                                    </div>
                                    <p class="text-white font-bold text-[16px]"><?php echo esc_html($data['phone']); ?></p>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <div class="w-4 h-4 shrink-0">
                                        <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/ic-email.svg"
                                            class="block w-full h-full object-contain" alt="">
                                    </div>
                                    <p class="text-white font-bold text-[16px]"><?php echo esc_html($data['email']); ?></p>
                                </div>
                                <div class="flex gap-2 items-start">
                                    <div class="w-4 h-4 shrink-0 mt-1">
                                        <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/ic-location.svg"
                                            class="block w-full h-full object-contain" alt="">
                                    </div>
                                    <p class="text-white text-[16px]"><?php echo esc_html($data['address']); ?></p>
                                </div>
                            </div>
                            <div class="flex gap-2 items-center">
                                <?php foreach ($data['socials'] as $social) : ?>
                                    <div class="w-6 h-6">
                                        <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/<?php echo esc_attr($social['icon']); ?>"
                                            class="block w-full h-full object-contain" alt="<?php echo esc_attr($social['label']); ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-7 max-md:w-full!">
                    <div class="cf7-lien-he">
                        <?php echo do_shortcode($data['cf7_shortcode']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>