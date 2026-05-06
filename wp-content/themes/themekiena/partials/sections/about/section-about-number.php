<?php
defined('ABSPATH') || exit;

// =============================================
// SAMPLE DATA — dev tự kết nối ACF sau
// =============================================
$sample = [
   'title'           => 'NHỮNG CON SỐ',
   'title_highlight' => 'ẤN TƯỢNG',
   'brands'          => [
      'about/number-brand-1.png',
      'about/number-brand-2.png',
      'about/number-brand-3.png',
      'about/number-brand-4.png',
      'about/number-brand-5.png',
   ],
];
$data = $sample;
$img  = MONA_THEME_PATH_URI . '/assets/images/';
?>

<section class="section-about-number section-pd">
   <div class="container">
      <div class="flex flex-col mb-10 max-lg:mb-6 text-center">
         <h2 class="title-main">
            <?php echo esc_html($data['title']); ?>
            <span><?php echo esc_html($data['title_highlight']); ?></span>
         </h2>
         <p class="mt-2">
            Những con số là dấu mốc cho một hành trình phát triển bền bỉ:
         </p>
      </div>

      <div class="counter-js grid grid-cols-1 md:grid-cols-4 gap-4">

         <!-- Card 1: 360+ Hecta đất (col 1-2, row 1) -->
         <div class="md:col-span-2 rounded-2xl overflow-hidden bg-[#f9f9f9] p-6 max-lg:p-5 relative min-h-70 flex items-start"
            data-num-card="0" data-active-color="#ed1c24">
            <img src="<?= $img ?>about/number-land2.jpg" alt="" class="absolute inset-0 size-full object-cover pointer-events-none" data-parallax-bg>
            <div class="absolute top-0 left-0 w-full h-[75%] bg-linear-to-b from-white to-transparent md:hidden pointer-events-none"></div>
            <div class="relative z-1 flex flex-col gap-2 text-pri num-card-text">
               <p class="countNum text-[80px] max-lg:text-[40px] max-sm:text-[60px] font-extrabold uppercase leading-none tracking-[-3.2px]" data-count="360+">360+</p>
               <p class="text-[16px] tracking-[-0.64px] font-semibold num-card-desc">Hecta quỹ đất - nền tảng cho những đô thị tương lai</p>
            </div>
         </div>

         <!-- Middle column: 36+ and 40+ stacked (col 3, row 1) -->
         <div class="grid grid-cols-1 sm:grid-cols-2 md:flex! md:flex-col gap-4">

            <!-- Card 2a: 36+ Công ty thành viên -->
            <div class="aspect-[4/3] rounded-2xl overflow-hidden p-4 max-lg:p-5 relative flex flex-col gap-2 items-center justify-center"
               data-num-card="1" data-active-color="#ed1c24">
               <!-- <img src="<?= $img . esc_attr($data['brands'][0]); ?>" alt=""
                  class="absolute top-[0.5%] right-[-22%] w-[40%] h-auto pointer-events-none">
               <img src="<?= $img . esc_attr($data['brands'][1]); ?>" alt=""
                  class="absolute bottom-[4%] right-[-22%] w-[50%] h-auto pointer-events-none">
               <img src="<?= $img . esc_attr($data['brands'][2]); ?>" alt=""
                  class="absolute top-[5%] left-[42%] w-[24%] h-auto pointer-events-none">
               <img src="<?= $img . esc_attr($data['brands'][3]); ?>" alt=""
                  class="absolute top-1/2 -translate-y-1/2 left-[-26%] w-[41%] h-auto pointer-events-none">
               <img src="<?= $img . esc_attr($data['brands'][4]); ?>" alt=""
                  class="absolute bottom-[6%] left-[15%] w-[25%] h-auto pointer-events-none"> -->
               <span class="block absolute w-full h-full z-[-1] bg-[#fcf5de] ">
                  <img src="<?= $img ?>about/bg-br2.jpg" class="block w-full h-full object-cover" alt="">
               </span>
               <div class="relative z-1 flex flex-col gap-2 text-pri text-center num-card-text">
                  <p class="countNum text-[80px] max-lg:text-[40px] max-sm:text-[60px] font-extrabold uppercase leading-none tracking-[-3.2px]" data-count="36+">36+</p>
                  <p class="text-[16px] font-semibold tracking-[-0.64px] num-card-desc">Công ty thành viên - một hệ sinh thái đang vận hành đồng bộ</p>
               </div>
            </div>

            <!-- Card 2b: 40+ Giải thưởng -->
            <div class="aspect-[4/3] rounded-2xl overflow-hidden p-6 max-lg:p-5 relative flex flex-col gap-2 items-center justify-center text-center"
               data-num-card="2" data-active-color="#ed1c24">
               <span class="absolute inset-0 z-[-1]">
                  <img src="<?= $img ?>about/bg-num2.jpg" class="block w-full h-full object-cover" alt="">
               </span>
               <p class="countNum text-[80px] max-lg:text-[40px] max-sm:text-[60px] font-extrabold uppercase leading-none tracking-[-3.2px] text-pri num-card-text" data-count="40+">40+</p>
               <p class="text-[16px] font-semibold tracking-[-0.64px] text-pri num-card-text num-card-desc">Giải thưởng - sự ghi nhận <br> từ thị trường <br> và quốc tế</p>
            </div>

         </div>

         <!-- Card 3: 20+ Năm kinh nghiệm giáo dục (col 4, row 1-2) -->
         <div class="md:row-span-2 rounded-2xl overflow-hidden  p-6 max-lg:p-5 relative min-h-70 flex items-start"
            data-num-card="3" data-active-color="#ed1c24">
            <img src="<?= $img ?>about/number-edu2.jpg" alt="" class="absolute inset-0 size-full object-cover pointer-events-none" data-parallax-bg>
            <div class="absolute top-0 left-0 w-full h-[75%] bg-linear-to-b from-white to-transparent md:hidden pointer-events-none"></div>
            <div class="relative z-1 flex flex-col gap-3 text-pri num-card-text">
               <p class="countNum text-[80px] max-lg:text-[40px] max-sm:text-[60px] font-extrabold uppercase leading-none tracking-[-3.2px]" data-count="20+">20+</p>
               <p class="text-[16px] tracking-[-0.64px] font-semibold num-card-desc">Năm đầu tư giáo dục</p>
            </div>
         </div>

         <!-- Card 4: 6+ Tỉnh thành (col 1, row 2 — red square) -->
         <div class="aspect-square max-lg:aspect-video rounded-2xl overflow-hidden bg-[#d81921] p-6 max-lg:p-5 relative flex items-center"
            data-num-card="4" data-active-color="#283377">
            <img src="<?= $img ?>about/number-map.svg" alt=""
               class="absolute inset-0 size-full object-cover pointer-events-none">
            <div class="relative z-1 flex flex-col gap-2">
               <p class="countNum text-[80px] max-lg:text-[40px] max-sm:text-[60px] font-extrabold uppercase leading-none tracking-[-3.2px] text-[#f4de96] num-card-text" data-count="6+">6+</p>
               <p class="text-[16px] font-semibold tracking-[-0.64px] text-[#f4de96] num-card-text num-card-desc">Tỉnh/thành - nơi dấu ấn KIẾN Á hiện diện</p>
            </div>
         </div>

         <!-- Card 5: 30+ Năm kinh nghiệm BĐS (col 2-3, row 2 — dark blue) -->
         <div class="md:col-span-2 rounded-2xl overflow-hidden bg-pri p-6 max-lg:p-5 relative flex items-center min-h-50"
            data-num-card="5" data-active-color="#ed1c24">
            <img src="<?= $img ?>about/number-logo-bg.svg" alt=""
               class="absolute inset-0 h-full w-auto pointer-events-none object-cover">
            <img src="<?= $img ?>about/number-bds.jpg" alt=""
               class="absolute right-0 top-0 h-full w-2/3 object-cover pointer-events-none"
               data-parallax-bg data-scale-x="-1">
            <div class="absolute inset-0"></div>
            <div class="relative z-1 flex flex-col gap-2 text-white max-w-[230px] num-card-text">
               <p class="countNum text-[80px] max-lg:text-[40px] max-sm:text-[60px] font-extrabold uppercase leading-none tracking-[-3.2px]" data-count="30+">30+</p>
               <p class="text-[16px] tracking-[-0.64px] font-semibold num-card-desc">Năm phát triển bất động sản</p>
            </div>
         </div>
      </div>
   </div>
</section>