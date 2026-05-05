<?php

/**
 * Section: Grid 4 danh mục dự án — trang Dự án
 * Lấy các term của taxonomy project_category, mỗi term có ACF: image
 */
defined('ABSPATH') || exit;

$terms = get_terms([
   'taxonomy'   => 'project_category',
   'hide_empty' => false,
   'orderby'    => 'menu_order',
   'order'      => 'ASC',
]);

if (is_wp_error($terms) || empty($terms)) return;
?>

<section class="section-project-categories section-pd">

   <div class="container">

      <div class="relative">

         <h2 class="title-main text-center mb-6 max-xl:mb-4 max-md:mb-3">
            CÁC <span>DỰ ÁN</span>
         </h2>

         <div class="relative">
            <div class="row">
               <?php foreach ($terms as $term) :
                  $term_link = get_term_link($term);
                  $image_id  = get_field('image', 'project_category_' . $term->term_id);
               ?>
                  <div class="col col-6 max-md:w-full!">
                     <div class="section-project-categories__item group relative">
                        <a class="absolute inset-0 z-1" href="<?php echo esc_url($term_link); ?>"></a>
                        <div class="flex flex-col gap-4 max-xl:gap-3 max-md:gap-2 items-center">

                           <div class="w-full aspect-4/3 rounded-lg overflow-hidden">
                              <?php echo mona_get_image_by_id($image_id, 'large', false, [
                                 'class'   => 'block w-full h-full object-cover',
                                 'alt'     => esc_attr($term->name),
                                 'loading' => 'lazy',
                              ]); ?>
                           </div>

                           <p class="font-bold text-[20px] max-xl:text-[18px] max-md:text-[16px] text-center px-2 text-pri">
                              <?php echo esc_html($term->name); ?>
                           </p>

                        </div>
                     </div>
                  </div>
               <?php endforeach; ?>
            </div>
         </div>

      </div>

   </div>

</section>