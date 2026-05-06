<?php
defined('ABSPATH') || exit;

$term      = get_queried_object();
$term_slug = $term->slug ?? '';

$projects = get_posts([
    'post_type'      => 'du_an',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
    'tax_query'      => [[
        'taxonomy' => 'danh_muc_du_an',
        'field'    => 'term_id',
        'terms'    => $term->term_id,
    ]],
]);

if (empty($projects) && !in_array($term_slug, ['bat-dong-san', 'xay-dung'], true)) return;

// ══════════════════════════════════════════════════════════════════
// GIÁO DỤC / DỊCH VỤ — alternating rows (text trái/phải xen kẽ), full-bleed
// ══════════════════════════════════════════════════════════════════
if (in_array($term_slug, ['giao-duc', 'dich-vu'], true)) :
?>

    <section class="sec-du-an-category-projects bg-[#f4f5f8]">
        <div class="relative">
            <?php
            $icons_base = get_template_directory_uri() . '/assets/images/icons/';
            foreach ($projects as $index => $project) :
                $is_even    = ($index % 2 !== 0);
                $image_id   = get_field('image', $project->ID);
                $image      = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';
                $url        = get_field('url', $project->ID) ?: '#';
                $description = get_field('description', $project->ID);
                $location   = get_field('location', $project->ID);
                $area       = get_field('area', $project->ID);
                $scale      = get_field('scale', $project->ID);
                $text_pad   = $is_even ? 'left' : 'right';
            ?>
                <div class="item-prj <?php echo $is_even ? 'is-custom' : ''; ?>">
                    <div class="container-second ml-auto">
                        <div class="flex flex-col">
                            <div class="relative flex gap-4 md:gap-10 overflow-hidden max-md:flex-col">
                                <!-- Text column -->
                                <div class="shrink-0 w-lg max-md:w-full py-4 justify-center <?php echo esc_attr($text_pad); ?> flex flex-col gap-4">
                                    <h3 class="text-[36px] max-xl:text-[28px] max-md:text-[20px] font-bold text-pri leading-normal tracking-[-0.04em]">
                                        <?php echo esc_html($project->post_title); ?>
                                    </h3>
                                    <?php if ($description) : ?>
                                        <div class="text-[16px] max-md:text-[14px] text-pri wysiwyg-content">
                                            <?php echo wp_kses_post($description); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($location || $area || $scale) : ?>
                                        <div class="flex flex-col gap-1">

                                            <?php if ($location) : ?>
                                                <div class="flex items-center gap-2">
                                                    <div class="w-4 h-4 shrink-0">
                                                        <img src="<?php echo esc_url($icons_base . 'ic-pin.svg'); ?>" class="block w-full h-full object-contain" alt="">
                                                    </div>
                                                    <p class="text-[14px] text-pri leading-normal">
                                                        <span class="font-bold">Vị trí:</span> <?php echo esc_html($location); ?>
                                                    </p>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($area) : ?>
                                                <div class="flex items-center gap-2">
                                                    <div class="w-4 h-4 shrink-0">
                                                        <img src="<?php echo esc_url($icons_base . 'ic-ruler.svg'); ?>" class="block w-full h-full object-contain" alt="">
                                                    </div>
                                                    <p class="text-[14px] text-pri leading-normal">
                                                        <span class="font-bold">Diện tích:</span> <?php echo esc_html($area); ?>
                                                    </p>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($scale) : ?>
                                                <div class="flex items-center gap-2">
                                                    <div class="w-4 h-4 shrink-0">
                                                        <img src="<?php echo esc_url($icons_base . 'ic-box.svg'); ?>" class="block w-full h-full object-contain" alt="">
                                                    </div>
                                                    <p class="text-[14px] text-pri leading-normal">
                                                        <span class="font-bold">Quy mô:</span> <?php echo esc_html($scale); ?>
                                                    </p>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                    <?php endif; ?>

                                </div>

                                <!-- Image column -->
                                <div class="flex-1 overflow-hidden">
                                    <?php if ($image) : ?>
                                        <img src="<?php echo esc_url($image); ?>"
                                            alt="<?php echo esc_attr($project->post_title); ?>"
                                            loading="lazy"
                                            class="block w-full h-full object-cover">
                                    <?php endif; ?>
                                </div>

                                <!-- Link overlay -->
                                <!-- <a href="<?php echo esc_url($url); ?>" class="absolute inset-0 z-1" aria-label="<?php echo esc_attr($project->post_title); ?>"></a> -->

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

<?php
// ══════════════════════════════════════════════════════════════════
// XÂY DỰNG — alternating rows, full-bleed (đồng bộ giáo dục/dịch vụ)
// ══════════════════════════════════════════════════════════════════
elseif ($term_slug === 'xay-dung') :

    $img = MONA_THEME_PATH_URI . '/assets/images/';

    $default_icons = [
        0 => [
            $img . 'icons/ic-road.svg',
            $img . 'icons/ic-water.svg',
            $img . 'icons/ic-house.svg',
            $img . 'icons/ic-complex.svg',
        ],
        1 => [
            $img . 'icons/ic-building.svg',
            $img . 'icons/ic-worker.svg',
        ],
        2 => [
            $img . 'icons/ic-landscape.svg',
            $img . 'icons/ic-tree.svg',
        ],
    ];

    $fallback = [
        [
            'title' => 'Thi công hạ tầng kỹ thuật',
            'image' => $img . 'du-an/xay-dung/scope-building.jpg',
            'items' => [
                ['icon' => $img . 'icons/ic-road.svg',    'text' => 'San nền, đường giao thông'],
                ['icon' => $img . 'icons/ic-water.svg',   'text' => 'Hệ thống cấp – thoát nước'],
                ['icon' => $img . 'icons/ic-house.svg',   'text' => 'Hệ thống kỹ thuật ngoài nhà'],
                ['icon' => $img . 'icons/ic-complex.svg', 'text' => 'Dự án phức hợp'],
            ],
        ],
        [
            'title' => 'Thi công công trình dân dụng & công nghiệp',
            'image' => $img . 'du-an/xay-dung/scope-building.jpg',
            'items' => [
                ['icon' => $img . 'icons/ic-building.svg', 'text' => 'Nhà ở, công trình thương mại'],
                ['icon' => $img . 'icons/ic-worker.svg',   'text' => 'Hạng mục kỹ thuật'],
            ],
        ],
        [
            'title' => 'Thi công cảnh quan & cây xanh',
            'image' => $img . 'du-an/xay-dung/scope-building.jpg',
            'items' => [
                ['icon' => $img . 'icons/ic-landscape.svg', 'text' => 'Landscape đô thị, công viên, khuôn viên trường học, khu nghỉ dưỡng'],
                ['icon' => $img . 'icons/ic-tree.svg',      'text' => 'Mảng xanh dự án'],
            ],
        ],
    ];

    $acf_rows = get_field('scope_tabs', $term) ?: [];
    $tabs = $acf_rows ? array_map(function ($row) {
        return [
            'title' => $row['tab_title'] ?? '',
            'image' => $row['tab_image'] ?? '',
            'items' => array_map(function ($item) {
                return [
                    'icon' => $item['item_icon'] ?? '',
                    'text' => $item['item_text'] ?? '',
                ];
            }, $row['tab_items'] ?: []),
        ];
    }, $acf_rows) : $fallback;
?>

    <section class="sec-du-an-category-projects bg-[#f4f5f8]">


        <div class="relative">
            <?php foreach ($tabs as $idx => $tab) :
                $is_even  = ($idx % 2 !== 0);
                $text_pad = $is_even ? 'left' : 'right';
            ?>
                <div class="item-prj <?php echo $is_even ? 'is-custom' : ''; ?>">
                    <div class="container-second ml-auto">
                        <div class="flex flex-col">
                            <div class="relative flex gap-4 md:gap-10 overflow-hidden max-md:flex-col">

                                <!-- Text column -->
                                <div class="shrink-0 w-136 max-md:w-full py-10 max-md:py-6 justify-center <?php echo esc_attr($text_pad); ?> flex flex-col gap-5">
                                    <h3 class="text-[32px] max-xl:text-[28px] max-md:text-[24px] font-bold text-pri leading-normal tracking-[-0.04em]">
                                        <?php echo esc_html($tab['title']); ?>
                                    </h3>
                                    <?php if (!empty($tab['items'])) : ?>
                                        <div class="flex flex-col gap-3">
                                            <?php foreach ($tab['items'] as $ii => $item) :
                                                $icon_src = $item['icon'] ?: ($default_icons[$idx][$ii] ?? $default_icons[$idx][0] ?? '');
                                            ?>
                                                <div class="flex gap-3 items-start">
                                                    <?php if ($icon_src) : ?>
                                                        <span class="shrink-0 mt-0.5 w-5 h-5">
                                                            <img src="<?php echo esc_url($icon_src); ?>" alt="" class="w-full h-full object-contain">
                                                        </span>
                                                    <?php endif; ?>
                                                    <span class="text-pri text-[16px] max-md:text-[14px] tracking-[-0.04em] leading-normal">
                                                        <?php echo esc_html($item['text']); ?>
                                                    </span>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Image column -->
                                <div class="flex-1 overflow-hidden">
                                    <?php if ($tab['image']) : ?>
                                        <img src="<?php echo esc_url($tab['image']); ?>"
                                            alt="<?php echo esc_attr($tab['title']); ?>"
                                            loading="lazy"
                                            class="block w-full h-full object-cover">
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

<?php
// ══════════════════════════════════════════════════════════════════
// BẤT ĐỘNG SẢN — Swiper chính, mỗi slide: cột trái (title + list) + cột phải (image + info)
// Mỗi du_an post = 1 Swiper, bds_slides repeater = danh sách slide (mỗi slide = 1 nhóm dự án)
// ══════════════════════════════════════════════════════════════════
elseif ($term_slug === 'bat-dong-san') :

    $icons_base = get_template_directory_uri() . '/assets/images/icons/';
    $meta_defs  = [
        ['key' => 'location', 'label' => 'Vị trí',   'icon' => 'ic-pin.svg'],
        ['key' => 'area',     'label' => 'Diện tích', 'icon' => 'ic-ruler.svg'],
        ['key' => 'scale',    'label' => 'Quy mô',    'icon' => 'ic-box.svg'],
    ];

    $all_swipers = [];
    foreach ($projects as $project) {
        foreach (get_field('bds_swiper_groups', $project->ID) ?: [] as $swiper_group) {
            $groups = [];
            foreach ($swiper_group['slides'] ?: [] as $slide_row) {
                $raw_items = $slide_row['items'] ?: [];
                if (empty($raw_items)) continue;
                $items = [];
                foreach ($raw_items as $row) {
                    $items[] = [
                        'name'        => $row['name'] ?? '',
                        'image_url'   => $row['image'] ? wp_get_attachment_image_url($row['image'], 'full') : '',
                        'description' => $row['description'] ?? '',
                        'location'    => $row['location'] ?? '',
                        'area'        => $row['area'] ?? '',
                        'scale'       => $row['scale'] ?? '',
                    ];
                }
                $groups[] = ['title' => $slide_row['title'] ?? '', 'items' => $items];
            }
            if (!empty($groups)) {
                $all_swipers[] = $groups;
            }
        }
    }

    if (empty($all_swipers)) return;

?>


    <div class="flex flex-col">
        <?php foreach ($all_swipers as $swiper_index => $groups) : ?>

            <div class="sec-bds-projects <?php echo ($swiper_index % 2 !== 0) ? 'is-custom bg-[#283377]' : ''; ?> relative overflow-hidden">
                <div class="container-second ml-auto">
                    <div class="relative">
                        <!-- Nav nằm ngoài swiper-slide, absolute theo cột trái -->
                        <div class="bds-nav top-12 max-lg:top-10 flex gap-2 w-fit absolute z-10 max-lg:right-0 <?php echo ($swiper_index % 2 !== 0) ? 'right-0' : 'lg:left-82.5'; ?>">
                            <button class="swiper-prev w-9 h-9 flex items-center justify-center
                           rounded-full border border-[#b3b4b9]
                           hover:border-pri hover:bg-pri group transition-colors duration-200"
                                aria-label="Dự án trước">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 4L6 8L10 12" stroke="#283377" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-white transition-colors" />
                                </svg>
                            </button>
                            <button class="swiper-next w-9 h-9 flex items-center justify-center
                           rounded-full border border-[#b3b4b9]
                           hover:border-pri hover:bg-pri group transition-colors duration-200"
                                aria-label="Dự án tiếp theo">
                                <svg class="scale-x-[-1]" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 4L6 8L10 12" stroke="#283377" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:stroke-white transition-colors" />
                                </svg>

                            </button>
                        </div>

                        <div class="swiper overflow-hidden">
                            <div class="swiper-wrapper">

                                <?php foreach ($groups as $group) :
                                    $items = $group['items'];
                                    $first = $items[0];
                                ?>
                                    <div class="swiper-slide">
                                        <div class="relative flex gap-10 overflow-hidden max-lg:flex-col max-md:gap-0! ">

                                            <!-- LEFT COLUMN -->
                                            <div class="bds-slide-left py-10 shrink-0 w-120 max-lg:w-full justify-center right flex flex-col gap-4 <?php echo ($swiper_index % 2 !== 0) ? 'text-white' : ''; ?>">

                                                <h3 class="font-bold text-[36px] max-xl:text-[28px] max-md:text-[22px]
                                           <?php echo ($swiper_index % 2 !== 0) ? 'text-white' : 'text-pri'; ?> tracking-[-0.04em] leading-normal w-[86%]">
                                                    <?php echo esc_html($group['title']); ?>
                                                </h3>

                                                <div class="flex flex-col gap-0.5 overflow-y-auto flex-1 pr-1 max-xl:max-h-60">
                                                    <?php foreach ($items as $ii => $item) :
                                                        $is_active = ($ii === 0);
                                                    ?>
                                                        <button type="button"
                                                            class="js-bds-item text-left w-full px-4 py-2.5 rounded-lg
                                                   transition-colors duration-200
                                                   <?php echo $is_active ? ($swiper_index % 2 !== 0 ? 'bg-white text-pri' : 'bg-pri text-white') : ''; ?>"
                                                            data-index="<?php echo $ii; ?>"
                                                            data-item-slug="<?php echo esc_attr(sanitize_title($item['name'])); ?>"
                                                            data-image="<?php echo esc_attr($item['image_url']); ?>"
                                                            data-name="<?php echo esc_attr($item['name']); ?>"
                                                            data-description="<?php echo esc_attr($item['description']); ?>"
                                                            data-location="<?php echo esc_attr($item['location']); ?>"
                                                            data-area="<?php echo esc_attr($item['area']); ?>"
                                                            data-scale="<?php echo esc_attr($item['scale']); ?>">
                                                            <span class="text-[16px] max-md:text-[14px] tracking-[-0.04em] leading-normal
                                                         <?php echo $is_active ? 'font-bold' : 'font-normal'; ?>">
                                                                <?php echo esc_html($item['name']); ?>
                                                            </span>
                                                        </button>
                                                    <?php endforeach; ?>
                                                </div>

                                            </div><!-- /left -->

                                            <!-- RIGHT COLUMN -->
                                            <div class="bds-slide-right flex-1 "
                                                style="transition: opacity 0.25s ease;">
                                                <div class="relative">
                                                    <div class="js-bds-info max-sm:bg-[#283377] sm:absolute bottom-0 left-0 right-0 z-2
                                            px-8 pb-8 sm:pt-16 max-xl:px-6 max-xl:pb-6 max-md:px-4 max-md:py-4
                                            flex flex-col gap-4">
                                                        <div class="flex flex-col gap-2 text-white">
                                                            <h4 class="js-bds-name font-bold
                                                   text-[28px] max-xl:text-[22px] max-md:text-[18px]
                                                   tracking-[-0.04em] leading-normal">
                                                                <?php echo esc_html($first['name']); ?>
                                                            </h4>
                                                            <p class="js-bds-desc text-[14px] max-md:text-[13px] leading-[1.6] ">
                                                                <?php echo esc_html($first['description']); ?>
                                                            </p>
                                                        </div>
                                                        <div class="flex flex-col gap-1">
                                                            <?php foreach ($meta_defs as $meta) :
                                                                $val = $first[$meta['key']] ?? '';
                                                            ?>
                                                                <div class="js-bds-meta flex items-center gap-2"
                                                                    data-key="<?php echo esc_attr($meta['key']); ?>"
                                                                    <?php echo !$val ? 'style="display:none"' : ''; ?>>
                                                                    <span class="w-4 h-4 shrink-0 block">
                                                                        <img src="<?php echo esc_url($icons_base . $meta['icon']); ?>"
                                                                            class="block w-full h-full object-contain brightness-0 invert"
                                                                            alt="">
                                                                    </span>
                                                                    <p class="text-[14px] text-white leading-normal">
                                                                        <span class="font-bold"><?php echo esc_html($meta['label']); ?>:</span>
                                                                        <span class="js-bds-meta-value"><?php echo esc_html($val); ?></span>
                                                                    </p>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                    <div class="aspect-1024/738 relative overflow-hidden">
                                                        <div class="js-bds-image absolute inset-0">
                                                            <img src="<?php echo esc_url($first['image_url']); ?>"
                                                                alt="<?php echo esc_attr($first['name']); ?>"
                                                                class="absolute inset-0 w-full h-full object-cover">
                                                        </div>

                                                        <div class="absolute inset-0 pointer-events-none z-1"
                                                            style="background: linear-gradient(to top, rgba(26,26,26,0.85) 0%, rgba(26,26,26,0.2) 50%, transparent 100%);"></div>


                                                    </div>
                                                </div>
                                            </div><!-- /right -->

                                        </div>
                                    </div><!-- /swiper-slide -->
                                <?php endforeach; ?>

                            </div><!-- /swiper-wrapper -->
                        </div><!-- /swiper -->

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php
// ══════════════════════════════════════════════════════════════════
// DỊCH VỤ & khác — grid 2 cột
// ══════════════════════════════════════════════════════════════════
else :
    $col_class = $term_slug === 'dich-vu' ? 'col-4' : 'col-4';
?>

    <section class="sec-du-an-category-projects section-pd-t section-pd-b">
        <div class="container">


            <div class="relative">
                <div class="row">
                    <?php foreach ($projects as $project) :
                        $image_id = get_field('image', $project->ID);
                        $image    = $image_id ? wp_get_attachment_image_url($image_id, 'large') : '';
                        $url      = get_field('url', $project->ID) ?: '#';
                    ?>
                        <div class="col <?php echo esc_attr($col_class); ?> max-lg:w-1/2! max-md:w-full!">
                            <div class="relative flex flex-col gap-2 group">
                                <div class="w-full aspect-4/3 rounded-lg overflow-hidden">
                                    <?php if ($image) : ?>
                                        <img src="<?php echo esc_url($image); ?>"
                                            alt="<?php echo esc_attr($project->post_title); ?>"
                                            loading="lazy"
                                            class="block w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                    <?php endif; ?>
                                </div>
                                <p class="font-bold text-[20px] max-xl:text-[18px] max-md:text-[16px] text-center  text-pri transition-colors duration-300 group-hover:text-sec">
                                    <?php echo esc_html($project->post_title); ?>
                                </p>
                                <!-- <a href="<?php echo esc_url($url); ?>" class="absolute inset-0 z-1" aria-label="<?php echo esc_attr($project->post_title); ?>"></a> -->
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>