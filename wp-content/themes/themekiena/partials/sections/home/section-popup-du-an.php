<?php
defined('ABSPATH') || exit;

$page_id       = MONA_PAGE_HOME;
$popup_show    = get_field('popup_show', $page_id);
$popup_title_1 = get_field('popup_title_1', $page_id) ?: '';
$popup_title_2 = get_field('popup_title_2', $page_id) ?: '';
$popup_image   = get_field('popup_image', $page_id);
$popup_link    = get_field('popup_link', $page_id);

if (!$popup_show || (!$popup_title_1 && !$popup_title_2 && !$popup_image)) return;

$img_src = $popup_image ? wp_get_attachment_image_url($popup_image, 'large') : '';
$btn_url = !empty($popup_link['url']) ? $popup_link['url'] : '';
$btn_target = !empty($popup_link['target']) ? $popup_link['target'] : '_self';
?>

<div data-modal="popup-du-an" class="fixed inset-0 z-[999] flex items-center justify-center p-4 transition-opacity duration-300">
   <div class="modal-box relative bg-white rounded-2xl overflow-hidden flex max-w-200 w-full max-h-[90vh] shadow-2xl">

      <!-- Nút đóng — luôn hiển thị -->
      <button type="button"
         class="absolute top-3 right-3 z-10 w-8 h-8 flex items-center justify-center rounded-full bg-black/10 hover:bg-black/20 transition-colors cusror-pointer"
         data-modal-close aria-label="Đóng">
         <span class="w-3 h-3">
            <img src="<?php echo esc_url(MONA_THEME_PATH_URI); ?>/assets/images/icons/ic-close.svg"
               class="block w-full h-full object-contain" alt="">
         </span>
      </button>

      <!-- Left: nội dung -->
      <div class="row max-md:flex-col-reverse">
         <div class="col col-5 max-md:w-full!">
            <div class="flex flex-col gap-4 justify-center px-8 py-6 flex-1 min-w-0 max-md:p-4!">

               <div class="h-10 shrink-0 max-md:h-5.5! max-md:w-20">
                  <img src="<?php echo esc_url(MONA_THEME_PATH_URI); ?>/assets/images/icons/header-logo.svg"
                     class="block h-full object-contain max-md:w-full" alt="KienA">
               </div>

               <?php if ($popup_title_1 || $popup_title_2) : ?>
                  <h3 class="font-bold text-[#283377] text-[28px] max-md:text-[20px]">
                     <?php if ($popup_title_1) : ?>
                        <?php echo esc_html($popup_title_1); ?>&nbsp;
                     <?php endif; ?>
                     <?php if ($popup_title_2) : ?>
                        <span class="text-[#ed1c24]"><?php echo esc_html($popup_title_2); ?></span>
                     <?php endif; ?>
                  </h3>
               <?php endif; ?>

               <?php if ($btn_url) : ?>
                  <a href="<?php echo esc_url($btn_url); ?>"
                     target="<?php echo esc_attr($btn_target); ?>"
                     class="inline-flex items-center gap-2 border border-[#e7e7e9] rounded-lg px-5 py-2.5 font-bold text-[#283377] text-[16px] tracking-[-0.04em] hover:border-[#283377] transition-colors self-start"
                     data-modal-close>
                     <span>Chi tiết dự án</span>
                     <span class="w-4 h-4 shrink-0">
                        <img src="<?php echo esc_url(MONA_THEME_PATH_URI); ?>/assets/images/icons/ic-ar-pri.svg"
                           class="block w-full h-full object-contain" alt="">
                     </span>
                  </a>
               <?php endif; ?>

            </div>
         </div>

         <!-- Right: ảnh dự án -->
         <?php if ($img_src) : ?>
            <div class="col col-7 max-md:w-full!">
               <div class="relative h-full max-md:w-full">
                  <img src="<?php echo esc_url($img_src); ?>"
                     class="block w-full h-full object-cover"
                     alt="<?php echo esc_attr(trim($popup_title_1 . ' ' . $popup_title_2)); ?>">
               </div>
            </div>
         <?php endif; ?>

      </div>
   </div>
</div>