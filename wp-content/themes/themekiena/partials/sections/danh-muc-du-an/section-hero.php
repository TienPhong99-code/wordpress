<?php
defined('ABSPATH') || exit;

$hero_image_id  = get_field('hero_image');
$hero_image     = $hero_image_id ? wp_get_attachment_image_url($hero_image_id, 'full') : '';
$hero_content   = get_field('hero_content');
?>

<section class="section-projects-hero relative flex flex-col justify-end">

    <!-- Content -->
    <div class="relative z-1 flex flex-col gap-2 items-center text-center mb-[-15%]">
        <div class="container">
            <h1 class="text-[48px] max-xl:text-[36px] max-md:text-[28px] font-black uppercase text-pri tracking-[-0.04em] leading-normal">
                <?php echo esc_html(get_the_title()); ?>
            </h1>
            <div class="max-w-225 mx-auto text-center">
                <?php if ($hero_content) : ?>
                    <div class="text-[16px] max-md:text-[14px] flex flex-col gap-4 leading-normal wysiwyg-content">
                        <?php echo wp_kses_post($hero_content); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Background -->
    <?php if ($hero_image) : ?>
        <div class="relative">
            <img src="<?php echo esc_url($hero_image); ?>"
                alt="<?php echo esc_attr(get_the_title()); ?>"
                class="block w-full"
                loading="eager">
        </div>
    <?php endif; ?>

</section>