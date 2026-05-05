<?php
defined('ABSPATH') || exit;

$term       = get_queried_object();
$image_id   = get_field('hero_image', $term);
$hero_image = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';
$hero_desc  = get_field('hero_desc', $term) ?: [];
?>

<section class="section-projects-hero relative flex flex-col justify-end overflow-hidden">

    <!-- Content -->
    <div class="relative z-1 flex flex-col gap-4 items-center mb-[-8%]">
        <div class="container text-center">
            <h1 class="text-[48px] max-xl:text-[36px] max-md:text-[28px] font-black uppercase text-pri tracking-[-0.04em] leading-normal mb-4 max-md:mb-3">
                <?php echo esc_html($term->name); ?>
            </h1>
            <?php if ($hero_desc) : ?>
                <div class="flex project-desc flex-col gap-3 max-md:gap-2 text-[16px] max-md:text-[14px] text-pri max-w-170 mx-auto">
                    <?php foreach ($hero_desc as $row) : ?>
                        <p><?php echo wp_kses_post($row['paragraph']); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Background -->
    <?php if ($hero_image) : ?>
        <div class="relative">

            <img src="<?php echo esc_url($hero_image); ?>"
                alt="<?php echo esc_attr($term->name); ?>"
                class="block w-full"
                loading="eager">
        </div>
    <?php endif; ?>

</section>