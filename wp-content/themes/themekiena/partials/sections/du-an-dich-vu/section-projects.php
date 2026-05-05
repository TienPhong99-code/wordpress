<?php
defined('ABSPATH') || exit;

$projects = get_posts([
    'post_type'      => 'du_an',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
    'tax_query'      => [[
        'taxonomy' => 'danh_muc_du_an',
        'field'    => 'slug',
        'terms'    => 'dich-vu',
    ]],
]);
?>

<section class="sec-dich-vu-projects section-pd-t section-pd-b">
    <div class="container">

        <!-- Title -->
        <div class="mb-8 max-xl:mb-5 max-md:mb-4 text-center">
            <h2 class="title-main">
                CÁC <span>DỰ ÁN</span>
            </h2>
        </div>

        <!-- 2x2 grid -->
        <div class="relative">
            <div class="row">
                <?php foreach ($projects as $project) :
                    $image_id = get_field('image', $project->ID);
                    $image    = $image_id ? wp_get_attachment_image_url($image_id, 'large') : get_the_post_thumbnail_url($project->ID, 'large');
                    $url      = get_field('url', $project->ID) ?: '#';
                    ?>
                    <div class="col col-6 max-md:w-full!">
                        <div class="relative flex flex-col gap-3 max-md:gap-2 group">

                            <!-- Image -->
                            <div class="w-full aspect-4/3 rounded-lg overflow-hidden bg-pri">
                                <?php if ($image) : ?>
                                    <img src="<?php echo esc_url($image); ?>"
                                        alt="<?php echo esc_attr($project->post_title); ?>"
                                        loading="lazy"
                                        class="block w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <?php endif; ?>
                            </div>

                            <!-- Project name -->
                            <p class="font-bold text-[20px] max-xl:text-[18px] max-md:text-[16px] text-center leading-normal text-pri transition-colors duration-300 group-hover:text-sec">
                                <?php echo esc_html($project->post_title); ?>
                            </p>

                            <a href="<?php echo esc_url($url); ?>" class="absolute inset-0 z-1" aria-label="<?php echo esc_attr($project->post_title); ?>"></a>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>
