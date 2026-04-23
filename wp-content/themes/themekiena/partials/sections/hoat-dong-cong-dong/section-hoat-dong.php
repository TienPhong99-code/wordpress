<?php
// =============================================
// ACF DATA
// =============================================
$_post_id  = get_the_ID();
$items_raw = get_field('hoat_dong_items', $_post_id) ?: [];

$data = [
    'title'      => get_field('hoat_dong_title',      $_post_id) ?: 'Các',
    'title_span' => get_field('hoat_dong_title_span', $_post_id) ?: 'hoạt động',
    'items'      => array_map(function ($row) {
        return [
            'image'   => $row['image'] ?? '',
            'title'   => $row['hoat_dong_item_title'] ?? '',
            'gallery' => ! empty($row['gallery']) ? $row['gallery'] : [$row['image'] ?? ''],
        ];
    }, $items_raw),
];
?>

<section class="section-hoat-dong relative pt-(--pd-sc) pb-(--pd-sc)">

    <div class="container">

        <!-- Title -->
        <h2 class="title-main text-center mb-16">
            <?php echo esc_html($data['title']); ?> <span><?php echo esc_html($data['title_span']); ?></span>
        </h2>

        <!-- Masonry grid — mỗi item thứ 5 (index % 5 === 0) là big (2 col) -->
        <div class="hoat-dong-grid" id="hoatDongGrid">
            <div class="hoat-dong-grid-sizer"></div>

            <?php foreach ($data['items'] as $i => $item) :
                $is_big   = ($i % 5 === 0);
                $size_cls = $is_big ? 'is-big' : 'is-small';
                $img_h    = $is_big ? 'aspect-video' : 'aspect-[4/3]';
                $gallery  = !empty($item['gallery']) ? $item['gallery'] : [$item['image']];
                $group    = 'hoat-dong-gallery-' . $i;
            ?>
                <div class="hoat-dong-grid-item <?php echo $size_cls; ?>">
                    <div class="relative rounded-[8px] overflow-hidden bg-[#0a0d1e] <?php echo $img_h; ?> cursor-pointer">
                        <img src="<?php echo esc_url($item['image']); ?>"
                            class="absolute inset-0 w-full h-full object-cover" alt="">
                        <div class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-[rgba(26,26,26,0.8)] to-[rgba(26,26,26,0)] pt-8 pb-4 px-4">
                            <p class="text-white text-[20px] font-bold max-md:text-[16px]"><?php echo esc_html($item['title']); ?></p>
                        </div>

                        <?php
                        $gallery_items = array_map(function ($url) {
                            return ['src' => $url, 'type' => 'image'];
                        }, $gallery);
                        ?>
                        <a href="#"
                            class="absolute inset-0 z-1 js-hoat-dong-gallery"
                            data-gallery="<?php echo esc_attr(wp_json_encode($gallery_items)); ?>"
                            aria-label="<?php echo esc_attr($item['title']); ?>"></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

</section>