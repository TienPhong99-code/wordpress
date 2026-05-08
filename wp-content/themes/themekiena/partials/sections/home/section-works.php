<?php
defined('ABSPATH') || exit;

$is_about = is_page_template('page-template/template-about.php');

if ($is_about) {
   $items = get_terms([
      'taxonomy'   => 'danh_muc_du_an',
      'hide_empty' => false,
      'orderby'    => 'meta_value_num',
      'meta_key'   => 'order',
      'order'      => 'ASC',
   ]);
   if (empty($items) || is_wp_error($items)) return;
} else {
   $items = get_field('works', get_option('page_on_front')) ?: [];
   if (empty($items)) return;
}
?>
<section class="sec-works section-pd relative">

   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home/dcor-work.png" alt="Works background" class="block w-[80%] absolute left-1/2 top-8 -translate-x-1/2 z-[-1]">

   <div class="container">
      <div class="relative">
         <div class="mb-6 max-xl:mb-4 max-md:mb-3 text-center">
            <h2 class="title-main text-center">
               LĨNH VỰC <span>TIÊN PHONG</span>
            </h2>
            <?php if ($is_about) : ?>
               <div class="max-w-151.75 mx-auto mona-content">
                  <p>
                     Từ bất động sản, giáo dục đến xây dựng và dịch vụ, mỗi lĩnh vực đảm nhận một vai trò khác nhau, nhưng
                     cùng hướng đến một điểm chung <br class="max-md:hidden"> kiến tạo nên những đô thị hiện đại, nơi con người có thể sống,<br class="max-md:hidden"> phát triển
                     và gắn bó lâu dài.
                  </p>
               </div>
            <?php else : ?>
               <p class="mt-2">Kiến tạo giá trị bền vững từ con người đến không gian sống</p>
            <?php endif; ?>
         </div>
         <div class="relative">
            <div class="row">
               <?php foreach ($items as $item) : ?>
                  <?php
                  if ($is_about) {
                     $image_id = get_field('image', $item);
                     $title    = $item->name;
                     $link     = get_term_link($item);
                  } else {
                     $image_id = $item['image'];
                     $title    = $item['title'];
                     $link     = !empty($item['category']) ? get_term_link((int) $item['category'], 'danh_muc_du_an') : '';
                  }
                  ?>
                  <div class="col col-6 max-md:w-full!">
                     <div class="flex flex-col gap-4 max-xl:gap-3 max-md:gap-2 items-center relative group">
                        <a href="<?php echo esc_url($link); ?>" class="absolute inset-0 z-1"></a>
                        <div class="w-full aspect-600/389 rounded-lg overflow-hidden">
                           <?php echo mona_get_image_by_id($image_id, 'large', false, [
                              'class'   => 'block w-full h-full object-cover',
                              'alt'     => esc_attr($title),
                              'loading' => 'lazy',
                           ]); ?>
                        </div>
                        <p class="font-bold text-[28px] max-xl:text-[22px] text-center px-2 text-pri group-hover:text-[#ED1C24] transition-colors duration-300">
                           <?php echo esc_html($title); ?>
                        </p>
                     </div>
                  </div>
               <?php endforeach; ?>
            </div>
         </div>
      </div>
   </div>
</section>