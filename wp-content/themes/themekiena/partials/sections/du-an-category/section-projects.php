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

if (empty($projects)) return;

// ══════════════════════════════════════════════════════════════════
// GIÁO DỤC — alternating rows (text trái/phải xen kẽ), full-bleed
// ══════════════════════════════════════════════════════════════════
if ($term_slug === 'giao-duc') :
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
                <div class="item-prj">
                    <div class="container-second <?php echo $is_even ? '' : 'ml-auto'; ?>">
                        <div class="flex flex-col">
                            <div class="relative flex gap-10 overflow-hidden max-md:flex-col <?php echo $is_even ? 'flex-row-reverse' : ''; ?>">
                                <!-- Text column -->
                                <div class="shrink-0 w-[380px] max-md:w-full py-4 justify-center <?php echo esc_attr($text_pad); ?> flex flex-col gap-4">
                                    <h3 class="text-[36px] max-xl:text-[28px] max-md:text-[24px] font-bold text-pri leading-normal tracking-[-0.04em]">
                                        <?php echo esc_html($project->post_title); ?>
                                    </h3>
                                    <div class="relative flex flex-col gap-4">
                                        <?php if ($description) :
                                            $paragraphs = array_filter(array_map('trim', explode("\n", $description)));
                                            foreach ($paragraphs as $para) : ?>
                                                <p class="text-[16px] max-md:text-[14px] text-pri ">
                                                    <?php echo esc_html($para); ?>
                                                </p>
                                        <?php endforeach;
                                        endif; ?>
                                    </div>
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
// XÂY DỰNG — nhóm theo công ty, 4 cột
// ══════════════════════════════════════════════════════════════════
elseif ($term_slug === 'xay-dung') :

    $icons = [
        'done'   => get_template_directory_uri() . '/assets/images/du-an/xay-dung/icons/ic-status-done.png',
        'doing'  => get_template_directory_uri() . '/assets/images/du-an/xay-dung/icons/ic-status-doing.png',
        'future' => get_template_directory_uri() . '/assets/images/du-an/xay-dung/icons/ic-status-future.png',
    ];

    $status_labels = [
        'done'   => 'Đã thực hiện',
        'doing'  => 'Đang thực hiện',
        'future' => 'Sẽ thực hiện',
    ];

    $grouped = [];
    foreach ($projects as $project) {
        $company             = get_field('company', $project->ID) ?: 'Khác';
        $grouped[$company][] = $project;
    }
?>

    <section class="sec-du-an-category-projects section-pd-t section-pd-b">
        <div class="container">

            <div class="mb-8 max-xl:mb-5 max-md:mb-4 text-center">
                <h2 class="title-main">CÁC <span>DỰ ÁN</span></h2>
            </div>

            <?php foreach ($grouped as $company => $items) : ?>
                <p class="font-bold text-[36px] max-xl:text-[28px] max-md:text-[22px] text-pri mb-4 max-md:mb-3">
                    <?php echo esc_html($company); ?>
                </p>
                <div class="relative mb-6">
                    <div class="row">
                        <?php foreach ($items as $project) :
                            $image_id   = get_field('image', $project->ID);
                            $image      = $image_id ? wp_get_attachment_image_url($image_id, 'large') : '';
                            $url        = get_field('url', $project->ID) ?: '#';
                            $scope      = get_field('scope', $project->ID);
                            $status_key = get_field('status', $project->ID) ?: 'done';
                        ?>
                            <div class="col col-3 max-xl:col-4 max-md:w-full!">
                                <div class="relative flex flex-col gap-2 group mb-6 max-md:mb-4">
                                    <div class="w-full aspect-4/3 rounded-lg overflow-hidden bg-pri">
                                        <?php if ($image) : ?>
                                            <img src="<?php echo esc_url($image); ?>"
                                                alt="<?php echo esc_attr($project->post_title); ?>"
                                                loading="lazy"
                                                class="block w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                        <?php endif; ?>
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <p class="font-bold text-[20px] max-xl:text-[18px] max-md:text-[16px] text-pri leading-normal transition-colors duration-300 group-hover:text-sec">
                                            <?php echo esc_html($project->post_title); ?>
                                        </p>
                                        <div class="flex items-center gap-2">
                                            <div class="w-4 h-4 shrink-0">
                                                <img src="<?php echo esc_url($icons[$status_key]); ?>" class="block w-full h-full object-contain" alt="">
                                            </div>
                                            <p class="text-[16px] max-md:text-[14px] text-pri leading-normal">
                                                <?php echo esc_html($status_labels[$status_key] ?? ''); ?>
                                            </p>
                                        </div>
                                        <?php if ($scope) : ?>
                                            <div class="flex items-start gap-2">
                                                <div class="w-4 h-4 shrink-0 mt-0.75">
                                                    <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="block w-full h-full">
                                                        <path d="M8 1.5C5.515 1.5 3.5 3.515 3.5 6C3.5 9.375 8 14.5 8 14.5C8 14.5 12.5 9.375 12.5 6C12.5 3.515 10.485 1.5 8 1.5ZM8 7.5C7.175 7.5 6.5 6.825 6.5 6C6.5 5.175 7.175 4.5 8 4.5C8.825 4.5 9.5 5.175 9.5 6C9.5 6.825 8.825 7.5 8 7.5Z" fill="#283377" />
                                                    </svg>
                                                </div>
                                                <p class="text-[16px] max-md:text-[14px] text-pri leading-normal">
                                                    <?php echo esc_html($scope); ?>
                                                </p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <a href="<?php echo esc_url($url); ?>" class="absolute inset-0 z-1" aria-label="<?php echo esc_attr($project->post_title); ?>"></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </section>

<?php
// ══════════════════════════════════════════════════════════════════
// DỊCH VỤ & khác — grid 2 cột
// ══════════════════════════════════════════════════════════════════
else :
    $col_class = $term_slug === 'dich-vu' ? 'col-6' : 'col-4';
?>

    <section class="sec-du-an-category-projects section-pd-t section-pd-b">
        <div class="container">

            <div class="mb-8 max-xl:mb-5 max-md:mb-4 text-center">
                <h2 class="title-main">CÁC <span>DỰ ÁN</span></h2>
            </div>
            <div class="relative">
                <div class="row">
                    <?php foreach ($projects as $project) :
                        $image_id = get_field('image', $project->ID);
                        $image    = $image_id ? wp_get_attachment_image_url($image_id, 'large') : '';
                        $url      = get_field('url', $project->ID) ?: '#';
                    ?>
                        <div class="col <?php echo esc_attr($col_class); ?> max-md:w-full!">
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