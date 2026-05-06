<?php
$title    = 'Liên hệ';
$title_em = 'chúng tôi';
$company = get_field('footer_company', 'option') ?: [];
$phone   = $company['hotline'] ?? '';
$email   = $company['email']   ?? '';
$address = $company['address'] ?? '';

$socials = get_field('footer_socials', 'option') ?: [];
?>

<section class="sec-lien-he relative py-20">


    <div class="container">
        <div class="text-center mb-10">
            <h2 class="title-main"><?php echo esc_html($title); ?> <span><?php echo esc_html($title_em); ?></span></h2>
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
                                <?php if ($phone) : ?>
                                    <div class="flex gap-2 items-center">
                                        <div class="w-4 h-4 shrink-0">
                                            <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/ic-phone.svg"
                                                class="block w-full h-full object-contain" alt="">
                                        </div>
                                        <p class="text-white font-bold text-[16px]"><?php echo esc_html($phone); ?></p>
                                    </div>
                                <?php endif; ?>
                                <?php if ($address) : ?>
                                    <div class="flex gap-2 items-start">
                                        <div class="w-4 h-4 shrink-0 mt-1">
                                            <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/ic-location.svg"
                                                class="block w-full h-full object-contain" alt="">
                                        </div>
                                        <p class="text-white text-[16px]"><?php echo wp_kses_post($address); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if (! empty($socials)) : ?>
                                <div class="flex gap-2 items-center">
                                    <?php foreach ($socials as $social) : ?>
                                        <a href="<?php echo esc_url($social['url'] ?? '#'); ?>"
                                            class="block w-6 h-6 icon-link"
                                            aria-label="<?php echo esc_attr($social['label'] ?? ''); ?>">
                                            <?php echo mona_get_image_by_id($social['icon'], 'full', false, ['class' => 'block w-full h-full object-contain', 'alt' => esc_attr($social['label'] ?? '')]); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col col-7 max-md:w-full!">
                    <div class="cf7-lien-he">
                        <?php echo do_shortcode('[contact-form-7 id="lien-he" title="Liên hệ"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>