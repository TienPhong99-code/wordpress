<?php
defined('ABSPATH') || exit;

// =============================================
// SAMPLE DATA — dev tự kết nối ACF sau
// =============================================
$sample = [
   'title'   => 'KIENA',
   'tagline' => 'CREATING VALUES FOR LIFE',
   'desc_1'  => [
      'text' => 'KIẾN Á GROUP (KAG) được thành lập ',
      'blod' => 'hơn 30 năm,',
      'text' => 'là Tập đoàn phát triển đa ngành với ba lĩnh vực trọng tâm: Bất động sản, Giáo dục, và Xây dựng - dịch vụ.'
   ],
   'desc_2'  => [
      'text' => 'KAG theo đuổi  ',
      'bold' => 'triết lý phát triển bền vững: ',
      'text' => 'Lấy con người làm trung tâm, hướng đến kiến tạo các công trình và hệ sinh thái có giá trị lâu dài cho cộng đồng.'
   ],
   'image'   => 'home/about-citigrand4.png',
   'title-image' => 'title-bg-ab2.jpeg',
];
$data = $sample;
?>

<section class="section-abouts relative section-pd-t z-1 max-md:bg-white">
   <!-- <span class="absolute bottom-full left-0 w-full translate-y-1/2">
      <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/home/cloude-dc.png" class="block w-full" alt="">
   </span> -->
   <span class="absolute inset-0 md:bg-linear-to-b from-[#ffffff] to-[#e0f6ff] z-[-1] "></span>

   <!-- Top: content group -->
   <div class="md:absolute md:top-[10%] md:left-1/2 md:-translate-x-1/2 md:w-full md:z-10">
      <div class="container">
         <div class="relative z-1">
            <div class="about-content max-w-200 mx-auto text-center pointer-events-none">
               <span class="mx-auto mb-6 block">
                  <svg class="svg-title-about" width="795" height="165" viewBox="0 0 795 165" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                     <mask id="mask0_94_28136" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="795" height="165">
                        <path d="M204.686 23.3794H235.04V164.041H187.791V40.2742C187.791 30.9505 195.362 23.3794 204.686 23.3794Z" fill="#283377" />
                        <path d="M170.686 0.0350515H108.154L47.3394 60.6742V0H13.3044C6.01371 0 0.0900421 5.92371 0.0900421 13.2144V164.041H47.3394V103.402L108.154 164.041H170.686L88.4549 82.0206L170.721 0L170.686 0.0350515Z" fill="#283377" />
                        <path d="M407.283 124.994H265.71V164.076H407.283V124.994Z" fill="#283377" />
                        <path d="M278.925 23.3794C271.634 23.3794 265.71 29.3031 265.71 36.5938V109.361H375.982V78.0598H312.96V62.4268H407.283V23.3443H278.925V23.3794Z" fill="#283377" />
                        <path d="M729.442 0.0350342H693.444C686.014 0.0350342 679.319 4.48658 676.409 11.2866L611.564 164.041H649.139C655.484 164.041 661.232 160.256 663.721 154.402L705.292 56.468L734.385 124.994H688.607L705.187 164.076H786.822C792.605 164.076 796.531 158.152 794.253 152.825L729.407 0.0350342H729.442Z" fill="#283377" />
                        <path d="M547.244 23.3794V100.948L485.203 23.3794H451.168C443.877 23.3794 437.954 29.3031 437.954 36.5938V164.041H485.203V86.4721L547.244 164.041H581.279C588.57 164.041 594.494 158.117 594.494 150.827V23.3794H547.244Z" fill="#283377" />
                     </mask>
                     <g class="svg-draw-layer" fill="none" stroke="#283377" stroke-width="1.5" stroke-linejoin="round" stroke-linecap="round">
                        <path d="M170.686 0.0350515H108.154L47.3394 60.6742V0H13.3044C6.01371 0 0.0900421 5.92371 0.0900421 13.2144V164.041H47.3394V103.402L108.154 164.041H170.686L88.4549 82.0206L170.721 0L170.686 0.0350515Z" />
                        <path d="M204.686 23.3794H235.04V164.041H187.791V40.2742C187.791 30.9505 195.362 23.3794 204.686 23.3794Z" />
                        <path d="M278.925 23.3794C271.634 23.3794 265.71 29.3031 265.71 36.5938V109.361H375.982V78.0598H312.96V62.4268H407.283V23.3443H278.925V23.3794Z" />
                        <path d="M407.283 124.994H265.71V164.076H407.283V124.994Z" />
                        <path d="M547.244 23.3794V100.948L485.203 23.3794H451.168C443.877 23.3794 437.954 29.3031 437.954 36.5938V164.041H485.203V86.4721L547.244 164.041H581.279C588.57 164.041 594.494 158.117 594.494 150.827V23.3794H547.244Z" />
                        <path d="M729.442 0.0350342H693.444C686.014 0.0350342 679.319 4.48658 676.409 11.2866L611.564 164.041H649.139C655.484 164.041 661.232 160.256 663.721 154.402L705.292 56.468L734.385 124.994H688.607L705.187 164.076H786.822C792.605 164.076 796.531 158.152 794.253 152.825L729.407 0.0350342H729.442Z" />
                     </g>
                     <g class="svg-masked-group" mask="url(#mask0_94_28136)">
                        <rect x="-482" y="-940" width="1666" height="1110" fill="url(#pattern0_94_28136)" />
                     </g>
                     <defs>
                        <pattern id="pattern0_94_28136" patternContentUnits="objectBoundingBox" width="1" height="1">
                           <use xlink:href="#image0_94_28136" transform="scale(0.000289429 0.000434405)" />
                        </pattern>
                        <image id="image0_94_28136" width="3456" height="2304" xlink:href="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/home/<?php echo esc_attr($data['title-image']); ?>" />
                     </defs>
                  </svg>
               </span>
               <div class="max-w-180 mx-auto">
                  <p class="text-[16px] text-pri mb-4">
                     <span class="font-bold">“Hơn 30 năm trước, chúng tôi bắt đầu từ một câu hỏi đơn giản:
Một nơi để sống - cần bao nhiêu lâu để trở thành một nơi đáng sống?</span>
<br>
Hôm nay, câu trả lời ấy được hiện thực hóa qua từng đô thị, từng ngôi trường, từng công trình và từng cộng
đồng mà KIẾN Á kiến tạo.”
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Bottom: 1 image — full-width, sát đáy -->
   <div class="overflow-hidden pointer-events-none">
      <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/<?php echo esc_attr($data['image']); ?>"
         class="about-img-bot block w-full" alt="">
   </div>

</section>