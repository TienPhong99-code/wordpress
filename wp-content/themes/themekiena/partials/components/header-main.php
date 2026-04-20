<?php

/**
 * Header Main Component
 * Design: KienA Figma — Node 94:28119
 */

defined('ABSPATH') || exit;

$lang_vi = home_url('/');
$lang_en = '#';
?>

<!-- =============================================
     HEADER
     ============================================= -->
<header class="hd <?php echo is_front_page() ? ' hd-home' : ''; ?>">

   <div class="h-full flex items-center justify-between px-8 max-xl:px-6 max-md:px-4 ">

      <!-- Logo -->
      <a href="<?php echo esc_url(home_url('/')); ?>" class="block shrink-0 hd-logo">
         <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/header-logo.png"
            class="block w-full object-contain" alt="KIENA">
      </a>

      <!-- Right: Nav + Language (desktop) -->
      <div class="flex items-center gap-6 max-xl:hidden">

         <!-- Nav items -->
         <?php wp_nav_menu([
            'theme_location' => 'header-menu-pc',
            'container'      => 'nav',
            'container_class' => 'flex items-center gap-6',
            'menu_class'     => 'menu-list flex items-center gap-6',
            'link_class'     => 'hd-nav-link',
            'depth'          => 1,
            'fallback_cb'    => false,
         ]); ?>

         <!-- Divider -->
         <span class="block w-px h-6 bg-[#d9d9d9] shrink-0"></span>

         <!-- Language switcher -->
         <div class="flex items-center gap-2 hd-lang">
            <a href="<?php echo esc_url($lang_vi); ?>" class="font-bold text-[14px] uppercase lang-active">VI</a>
            <span class="block w-px h-4 bg-[#d9d9d9]"></span>
            <a href="<?php echo esc_url($lang_en); ?>" class="font-bold text-[14px] uppercase">EN</a>
         </div>

      </div>

      <!-- Hamburger (mobile) -->
      <button type="button" class="js-nav-open  max-xl:flex hidden items-center justify-center w-10 h-10 cursor-pointer" aria-label="Mở menu">
         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="3" y1="6" x2="21" y2="6" stroke="#283377" stroke-width="2" stroke-linecap="round" />
            <line x1="3" y1="12" x2="21" y2="12" stroke="#283377" stroke-width="2" stroke-linecap="round" />
            <line x1="3" y1="18" x2="21" y2="18" stroke="#283377" stroke-width="2" stroke-linecap="round" />
         </svg>
      </button>

   </div>
</header>

<!-- =============================================
     MOBILE NAV DRAWER
     ============================================= -->
<div class="hd-nav" id="hd-nav" aria-hidden="true">

   <!-- Top bar -->
   <div class="flex items-center justify-between px-6 py-4 border-b border-[#f0f0f0]">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="block hd-logo">
         <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/header-logo.png"
            class="block w-full object-contain" alt="KIENA">
      </a>
      <button type="button" class="js-nav-close flex items-center justify-center w-10 h-10 cursor-pointer" aria-label="Đóng menu">
         <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="4" y1="4" x2="20" y2="20" stroke="#283377" stroke-width="2" stroke-linecap="round" />
            <line x1="20" y1="4" x2="4" y2="20" stroke="#283377" stroke-width="2" stroke-linecap="round" />
         </svg>
      </button>
   </div>

   <!-- Nav items -->
   <?php wp_nav_menu([
      'theme_location' => 'header-menu-pc',
      'container'      => 'nav',
      'container_class' => 'flex flex-col px-6 py-4',
      'menu_class'     => 'menu-list flex flex-col',
      'link_class'     => 'hd-nav-item font-bold text-[16px] uppercase py-4 border-b border-[#f0f0f0] text-pri',
      'depth'          => 1,
      'fallback_cb'    => false,
   ]); ?>

   <!-- Language switcher -->
   <div class="flex items-center gap-3 px-6 pt-2 hd-lang">
      <a href="<?php echo esc_url($lang_vi); ?>" class="font-bold text-[14px] uppercase lang-active">VI</a>
      <span class="block w-px h-4 bg-[#d9d9d9]"></span>
      <a href="<?php echo esc_url($lang_en); ?>" class="font-bold text-[14px] uppercase">EN</a>
   </div>

</div>