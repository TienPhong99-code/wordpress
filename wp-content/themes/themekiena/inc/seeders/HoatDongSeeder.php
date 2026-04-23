<?php
defined('ABSPATH') || exit;

// Chạy 1 lần sau khi ACF và WP sẵn sàng
add_action('init', function () {
    if (get_option('mona_hoat_dong_seeded') || ! function_exists('update_field')) {
        return;
    }

    $pages = get_pages([
        'meta_key'   => '_wp_page_template',
        'meta_value' => 'page-template/template-hoat-dong-cong-dong.php',
        'number'     => 1,
    ]);

    if (empty($pages)) {
        return;
    }

    $post_id = $pages[0]->ID;

    // ── Import ảnh từ theme assets vào media library ──────────────
    $image_map = [];
    $image_paths = [
        'hoat-dong-cong-dong/hoat-dong-img-1.png',
        'hoat-dong-cong-dong/hoat-dong-img-2.png',
        'hoat-dong-cong-dong/hoat-dong-img-3.png',
        'hoat-dong-cong-dong/hoat-dong-img-4.png',
        'hoat-dong-cong-dong/hoat-dong-img-5.png',
        'hoat-dong-cong-dong/hoat-dong-img-6.png',
        'hoat-dong-cong-dong/hoat-dong-img-7.png',
        'hoat-dong-cong-dong/hoat-dong-img-8.png',
        'hoat-dong-cong-dong/hoat-dong-img-9.png',
    ];

    foreach ($image_paths as $relative_path) {
        $attach_id = mona_seed_import_theme_image($relative_path);
        if ($attach_id) {
            $image_map[$relative_path] = $attach_id;
        }
    }

    // ── Seed fields ────────────────────────────────────────────────
    update_field('hoat_dong_title',      'Các',         $post_id);
    update_field('hoat_dong_title_span', 'hoạt động',   $post_id);

    $items = [
        [
            'image'              => $image_map['hoat-dong-cong-dong/hoat-dong-img-1.png'] ?? null,
            'hoat_dong_item_title' => 'Từ thiện Bến Tre',
            'gallery'            => array_filter([
                $image_map['hoat-dong-cong-dong/hoat-dong-img-1.png'] ?? null,
                $image_map['hoat-dong-cong-dong/hoat-dong-img-2.png'] ?? null,
                $image_map['hoat-dong-cong-dong/hoat-dong-img-3.png'] ?? null,
            ]),
        ],
        [
            'image'              => $image_map['hoat-dong-cong-dong/hoat-dong-img-2.png'] ?? null,
            'hoat_dong_item_title' => 'Trao tặng học bổng cho trường tiểu học Mỹ Thuỷ',
            'gallery'            => array_filter([
                $image_map['hoat-dong-cong-dong/hoat-dong-img-2.png'] ?? null,
                $image_map['hoat-dong-cong-dong/hoat-dong-img-4.png'] ?? null,
            ]),
        ],
        [
            'image'              => $image_map['hoat-dong-cong-dong/hoat-dong-img-3.png'] ?? null,
            'hoat_dong_item_title' => 'Trao tặng học bổng cho trường Mầm Non Sơn Ca',
            'gallery'            => array_filter([
                $image_map['hoat-dong-cong-dong/hoat-dong-img-3.png'] ?? null,
                $image_map['hoat-dong-cong-dong/hoat-dong-img-5.png'] ?? null,
                $image_map['hoat-dong-cong-dong/hoat-dong-img-6.png'] ?? null,
            ]),
        ],
        [
            'image'              => $image_map['hoat-dong-cong-dong/hoat-dong-img-7.png'] ?? null,
            'hoat_dong_item_title' => 'Trao tặng học bổng cho trường tiểu học Mỹ Thuỷ 2015 - 2016',
            'gallery'            => array_filter([
                $image_map['hoat-dong-cong-dong/hoat-dong-img-7.png'] ?? null,
                $image_map['hoat-dong-cong-dong/hoat-dong-img-8.png'] ?? null,
            ]),
        ],
        [
            'image'              => $image_map['hoat-dong-cong-dong/hoat-dong-img-8.png'] ?? null,
            'hoat_dong_item_title' => 'Tài trợ chương trình học tiếng anh cho cụm trường Cát Lái',
            'gallery'            => array_filter([
                $image_map['hoat-dong-cong-dong/hoat-dong-img-8.png'] ?? null,
                $image_map['hoat-dong-cong-dong/hoat-dong-img-9.png'] ?? null,
                $image_map['hoat-dong-cong-dong/hoat-dong-img-1.png'] ?? null,
            ]),
        ],
        [
            'image'              => $image_map['hoat-dong-cong-dong/hoat-dong-img-9.png'] ?? null,
            'hoat_dong_item_title' => 'Trao tặng học bổng cho trường tiểu học Mỹ Thuỷ',
            'gallery'            => array_filter([
                $image_map['hoat-dong-cong-dong/hoat-dong-img-9.png'] ?? null,
                $image_map['hoat-dong-cong-dong/hoat-dong-img-1.png'] ?? null,
            ]),
        ],
        [
            'image'              => $image_map['hoat-dong-cong-dong/hoat-dong-img-4.png'] ?? null,
            'hoat_dong_item_title' => 'Chương trình từ thiện Phú Yên',
            'gallery'            => array_filter([
                $image_map['hoat-dong-cong-dong/hoat-dong-img-4.png'] ?? null,
                $image_map['hoat-dong-cong-dong/hoat-dong-img-5.png'] ?? null,
                $image_map['hoat-dong-cong-dong/hoat-dong-img-6.png'] ?? null,
            ]),
        ],
        [
            'image'              => $image_map['hoat-dong-cong-dong/hoat-dong-img-5.png'] ?? null,
            'hoat_dong_item_title' => 'Trao tặng học bổng cho sinh viên trường UEF',
            'gallery'            => array_filter([
                $image_map['hoat-dong-cong-dong/hoat-dong-img-5.png'] ?? null,
                $image_map['hoat-dong-cong-dong/hoat-dong-img-7.png'] ?? null,
            ]),
        ],
        [
            'image'              => $image_map['hoat-dong-cong-dong/hoat-dong-img-6.png'] ?? null,
            'hoat_dong_item_title' => 'Tài trợ học bổng cho trường UEF',
            'gallery'            => array_filter([
                $image_map['hoat-dong-cong-dong/hoat-dong-img-6.png'] ?? null,
                $image_map['hoat-dong-cong-dong/hoat-dong-img-8.png'] ?? null,
                $image_map['hoat-dong-cong-dong/hoat-dong-img-9.png'] ?? null,
            ]),
        ],
    ];

    // Lọc bỏ item không có ảnh
    $items = array_values(array_filter($items, fn($item) => ! empty($item['image'])));

    if (! empty($items)) {
        update_field('hoat_dong_items', $items, $post_id);
    }

    update_option('mona_hoat_dong_seeded', true);
}, 20);

/**
 * Copy ảnh từ theme assets sang media library, trả về attachment ID.
 * Nếu đã tồn tại (theo tên file) thì trả về ID cũ.
 */
function mona_seed_import_theme_image(string $relative_path): ?int
{
    $file_path = MONA_THEME_PATH . '/assets/images/' . $relative_path;
    if (! file_exists($file_path)) {
        return null;
    }

    $filename = basename($file_path);

    // Kiểm tra đã import chưa
    $existing = get_posts([
        'post_type'      => 'attachment',
        'post_status'    => 'any',
        'posts_per_page' => 1,
        'meta_query'     => [[
            'key'   => '_mona_seeded_from',
            'value' => $relative_path,
        ]],
    ]);

    if (! empty($existing)) {
        return $existing[0]->ID;
    }

    // Copy file vào uploads
    $upload_dir = wp_upload_dir();
    $dest_path  = $upload_dir['path'] . '/' . wp_unique_filename($upload_dir['path'], $filename);

    if (! copy($file_path, $dest_path)) {
        return null;
    }

    $file_type  = wp_check_filetype($dest_path);
    $attach_id  = wp_insert_attachment([
        'post_mime_type' => $file_type['type'],
        'post_title'     => pathinfo($filename, PATHINFO_FILENAME),
        'post_content'   => '',
        'post_status'    => 'inherit',
    ], $dest_path);

    if (is_wp_error($attach_id)) {
        return null;
    }

    require_once ABSPATH . 'wp-admin/includes/image.php';
    wp_update_attachment_metadata($attach_id, wp_generate_attachment_metadata($attach_id, $dest_path));
    update_post_meta($attach_id, '_mona_seeded_from', $relative_path);

    return $attach_id;
}
