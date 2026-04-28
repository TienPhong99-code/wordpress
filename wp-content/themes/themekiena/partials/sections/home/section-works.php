<?php
defined('ABSPATH') || exit;

$items = get_field('works', get_option('page_on_front')) ?: [];

if (empty($items)) return;
?>
<section class="sec-works section-pd relative">

   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home/dcor-work.png" alt="Works background" class="block w-[80%] absolute left-1/2 top-8 -translate-x-1/2 z-[-1]">

   <div class="container">
      <div class="relative">
         <h2 class="title-main text-center mb-6 max-xl:mb-4 max-md:mb-3">
            LĨNH VỰC <span>HOẠT ĐỘNG</span>
         </h2>
         <div class="relative">
            <div class="row">
               <?php foreach ($items as $item) : ?>
                  <div class="col col-6 max-md:w-full!">
                     <div class="flex flex-col gap-4 max-xl:gap-3 max-md:gap-2 items-center relative group">
                        <a href="<?php echo esc_url(!empty($item['category']) ? get_term_link((int) $item['category'], 'danh_muc_du_an') : ''); ?>" class="absolute inset-0 z-1"></a>
                        <div class="w-full aspect-600/389 rounded-lg overflow-hidden">
                           <?php echo mona_get_image_by_id($item['image'], 'large', false, [
                              'class'   => 'block w-full h-full object-cover',
                              'alt'     => esc_attr($item['title']),
                              'loading' => 'lazy',
                           ]); ?>
                        </div>
                        <p class="font-bold text-[28px] max-xl:text-[22px] text-center px-2 text-pri group-hover:text-sec transition-colors duration-300">
                           <?php echo esc_html($item['title']); ?>
                        </p>
                     </div>
                  </div>
               <?php endforeach; ?>
            </div>
         </div>
      </div>
   </div>
</section>