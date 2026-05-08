<?php
defined('ABSPATH') || exit;

// =============================================
// SAMPLE DATA — dev tự kết nối ACF sau
// =============================================
$sample = [
   'title_highlight' => 'CAM KẾT',
   'title'           => 'TƯƠNG LAI',
   'desc'            => 'Dấu mốc cho hành trình đồng hành cùng cộng đồng',
];
$data = $sample;
$img  = MONA_THEME_PATH_URI . '/assets/images/';
?>

<section class="section-hoat-dong-number relative section-pd">
   <span class="absolute inset-0 bg-[#F4F5F8] z-[-1]"></span>
   <div class="container">

      <div class="flex flex-col mb-10 max-lg:mb-6 text-center">
         <h2 class="title-main">
            <span><?php echo esc_html($data['title_highlight']); ?></span>
            <?php echo esc_html($data['title']); ?>
         </h2>

      </div>

      <!--
         Grid 4 cột, 3 hàng:
         Row1: [Card1 col1-2]    [Card2-img col3-4]
         Row2: [Card1 cont.]     [Card-yte col3]  [Card3 col4]
         Row3: [Card4 col1]      [Card5 col2-3]   [Card3 cont.]
      -->
      <div class="counter-js grid relative z-1 grid-cols-1 md:grid-cols-4 md:grid-rows-[repeat(3,minmax(280px,auto))] gap-4">

         <!-- Card 1: 10.000+ Hộ dân | col 1-2, row 1-2 — trắng + ảnh aerial -->
         <div class="group md:col-span-2 md:row-span-2 rounded-2xl overflow-hidden bg-[#f9f9f9] p-4 relative min-h-70 flex items-start"
            data-num-card="0" data-active-color="#ed1c24">
            <img src="<?= $img ?>hoat-dong-cong-dong/hoat-dong-img-1.jpg" alt=""
               class="absolute inset-0 size-full object-cover pointer-events-none" data-parallax-bg>
            <div class="relative z-1 flex flex-col gap-2 text-pri group-hover:text-sec transition-colors duration-300 num-card-text">
               <p class="countNum text-[80px] max-lg:text-[40px] max-sm:text-[50px] font-extrabold uppercase leading-none tracking-[-3.2px]" data-count="10000">10.000+</p>
               <p class="text-[16px] tracking-[-0.64px] font-semibold num-card-desc">Hộ dân được hỗ trợ cải thiện điều kiện sống</p>
            </div>
         </div>

         <!-- Card 2: ảnh thuần | col 3-4, row 1 — xanh đậm + ảnh sinh viên full -->
         <div class="group md:col-span-2 rounded-2xl overflow-hidden flex items-center relative min-h-70 p-4">
            <div class="relative z-1 flex flex-col gap-2 text-white group-hover:text-sec transition-colors duration-300 num-card-text">
               <p class="countNum text-[80px] max-lg:text-[40px] max-sm:text-[50px] font-extrabold uppercase leading-none tracking-[-3.2px]" data-count="10000">5.000+</p>
               <p class="text-[16px] tracking-[-0.64px] max-w-65 font-semibold num-card-desc">Suất học bổng trao cho học sinh, sinh viên vượt khó</p>
            </div>
            <img src="<?= $img ?>hoat-dong-cong-dong/hoat-dong-img-2.jpg" alt=""
               class="absolute inset-0 size-full object-cover pointer-events-none" data-parallax-bg>
         </div>

         <!-- Card Ytế: 30+ Cơ sở y tế | col 3, row 2 — gradient vàng -->
         <div class="group md:col-start-3 md:row-start-2 rounded-2xl overflow-hidden relative min-h-70 flex items-center justify-center p-4"

            data-num-card="1" data-active-color="#283377">
            <img src="<?= $img ?>hoat-dong-cong-dong/hoat-dong-img-3.jpg" alt=""
               class="absolute inset-0 size-full object-cover mix-blend-soft-light opacity-70 pointer-events-none rotate-180 -scale-y-100">
            <div class="relative z-1 flex flex-col gap-2 items-center text-center text-pri group-hover:text-sec transition-colors duration-300 num-card-text">
               <p class="countNum text-[80px] max-lg:text-[40px] max-sm:text-[50px] font-extrabold uppercase leading-none tracking-[-3.2px]" data-count="30">30+</p>
               <p class="text-[16px] tracking-[-0.64px] font-semibold num-card-desc">Cơ sở y tế được hỗ trợ <br> trang thiết bị và cải tạo</p>
            </div>
         </div>

         <!-- Card 3: 50+ Điểm trường | col 4, row 2-3 — cream + ảnh sinh viên (tall) -->
         <div class="group md:col-start-4 md:row-start-2 md:row-span-2 rounded-2xl overflow-hidden bg-[#fcf5de] p-4 relative min-h-70 flex items-start"
            data-num-card="2" data-active-color="#ed1c24">
            <img src="<?= $img ?>hoat-dong-cong-dong/hoat-dong-img-6.jpg" alt=""
               class="absolute inset-0 size-full object-cover pointer-events-none">
            <div class="absolute inset-0 pointer-events-none overflow-hidden">
               <div class="absolute -top-19.5 -left-17.75 w-100.5 h-57.5 rotate-[-4.81deg]">
                  <div class="w-full h-full bg-[#1779d4] blur-[50px] opacity-80"></div>
               </div>
            </div>
            <div class="relative z-1 flex flex-col gap-3 text-white group-hover:text-sec transition-colors duration-300 num-card-text">
               <p class="countNum text-[80px] max-lg:text-[40px] max-sm:text-[50px] font-extrabold uppercase leading-none tracking-[-3.2px]" data-count="50">50+</p>
               <p class="text-[16px] tracking-[-0.64px] font-semibold num-card-desc">Điểm trường & cơ sở giáo dục được xây mới hoặc nâng cấp</p>
            </div>
         </div>

         <!-- Card 4: 100+ Cây cầu | col 1, row 3 — đỏ + map -->
         <div class="group md:col-start-1 md:row-start-3 rounded-2xl overflow-hidden p-4 relative min-h-70 flex items-end"
            data-num-card="3" data-active-color="#283377">
            <img src="<?= $img ?>hoat-dong-cong-dong/hoat-dong-img-4.jpg" alt=""
               class="absolute inset-0 size-full object-cover pointer-events-none">
            <div class="relative z-1 flex flex-col gap-2 text-white group-hover:text-pri transition-colors duration-300">
               <p class="countNum text-[80px] max-lg:text-[40px] max-sm:text-[50px] font-extrabold uppercase leading-none tracking-[-3.2px] num-card-text" data-count="100">100+</p>
               <p class="text-[16px] font-semibold tracking-[-0.64px] num-card-text num-card-desc">Cây cầu dân sinh được xây dựng tại các khu vực khó khăn</p>
            </div>
         </div>

         <!-- Card 5: 10.000+ Cây xanh | col 2-3, row 3 — xanh đậm + ảnh rừng + gradient bottom -->
         <div class="group md:col-start-2 md:col-span-2 md:row-start-3 rounded-2xl overflow-hidden p-4 relative min-h-70 flex items-end"
            data-num-card="4" data-active-color="#ed1c24">
            <img src="<?= $img ?>hoat-dong-cong-dong/hoat-dong-img-5.jpg" alt=""
               class="absolute inset-0 size-full object-cover pointer-events-none" data-parallax-bg>
            <!-- <div class="absolute inset-0 bg-linear-to-t from-[#111] to-[rgba(17,17,17,0.1)] pointer-events-none"></div> -->
            <div class="relative z-1 max-md:flex-col flex md:items-end gap-4 text-white group-hover:text-sec transition-colors duration-300 num-card-text w-full">
               <p class="countNum text-[80px] max-lg:text-[40px] max-sm:text-[50px] font-extrabold uppercase leading-none tracking-[-3.2px] shrink-0" data-count="10000">10.000+</p>
               <p class="text-[16px] tracking-[-0.64px] font-semibold num-card-desc pb-1">Cây xanh được trồng mới, hướng đến phát triển bền vững</p>
            </div>
         </div>

      </div>
   </div>
</section>