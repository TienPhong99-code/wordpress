<?php
$paged     = max(1, get_query_var('paged'));
$main_query = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 8,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'paged'          => $paged,
]);

$hot_query = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 5,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

if (! function_exists('kiena_time_ago')) {
    function kiena_time_ago(int $post_id): string
    {
        return human_time_diff(get_the_time('U', $post_id), current_time('timestamp')) . ' trước';
    }
}
?>

<section class="tat-ca-tin-tuc relative py-(--pd-sc)">
    <span class="absolute inset-0 bg-[#f4f5f8] z-[-1]"></span>

    <div class="container">
        <div class="relative">
            <div class="row items-start">

                <!-- ── Main: danh sách tất cả tin tức ── -->
                <div class="col col-8">

                    <h2 class="title-main mb-8">
                        Tất cả <span>Tin tức</span>
                    </h2>

                    <?php if ($main_query->have_posts()) : ?>

                        <div class="relative">
                            <div class="row">
                                <?php while ($main_query->have_posts()) : $main_query->the_post(); ?>
                                    <div class="col col-6">
                                        <div class="relative group mb-8">
                                            <!-- Ảnh -->
                                            <div class="relative rounded-[8px] overflow-hidden bg-pri aspect-600/389">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'medium_large')); ?>"
                                                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="">
                                                <?php endif; ?>
                                            </div>
                                            <!-- Meta -->
                                            <div class="flex flex-col gap-3 mt-3">
                                                <p class="text-pri text-[20px] font-bold group-hover:text-sec transition-colors line-clamp-2">
                                                    <?php the_title(); ?>
                                                </p>
                                                <p class="text-pri text-[14px] line-clamp-2">
                                                    <?php echo esc_html(get_the_excerpt()); ?>
                                                </p>
                                                <p class="text-[#ababab] text-[12px]">
                                                    <?php echo kiena_time_ago(get_the_ID()); ?>
                                                </p>
                                            </div>
                                            <a href="<?php the_permalink(); ?>"
                                                class="absolute inset-0 z-1"
                                                aria-label="<?php the_title_attribute(); ?>"></a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <?php
                        $pagination = mona_pagination_links($main_query, false, [
                            'prev_text' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>',
                            'next_text' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>',
                        ]);
                        if ($pagination) : ?>
                            <div class="pagination-tin-tuc">
                                <?php echo $pagination; ?>
                            </div>
                        <?php endif; ?>

                    <?php else : ?>
                        <p class="text-pri text-[16px]">Chưa có tin tức nào.</p>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                </div>

                <!-- ── Sidebar: Tin hot trong ngày ── -->
                <div class="col col-4">
                    <p class="text-pri text-[20px] font-bold mb-4">Tin hot trong ngày</p>

                    <?php if ($hot_query->have_posts()) : ?>
                        <div class="flex flex-col gap-4">
                            <?php while ($hot_query->have_posts()) : $hot_query->the_post(); ?>
                                <div class="relative group flex gap-3 items-center">
                                    <!-- Thumbnail -->
                                    <div class="relative rounded-[8px] overflow-hidden bg-pri shrink-0 w-[148px] h-[96px]">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'thumbnail')); ?>"
                                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <!-- Meta -->
                                    <div class="flex flex-col gap-2 flex-1 min-w-0">
                                        <p class="text-pri text-[16px] font-bold group-hover:text-sec transition-colors line-clamp-3">
                                            <?php the_title(); ?>
                                        </p>
                                        <p class="text-[#ababab] text-[12px]">
                                            <?php echo kiena_time_ago(get_the_ID()); ?>
                                        </p>
                                    </div>
                                    <a href="<?php the_permalink(); ?>"
                                        class="absolute inset-0 z-1"
                                        aria-label="<?php the_title_attribute(); ?>"></a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                </div>

            </div>
        </div>
    </div>

</section>