<?php
$title      = get_field('title')      ?: 'Hoạt động';
$title_span = get_field('title_span') ?: 'cộng đồng';
$description = get_field('description');
$image_id   = get_field('image');
$image_url  = $image_id ? wp_get_attachment_image_url($image_id, 'full') : MONA_THEME_PATH_URI . '/assets/images/hoat-dong-cong-dong/about-hoat-dong-img-1.png';
?>

<section class="section-about-hoat-dong relative pt-(--pd-sc) pb-0">

    <div class="container">
        <div class="text-center relative z-1">
            <h2 class="title-main">
                <?php echo esc_html($title); ?> <span><?php echo esc_html($title_span); ?></span>
            </h2>

            <?php if ($description) : ?>
                <div class="max-w-148 mx-auto mt-4 text-[16px] text-pri">
                    <div class="mona-content">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="w-full mt-4">
        <img
            src="<?php echo esc_url($image_url); ?>"
            class="block w-full"
            alt="">
    </div>

</section>