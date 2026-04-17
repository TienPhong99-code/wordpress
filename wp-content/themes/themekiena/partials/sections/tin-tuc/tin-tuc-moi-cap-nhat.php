<?php
$query = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 5,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

if (! $query->have_posts()) return;

$posts     = $query->posts;
$featured  = $posts[0];
$secondary = array_slice($posts, 1, 4);

/**
 * Trả về thời gian tương đối: "5 phút trước", "2 giờ trước"...
 */
function kiena_time_ago(int $post_id): string
{
    return human_time_diff(get_the_time('U', $post_id), current_time('timestamp')) . ' trước';
}
?>

<section class="tin-tuc-moi-cap-nhat relative pt-(--pd-sc) pb-(--pd-sc)">

    <div class="container">

        <h2 class="title-main text-center mb-16">
            Tin tức <span>mới cập nhật</span>
        </h2>

        <div class="relative">
            <div class="row items-start">

                <!-- Featured post (lớn, trái) -->
                <div class="col col-8">
                    <div class="relative group">
                        <!-- Ảnh -->
                        <div class="relative rounded-[8px] overflow-hidden bg-pri aspect-4/3">
                            <?php if (has_post_thumbnail($featured->ID)) : ?>
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url($featured->ID, 'large')); ?>"
                                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="">
                            <?php endif; ?>
                        </div>
                        <!-- Meta -->
                        <div class="flex flex-col gap-2 mt-4">
                            <p class="text-pri text-[28px] font-bold group-hover:text-sec transition-colors">
                                <?php echo esc_html(get_the_title($featured->ID)); ?>
                            </p>
                            <p class="text-pri text-[14px]">
                                <?php echo esc_html(get_the_excerpt($featured->ID)); ?>
                            </p>
                            <p class="text-[#ababab] text-[12px]">
                                <?php echo kiena_time_ago($featured->ID); ?>
                            </p>
                        </div>
                        <a href="<?php echo esc_url(get_permalink($featured->ID)); ?>"
                            class="absolute inset-0 z-1"
                            aria-label="<?php echo esc_attr(get_the_title($featured->ID)); ?>"></a>
                    </div>
                </div>

                <!-- 2×2 grid (phải) -->
                <div class="col col-4">
                    <div class="relative">
                        <div class="row">
                            <?php foreach ($secondary as $post) : ?>
                                <div class="col col-6">
                                    <div class="relative group mb-4">
                                        <!-- Ảnh -->
                                        <div class="relative rounded-[5px] overflow-hidden bg-pri aspect-600/389">
                                            <?php if (has_post_thumbnail($post->ID)) : ?>
                                                <img src="<?php echo esc_url(get_the_post_thumbnail_url($post->ID, 'medium')); ?>"
                                                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="">
                                            <?php endif; ?>
                                        </div>
                                        <!-- Meta -->
                                        <div class="flex flex-col gap-2 mt-3">
                                            <p class="text-pri text-[16px] font-bold group-hover:text-sec transition-colors line-clamp-2">
                                                <?php echo esc_html(get_the_title($post->ID)); ?>
                                            </p>
                                            <p class="text-pri text-[14px] line-clamp-2">
                                                <?php echo esc_html(get_the_excerpt($post->ID)); ?>
                                            </p>
                                            <p class="text-[#ababab] text-[12px]">
                                                <?php echo kiena_time_ago($post->ID); ?>
                                            </p>
                                        </div>
                                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"
                                            class="absolute inset-0 z-1"
                                            aria-label="<?php echo esc_attr(get_the_title($post->ID)); ?>"></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</section>
<?php wp_reset_postdata(); ?>