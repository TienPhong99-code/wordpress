<?php
$title_1 = get_field('news_title_1') ?: 'Tin tức';
$title_2 = get_field('news_title_2') ?: 'mới cập nhật';

$query = new WP_Query([
   'post_type'      => 'post',
   'post_status'    => 'publish',
   'posts_per_page' => 6,
   'orderby'        => 'date',
   'order'          => 'DESC',
]);

if (! $query->have_posts()) return;
?>

<section class="section-news relative section-pd">
   <div class="container relative">

      <!-- Title -->
      <div class="text-center mb-8 max-xl:mb-5 max-md:mb-4">
         <h2 class="title-main">
            <?php echo esc_html($title_1); ?> <span><?php echo esc_html($title_2); ?></span>
         </h2>
      </div>

      <!-- News grid -->
      <div class="relative">
         <div class="row">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
               <div class="col col-6 max-md:w-full! mb-6 max-xl:mb-4 max-md:mb-3">
                  <?php get_template_part('partials/components/card-tin-tuc', null, ['post_id' => get_the_ID(), 'layout' => 'horizontal']); ?>
               </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
         </div>
      </div>

   </div>
</section>