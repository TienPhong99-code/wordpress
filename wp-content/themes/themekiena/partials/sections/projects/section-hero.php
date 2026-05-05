<?php

/**
 * Hero section — trang Dự án / trang chi tiết danh mục
 *
 * $args['title']           string  Tiêu đề lớn (mặc định "DỰ ÁN")
 * $args['title_highlight'] string  Phần highlight màu đỏ trong tiêu đề (tuỳ chọn)
 * $args['desc_red']        string  Dòng mô tả màu đỏ (tuỳ chọn)
 * $args['desc']            string  Dòng mô tả thường (tuỳ chọn)
 * $args['image_id']        int     ID ảnh nền (tuỳ chọn)
 */
defined('ABSPATH') || exit;

$title           = $args['title']           ?? 'DỰ ÁN';
$title_highlight = $args['title_highlight'] ?? '';
$desc_red        = $args['desc_red']        ?? 'Tất cả lĩnh vực hoạt động của Tập đoàn đều hướng đến tầm nhìn dài hạn:';
$desc            = $args['desc']            ?? 'kiến tạo giá trị bền vững và góp phần thúc đẩy sự phát triển của các khu đô thị hiện đại.';
$image_id        = $args['image_id']        ?? 0;
?>

<section class="section-projects-hero relative flex flex-col justify-end overflow-hidden">
   <!-- Content -->
   <div class="relative z-1 flex flex-col gap-2 items-center text-center mb-[-15%]">
      <div class="container">
         <h1 class="text-[48px] max-xl:text-[36px] max-md:text-[28px] font-black uppercase text-pri tracking-[-0.04em] leading-normal">
            <?php echo esc_html($title); ?>
            <?php if ($title_highlight) : ?>
               <span class="text-sec"><?php echo esc_html($title_highlight); ?></span>
            <?php endif; ?>
         </h1>

         <?php if ($desc_red || $desc) : ?>
            <div class="flex flex-col">
               <?php if ($desc_red) : ?>
                  <p class="font-bold text-[16px] max-md:text-[14px] text-sec leading-normal">
                     <?php echo esc_html($desc_red); ?>
                  </p>
               <?php endif; ?>
               <?php if ($desc) : ?>
                  <p class="text-[16px] max-md:text-[14px] text-pri leading-normal">
                     <?php echo esc_html($desc); ?>
                  </p>
               <?php endif; ?>
            </div>
         <?php endif; ?>
      </div>
   </div>
   <!-- Background -->
   <div class="relative">
      <?php if ($image_id) : ?>
         <?php echo mona_get_image_by_id($image_id, 'full', false, [
            'class'   => 'block w-full',
            'loading' => 'eager',
         ]); ?>
      <?php endif; ?>
   </div>

</section>