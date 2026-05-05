<?php
defined('ABSPATH') || exit;

$hero_image_id = get_field('hero_image');
$hero_image    = $hero_image_id ? wp_get_attachment_image_url($hero_image_id, 'full') : '';
$hero_subtitle = get_field('hero_subtitle');
$hero_desc     = get_field('hero_desc');
?>

<section class="section-projects-hero relative flex flex-col justify-end">

    <!-- Content -->
    <div class="relative z-1 flex flex-col gap-2 items-center text-center mb-[-15%]">
        <div class="container">
            <h1 class="text-[48px] max-xl:text-[36px] max-md:text-[28px] font-black uppercase text-pri tracking-[-0.04em] leading-normal">
                <?php echo esc_html(get_the_title()); ?>
            </h1>
            <div class="flex flex-col">
                <?php if ($hero_subtitle) : ?>
                    <p class="font-bold text-[16px] max-md:text-[14px] text-sec leading-normal">
                        <?php echo esc_html($hero_subtitle); ?>
                    </p>
                <?php endif; ?>
                <?php if ($hero_desc) : ?>
                    <p class="text-[16px] max-md:text-[14px] text-pri leading-normal">
                        <?php echo esc_html($hero_desc); ?>
                    </p>
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