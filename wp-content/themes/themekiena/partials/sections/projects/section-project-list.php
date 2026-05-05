<?php

/**
 * Section: Danh sách dự án — trang chi tiết danh mục (taxonomy-project_category.php)
 *
 * Biến truyền vào:
 *   $args['term']      WP_Term  Term hiện tại
 *   $args['query']     WP_Query Query dự án
 */
defined('ABSPATH') || exit;

$term  = $args['term']  ?? null;
$query = $args['query'] ?? null;

if (!$term || !$query || !$query->have_posts()) return;
?>

<section class="section-project-list section-pd-t">

   <div class="container">

      <!-- Heading -->
      <div class="mb-8 max-xl:mb-5 max-md:mb-4 text-center">
         <h2 class="title-main">
            CÁC <span>DỰ ÁN</span>
         </h2>
      </div>

      <!-- Grid 2 cột -->
      <div class="flex flex-wrap gap-6 max-md:gap-4">
         <?php while ($query->have_posts()) : $query->the_post();
            $post_id     = get_the_ID();
            $image_id    = get_field('banner', $post_id);
            $location    = get_field('location', $post_id);
            $area        = get_field('area', $post_id);
            $scale_items = get_field('scale_items', $post_id) ?: [];
            $description = get_field('description', $post_id);
            $permalink   = get_permalink();
         ?>
            <a href="<?php echo esc_url($permalink); ?>"
               class="section-project-list__card group relative overflow-hidden rounded-[8px] bg-pri
                      w-[calc(50%-12px)] max-md:w-full h-[447px] max-xl:h-80 max-md:h-64 flex flex-col items-center justify-end">

               <!-- Image -->
               <?php if ($image_id) : ?>
                  <div class="absolute inset-0">
                     <?php echo mona_get_image_by_id($image_id, 'large', false, [
                        'class' => 'block w-full h-full object-cover transition-transform duration-500 group-hover:scale-105',
                     ]); ?>
                  </div>
               <?php endif; ?>

               <!-- Gradient overlay -->
               <div class="absolute inset-0 bg-gradient-to-t from-[#1a1a1a] via-[rgba(26,26,26,0.4)] to-[rgba(26,26,26,0.05)]"></div>

               <!-- Info overlay -->
               <div class="relative z-10 w-full p-4">

                  <!-- Title -->
                  <p class="text-[20px] max-md:text-[16px] font-bold text-white leading-[1.5] mb-2">
                     <?php the_title(); ?>
                  </p>

                  <div class="flex flex-col gap-1">

                     <!-- Location -->
                     <?php if ($location) : ?>
                        <div class="flex items-center gap-2">
                           <span class="shrink-0 w-4 h-4">
                              <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                                 <path d="M8 1.5C5.515 1.5 3.5 3.515 3.5 6c0 3.75 4.5 8.5 4.5 8.5S12.5 9.75 12.5 6C12.5 3.515 10.485 1.5 8 1.5Zm0 6.25A1.75 1.75 0 1 1 8 4.5a1.75 1.75 0 0 1 0 3.25Z" fill="white" />
                              </svg>
                           </span>
                           <p class="text-[14px] text-white leading-[1.5]">
                              <span class="font-bold">Vị trí:</span>
                              <span class="font-normal"> <?php echo esc_html($location); ?></span>
                           </p>
                        </div>
                     <?php endif; ?>

                     <!-- Area -->
                     <?php if ($area) : ?>
                        <div class="flex items-center gap-2">
                           <span class="shrink-0 w-4 h-4">
                              <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                                 <rect x="1.5" y="1.5" width="5" height="5" rx="0.5" stroke="white" stroke-width="1.5" />
                                 <rect x="9.5" y="1.5" width="5" height="5" rx="0.5" stroke="white" stroke-width="1.5" />
                                 <rect x="1.5" y="9.5" width="5" height="5" rx="0.5" stroke="white" stroke-width="1.5" />
                                 <rect x="9.5" y="9.5" width="5" height="5" rx="0.5" stroke="white" stroke-width="1.5" />
                              </svg>
                           </span>
                           <p class="text-[14px] text-white leading-[1.5]">
                              <span class="font-bold">Diện tích:</span>
                              <span class="font-normal"> <?php echo esc_html($area); ?></span>
                           </p>
                        </div>
                     <?php endif; ?>

                     <!-- Scale items -->
                     <?php if (!empty($scale_items)) : ?>
                        <div class="flex items-start gap-2">
                           <span class="shrink-0 w-4 h-4 mt-[3px]">
                              <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                                 <rect x="1.5" y="3" width="13" height="1.5" rx="0.75" fill="white" />
                                 <rect x="1.5" y="7.25" width="13" height="1.5" rx="0.75" fill="white" />
                                 <rect x="1.5" y="11.5" width="13" height="1.5" rx="0.75" fill="white" />
                              </svg>
                           </span>
                           <div>
                              <p class="text-[14px] font-bold text-white leading-[1.5]">Quy mô:</p>
                              <div class="flex flex-wrap gap-x-4 gap-y-0">
                                 <?php foreach ($scale_items as $scale) : ?>
                                    <p class="text-[14px] text-white leading-[1.5] list-item list-disc ml-4">
                                       <?php echo esc_html($scale['item']); ?>
                                    </p>
                                 <?php endforeach; ?>
                              </div>
                           </div>
                        </div>
                     <?php elseif ($description) : ?>
                        <p class="text-[14px] text-white leading-[1.5]">
                           <?php echo esc_html($description); ?>
                        </p>
                     <?php endif; ?>

                  </div>
               </div>

            </a>
         <?php endwhile;
         wp_reset_postdata(); ?>
      </div>

      <!-- Pagination / Load more -->
      <?php if ($query->max_num_pages > 1) : ?>
         <div class="flex justify-center mt-8 max-md:mt-6">
            <button class="btn btn-pri js-load-more-projects"
               data-page="1"
               data-term="<?php echo esc_attr($term->term_id); ?>">
               Xem thêm dự án
               <div class="w-4 h-4">
                  <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/ic-ar-pri.svg"
                     class="block w-full h-full object-contain invert" alt="">
               </div>
            </button>
         </div>
      <?php endif; ?>

   </div>

</section>