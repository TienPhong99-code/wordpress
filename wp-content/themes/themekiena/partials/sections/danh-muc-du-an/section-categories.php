<?php
defined('ABSPATH') || exit;

$terms = get_terms([
    'taxonomy'   => 'danh_muc_du_an',
    'hide_empty' => false,
    'orderby'    => 'term_order',
    'order'      => 'ASC',
]);

if (is_wp_error($terms) || empty($terms)) return;
?>

<section class="sec-du-an-categories section-pd-t section-pd-b">
    <div class="container">

        <!-- Title -->
        <div class="mb-8 max-xl:mb-5 max-md:mb-4 text-center">
            <h2 class="title-main">
                CÁC <span>DỰ ÁN</span>
            </h2>
        </div>

        <!-- 2x2 grid -->
        <div class="row">
            <?php foreach ($terms as $term) :
                $image_id = get_field('image', $term);
                $image    = $image_id ? wp_get_attachment_image_url($image_id, 'large') : '';
                $url      = get_term_link($term);
            ?>
                <div class="col col-6 max-md:w-full!">
                    <div class="relative flex flex-col gap-3 max-md:gap-2 items-center group">

                        <!-- Image -->
                        <div class="w-full aspect-4/3 rounded-lg overflow-hidden">
                            <?php if ($image) : ?>
                                <img src="<?php echo esc_url($image); ?>"
                                    alt="<?php echo esc_attr($term->name); ?>"
                                    loading="lazy"
                                    class="block w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <?php endif; ?>
                        </div>

                        <!-- Category name -->
                        <p class="font-bold text-[20px] max-xl:text-[18px] max-md:text-[16px] text-center leading-normal tracking-[-0.04em] text-pri transition-colors duration-300 group-hover:text-sec">
                            <?php echo esc_html($term->name); ?>
                        </p>

                        <a href="<?php echo esc_url($url); ?>" class="absolute inset-0 z-1" aria-label="<?php echo esc_attr($term->name); ?>"></a>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>