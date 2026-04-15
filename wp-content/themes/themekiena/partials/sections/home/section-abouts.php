<?php
defined('ABSPATH') || exit;

// =============================================
// SAMPLE DATA — dev tự kết nối ACF sau
// =============================================
$sample = [
   'title'   => 'KIENA',
   'tagline' => 'CREATING VALUES FOR LIFE',
   'desc_1'  => [
      'bold' => 'KIẾN Á GROUP (KAG) được thành lập hơn 30 năm,',
      'text' => ' là Tập đoàn phát triển đa ngành với ba lĩnh vực trọng tâm: Bất động sản, Giáo dục, và Xây dựng - dịch vụ.',
   ],
   'desc_2'  => [
      'text' => 'KAG theo đuổi triết lý phát triển bền vững lấy con người làm trung tâm, hướng đến ',
      'bold' => 'kiến tạo các công trình và hệ sinh thái có giá trị lâu dài cho cộng đồng.',
   ],
   'image'   => 'home/about-citigrand.png',
   'title-image' => 'title-sec-ab.png',
];
$data = $sample;
?>

<section class="section-abouts relative section-pd z-1">
   <span class="absolute bottom-full left-0 w-full translate-y-1/2">
      <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/home/cloude-dc.png" class="block w-full" alt="">
   </span>
   <span class="absolute inset-0 bg-white z-[-1]"></span>

   <!-- Top: content group -->
   <div class="container">
      <div class="mb-[-20%] relative z-1">
         <div class="max-w-148 mx-auto text-center">
            <span class="max-w-175 mx-auto mb-6 block">
               <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/<?php echo esc_attr($data['title-image']); ?>" class="block w-full" alt="">
            </span>
            <p class="text-[16px] text-pri mb-4">
               <strong class="text-sec"><?php echo esc_html($data['desc_1']['bold']); ?></strong>
               <?php echo esc_html($data['desc_1']['text']); ?>
            </p>
            <p class="text-[16px] text-pri">
               <?php echo esc_html($data['desc_2']['text']); ?>
               <strong class="text-sec"><?php echo esc_html($data['desc_2']['bold']); ?></strong>
            </p>
         </div>
      </div>
   </div>

   <!-- Bottom: 1 image — full-width, sát đáy -->
   <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/<?php echo esc_attr($data['image']); ?>"
      class="block w-full" alt="">

</section>