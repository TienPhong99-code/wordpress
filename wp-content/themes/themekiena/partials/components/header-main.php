<?php

/**
 * Header Main Component
 * Design: KienA Figma — Node 94:28119
 */

defined('ABSPATH') || exit;

// =============================================
// SAMPLE DATA — dev tự kết nối menu WP sau
// =============================================
$nav_items = [
   ['label' => 'Trang chủ',           'url' => home_url('/'), 'active' => true],
   ['label' => 'Về Kiến Á',           'url' => '#',           'active' => false],
   ['label' => 'Lĩnh vực hoạt động',  'url' => '#',           'active' => false],
   ['label' => 'Dự án',               'url' => '#',           'active' => false],
   ['label' => 'Tin tức',             'url' => '#',           'active' => false],
   ['label' => 'Liên hệ',             'url' => '#',           'active' => false],
];

$lang_vi = home_url('/');
$lang_en = '#';
?>

<!-- =============================================
     HEADER BAR
     ============================================= -->
<header class="hd<?php echo is_front_page() ? ' hd-home' : ''; ?>">

   <div class="h-full flex items-center justify-between px-4 xl:px-8 relative">

      <!-- Logo -->
      <a href="<?php echo esc_url(home_url('/')); ?>" class="block shrink-0 hd-logo">
         <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/header-logo.png"
            class="block w-full object-contain" alt="KIENA">
      </a>

      <!-- Right: Language + Menu button -->
      <div class="flex items-center gap-8 max-xl:gap-5">

         <!-- Language switcher -->
         <div class="flex items-center gap-2 hd-lang">
            <a href="<?php echo esc_url($lang_vi); ?>" class="font-bold text-[14px] max-xl:text-[12px] lang-active uppercase">VI</a>
            <span class="block w-px h-4 bg-white/40"></span>
            <a href="<?php echo esc_url($lang_en); ?>" class="font-bold text-[14px] max-xl:text-[12px] uppercase">EN</a>
         </div>

         <!-- Menu open button -->
         <button class="js-nav-open flex items-center gap-3 max-xl:gap-2 cursor-pointer hd-menu" type="button" aria-label="Mở menu">
            <span class="font-bold text-[14px] max-xl:text-[12px] uppercase">MENU</span>
            <div class="rounded-lg px-3 py-2 max-xl:px-2 max-xl:py-1.5 flex items-center justify-center hd-burger">
               <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/ic-hamburger.png"
                  class="block w-6 h-6 max-xl:w-5 max-xl:h-5 object-contain" alt="">
            </div>
         </button>

      </div>
   </div>
</header>

<!-- =============================================
     FULL-SCREEN NAV OVERLAY
     ============================================= -->
<div class="hd-nav" id="hd-nav" aria-hidden="true">

   <!-- Background -->
   <span class="absolute inset-0 bg-pri z-[-1]"></span>

   <!-- Top bar: Logo trái + Đóng phải -->
   <div class="absolute top-0 left-0 right-0 h-(--size-hd) flex items-center px-8 max-md:px-4">
      <div class="flex items-center justify-between w-full">

         <!-- Logo trắng trong overlay -->
         <a href="<?php echo esc_url(home_url('/')); ?>" class="block shrink-0 hd-logo brightness-0 invert">
            <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/header-logo.png"
               class="block w-full object-contain" alt="KIENA">
         </a>

         <!-- Close button -->
         <button class="js-nav-close flex items-center gap-3 max-md:gap-2 cursor-pointer" type="button" aria-label="Đóng menu">
            <span class="font-bold text-[14px] max-md:text-[12px] text-white uppercase">ĐÓNG</span>
            <div class="border border-white rounded-lg px-3 py-2 max-md:px-2 max-md:py-1.5 flex items-center justify-center">
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="max-md:w-5 max-md:h-5">
                  <line x1="4" y1="4" x2="20" y2="20" stroke="white" stroke-width="2" stroke-linecap="round" />
                  <line x1="20" y1="4" x2="4" y2="20" stroke="white" stroke-width="2" stroke-linecap="round" />
               </svg>
            </div>
         </button>
      </div>
   </div>

   <!-- Menu items — center -->
   <nav class="flex flex-col items-center gap-4 max-md:gap-3 max-sm:gap-2">
      <?php foreach ($nav_items as $item) : ?>
         <a href="<?php echo esc_url($item['url']); ?>"
            class="hd-nav-item font-bold text-[48px] max-xl:text-[36px] max-md:text-[28px] max-sm:text-[22px] uppercase<?php echo $item['active'] ? ' text-[#f4de96]' : ' text-white hover:text-[#f4de96]'; ?> transition-colors">
            <?php echo esc_html($item['label']); ?>
         </a>
      <?php endforeach; ?>
   </nav>

</div>