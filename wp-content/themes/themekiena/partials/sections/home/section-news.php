<?php
// =============================================
// SAMPLE DATA — dev tự kết nối ACF sau
// =============================================
$sample = [
   'title_1' => 'Tin tức',
   'title_2' => 'mới cập nhật',
   'link'    => '#',
   'items'   => [
      [
         'title' => 'Căn hộ sang trọng bên bờ biển bắt đầu mở bán.',
         'desc'  => 'Với thiết kế tinh tế và dịch vụ đẳng cấp, đây là lựa chọn lý tưởng cho cuộc sống nghỉ dưỡng.',
         'time'  => '20 phút trước',
         'image' => 'home/news-img-1.jpg',
         'link'  => '#',
      ],
      [
         'title' => 'Căn hộ cao cấp mới khai trương ở khu vực trung tâm thành phố.',
         'desc'  => 'Phát triển mới nhất cung cấp tầm nhìn tuyệt đẹp ra đường chân trời và tiện nghi hiện đại.',
         'time'  => '25 phút trước',
         'image' => 'home/news-img-2.jpg',
         'link'  => '#',
      ],
      [
         'title' => 'Căn hộ sang trọng bên bờ biển bắt đầu mở bán.',
         'desc'  => 'Với thiết kế tinh tế và dịch vụ đẳng cấp, đây là lựa chọn lý tưởng cho cuộc sống nghỉ dưỡng.',
         'time'  => '20 phút trước',
         'image' => 'home/news-img-3.jpg',
         'link'  => '#',
      ],
      [
         'title' => 'Khu chung cư cao cấp mới mở bán tại khu đô thị mới.',
         'desc'  => 'Được trang bị các tiện ích thông minh, phù hợp với xu hướng sống hiện đại.',
         'time'  => '10 phút trước',
         'image' => 'home/news-img-5.jpg',
         'link'  => '#',
      ],
      [
         'title' => 'Dự án nhà ở giá rẻ được khởi công tại ngoại ô.',
         'desc'  => 'Mang đến cơ hội cho các gia đình trẻ sở hữu tổ ấm mơ ước.',
         'time'  => '15 phút trước',
         'image' => 'home/news-img-4.jpg',
         'link'  => '#',
      ],
      [
         'title' => 'Căn hộ hiện đại với thiết kế mở và ánh sáng tự nhiên.',
         'desc'  => 'Nằm ở vị trí đắc địa, gần các trung tâm thương mại và dịch vụ.',
         'time'  => '5 phút trước',
         'image' => 'home/news-img-6.jpg',
         'link'  => '#',
      ],
   ],
];
$data = $sample;
?>

<section class="section-news relative section-pd">
   <div class="container relative">

      <!-- Title -->
      <div class="text-center mb-8 max-xl:mb-5 max-md:mb-4">
         <h2 class="title-main">
            <?php echo esc_html($data['title_1']); ?> <span><?php echo esc_html($data['title_2']); ?></span>
         </h2>
      </div>

      <!-- News grid -->
      <div class="relative">
         <div class="row">
            <?php foreach ($data['items'] as $item) : ?>
               <div class="col col-6 max-md:w-full!">
                  <div class="flex gap-3 max-sm:gap-2 items-start max-sm:flex-col">

                     <!-- Image -->
                     <div class="w-[45%] max-sm:w-full shrink-0">
                        <a href="<?php echo esc_url($item['link']); ?>" class="block aspect-600/389 rounded-[8px] overflow-hidden">
                           <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/<?php echo esc_attr($item['image']); ?>"
                              class="block w-full h-full object-cover" alt="">
                        </a>
                     </div>

                     <!-- Content -->
                     <div class="flex flex-col gap-3 max-sm:gap-2 flex-1 min-w-0">
                        <a href="<?php echo esc_url($item['link']); ?>"
                           class="font-bold text-[20px] max-xl:text-[17px] max-md:text-[16px] max-sm:text-[14px] text-pri hover:text-sec">
                           <?php echo esc_html($item['title']); ?>
                        </a>
                        <p class="text-[16px] max-xl:text-[14px] max-sm:text-[13px] text-pri">
                           <?php echo esc_html($item['desc']); ?>
                        </p>
                        <p class="text-[12px] text-[#ababab]">
                           <?php echo esc_html($item['time']); ?>
                        </p>
                     </div>

                  </div>
               </div>
            <?php endforeach; ?>
         </div>
      </div>

   </div>
</section>