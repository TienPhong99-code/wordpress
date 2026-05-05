<?php

use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Number;
use Extended\ACF\Fields\RadioButton;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\URL;
use Extended\ACF\Fields\WYSIWYGEditor;
use Extended\ACF\Location;

defined('ABSPATH') || exit;

// ══════════════════════════════════════════════════════════════════
// PAGE TEMPLATE — Trang Dự án (template-du-an.php)
// Fields: hero_image, hero_subtitle, hero_desc, categories
// ══════════════════════════════════════════════════════════════════
add_action('acf/init', function () {
    mona_regist_acf_field_group([
        'title'          => 'Thiết lập trang Dự án',
        'style'          => 'default',
        'position'       => 'acf_after_title',
        'hide_on_screen' => ['the_content'],
        'location'       => [
            Location::where('page_template', '==', 'page-template/template-danh-muc-du-an.php'),
        ],
        'fields' => [

            Tab::make('Hero')->placement('left'),

            Image::make('Ảnh nền hero', 'hero_image')
                ->helperText('Kích thước đề xuất: 1728x900px')
                ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                ->format('id'),

            WYSIWYGEditor::make('Thông tin', 'hero_content')
                ->helperText('Tự chỉnh màu sắc, in đậm trực tiếp trong editor.')
                ->toolbar(['bold', 'italic', 'forecolor', 'removeformat', '|', 'undo', 'redo'])
                ->tabs('visual'),

        ],
    ], false);
}, 10);

// ══════════════════════════════════════════════════════════════════
// CPT — Dự án (post_type = du_an)
// RadioButton chọn loại → field ẩn/hiện ngay, không cần save trước
// Hook save_post tự động gán taxonomy khớp với loại đã chọn
// ══════════════════════════════════════════════════════════════════
add_action('acf/init', function () {
    mona_regist_acf_field_group([
        'title'          => 'Thông tin dự án',
        'style'          => 'default',
        'position'       => 'acf_after_title',
        'hide_on_screen' => ['the_content'],
        'location'       => [
            Location::where('post_type', '==', 'du_an'),
        ],
        'fields' => [

            // ── Tên dự án (thay thế post_title) ─────────
            Text::make('Tên dự án', 'ten_du_an')
                ->required(),

            // ── Thứ tự hiển thị ──────────────────────────
            Number::make('Thứ tự hiển thị', 'thu_tu')
                ->helperText('Số nhỏ hơn hiển thị trước. Ví dụ: 1, 2, 3…')
                ->default(0),

            // ── Loại dự án (radio) ───────────────────────
            RadioButton::make('Loại dự án', 'loai_du_an')
                ->choices([
                    'giao-duc'     => 'Giáo dục',
                    'dich-vu'      => 'Dịch vụ',
                    'xay-dung'     => 'Xây dựng',
                    'bat-dong-san' => 'Bất động sản',
                ])
                ->default('giao-duc')
                ->layout('horizontal')
                ->required(),

            // ── Ảnh (tất cả loại) ────────────────────────
            Image::make('Ảnh dự án', 'image')
                ->helperText('Kích thước đề xuất: 800x600px (4:3). Có thể để trống nếu chưa có ảnh.')
                ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                ->format('id'),

            // ── URL (tất cả loại) ────────────────────────
            URL::make('URL dự án', 'url')
                ->helperText('Link tới trang chi tiết. Để trống nếu chưa có.'),

            // ── Giáo dục / Dịch vụ ───────────────────────
            Textarea::make('Mô tả', 'description')
                ->helperText('Mô tả ngắn về dự án.')
                ->conditionalLogic([
                    ConditionalLogic::where('loai_du_an', '==', 'giao-duc'),
                ])
                ->conditionalLogic([
                    ConditionalLogic::where('loai_du_an', '==', 'dich-vu'),
                ]),

            Text::make('Vị trí', 'location')
                ->helperText('Ví dụ: Quận 7, TP.HCM')
                ->conditionalLogic([
                    ConditionalLogic::where('loai_du_an', '==', 'giao-duc'),
                ])
                ->conditionalLogic([
                    ConditionalLogic::where('loai_du_an', '==', 'dich-vu'),
                ]),

            Text::make('Diện tích', 'area')
                ->helperText('Ví dụ: 10.000 m²')
                ->conditionalLogic([
                    ConditionalLogic::where('loai_du_an', '==', 'giao-duc'),
                ])
                ->conditionalLogic([
                    ConditionalLogic::where('loai_du_an', '==', 'dich-vu'),
                ]),

            Text::make('Quy mô', 'scale')
                ->helperText('Ví dụ: 2.000 học sinh')
                ->conditionalLogic([
                    ConditionalLogic::where('loai_du_an', '==', 'giao-duc'),
                ])
                ->conditionalLogic([
                    ConditionalLogic::where('loai_du_an', '==', 'dich-vu'),
                ]),

            // ── Bất động sản: outer = Swiper, middle = slide, inner = dự án con ──
            Repeater::make('Danh sách hiển thị các dự án', 'bds_swiper_groups')
                ->helperText('Add Row ở đây = thêm 1 item mới trên trang.')
                ->layout('block')
                ->conditionalLogic([
                    ConditionalLogic::where('loai_du_an', '==', 'bat-dong-san'),
                ])
                ->fields([
                    Repeater::make('Các nhóm dự án (slides)', 'slides')
                        ->helperText('Add Row ở đây = thêm 1 slide trong Swiper này.')
                        ->layout('block')
                        ->fields([
                            Text::make('Tiêu đề nhóm', 'title')
                                ->helperText('Hiển thị ở cột trái. Ví dụ: Khu đô thị Cát Lái')
                                ->required(),
                            Repeater::make('Danh sách dự án', 'items')
                                ->helperText('Add Row ở đây = thêm 1 dự án con trong slide.')
                                ->layout('block')
                                ->fields([
                                    Text::make('Tên dự án', 'name')->required(),
                                    Image::make('Ảnh', 'image')
                                        ->helperText('Kích thước đề xuất: 1200x800px')
                                        ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                                        ->format('id'),
                                    Textarea::make('Mô tả', 'description')
                                        ->helperText('Mô tả ngắn hiển thị ở cột phải.'),
                                    Text::make('Vị trí', 'location')
                                        ->helperText('Ví dụ: Khu đô thị Cát Lái, TP. Thủ Đức, TP.HCM'),
                                    Text::make('Diện tích', 'area')
                                        ->helperText('Ví dụ: 1,55 ha'),
                                    Text::make('Quy mô', 'scale')
                                        ->helperText('Ví dụ: 751 căn hộ'),
                                ]),
                        ]),
                ]),

            // ── Xây dựng: Đơn vị thực hiện ───────────────
            Text::make('Đơn vị thực hiện', 'company')
                ->helperText('Ví dụ: VERTECONS. Dùng để nhóm dự án theo công ty.')
                ->conditionalLogic([
                    ConditionalLogic::where('loai_du_an', '==', 'xay-dung'),
                ]),

            // ── Xây dựng: Phạm vi ────────────────────────
            Text::make('Phạm vi thực hiện', 'scope')
                ->helperText('Ví dụ: Cảnh quan - cây xanh, Hạ tầng kĩ thuật…')
                ->conditionalLogic([
                    ConditionalLogic::where('loai_du_an', '==', 'xay-dung'),
                ]),

            // ── Xây dựng: Trạng thái ─────────────────────
            Select::make('Trạng thái', 'status')
                ->choices([
                    'done'   => 'Đã thực hiện',
                    'doing'  => 'Đang thực hiện',
                    'future' => 'Sẽ thực hiện',
                ])
                ->default('done')
                ->helperText('Hiển thị icon trạng thái bên dưới tên dự án.')
                ->conditionalLogic([
                    ConditionalLogic::where('loai_du_an', '==', 'xay-dung'),
                ]),

        ],
    ], false);
}, 10);

// ══════════════════════════════════════════════════════════════════
// Hook: ẩn ô title mặc định của WP trên trang edit CPT du_an
// ══════════════════════════════════════════════════════════════════
add_action('admin_head', function () {
    $screen = get_current_screen();
    if ($screen && $screen->post_type === 'du_an') {
        echo '<style>#titlediv { display: none !important; }</style>';
    }
});

// ══════════════════════════════════════════════════════════════════
// Hook: pre-populate field ten_du_an từ post_title khi mở bài cũ
// ══════════════════════════════════════════════════════════════════
add_filter('acf/load_value/name=ten_du_an', function ($value, $post_id) {
    if (! $value && get_post_type($post_id) === 'du_an') {
        $post = get_post($post_id);
        if ($post && $post->post_title && $post->post_title !== 'Auto Draft') {
            return $post->post_title;
        }
    }
    return $value;
}, 10, 3);

// ══════════════════════════════════════════════════════════════════
// Hook: lưu ten_du_an → post_title, gán taxonomy theo loai_du_an
// ══════════════════════════════════════════════════════════════════
add_action('acf/save_post', function ($post_id) {
    if (get_post_type($post_id) !== 'du_an') {
        return;
    }

    // Sync tên dự án → post_title, thứ tự → menu_order
    $ten     = get_field('ten_du_an', $post_id);
    $thu_tu  = get_field('thu_tu', $post_id);
    $update  = ['ID' => $post_id];
    if ($ten) {
        $update['post_title'] = sanitize_text_field($ten);
        $update['post_name']  = sanitize_title($ten);
    }
    if ($thu_tu !== '' && $thu_tu !== null) {
        $update['menu_order'] = (int) $thu_tu;
    }
    if (count($update) > 1) {
        wp_update_post($update);
    }

    // Tự động gán taxonomy theo loại đã chọn
    $loai = get_field('loai_du_an', $post_id);
    if ($loai) {
        $term = get_term_by('slug', $loai, 'danh_muc_du_an');
        if ($term) {
            wp_set_object_terms($post_id, $term->term_id, 'danh_muc_du_an');
        }
    }
}, 20);

// ══════════════════════════════════════════════════════════════════
// PAGE TEMPLATE — Dự án Dịch vụ (template-du-an-dich-vu.php)
// Fields: hero_image, hero_desc, thu_tu
// ══════════════════════════════════════════════════════════════════
add_action('acf/init', function () {
    mona_regist_acf_field_group([
        'title'          => 'Thiết lập trang Dự án Dịch vụ',
        'style'          => 'default',
        'position'       => 'acf_after_title',
        'hide_on_screen' => ['the_content'],
        'location'       => [
            Location::where('page_template', '==', 'page-template/template-du-an-dich-vu.php'),
        ],
        'fields' => [

            Tab::make('Thông tin chung')->placement('left'),

            Number::make('Thứ tự hiển thị', 'thu_tu')
                ->helperText('Số nhỏ hơn hiển thị trước trong danh sách trang dự án.')
                ->default(0),

            Tab::make('Hero')->placement('left'),

            Image::make('Ảnh nền hero', 'hero_image')
                ->helperText('Kích thước đề xuất: 1728x900px')
                ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                ->format('id'),

            Repeater::make('Mô tả', 'hero_desc')
                ->helperText('Mỗi hàng là một đoạn văn hiển thị trong hero.')
                ->layout('block')
                ->fields([
                    WYSIWYGEditor::make('Đoạn văn', 'paragraph')->required(),
                ]),

        ],
    ], false);
}, 10);

// ══════════════════════════════════════════════════════════════════
// PAGE TEMPLATE — Dự án Giáo dục (template-du-an-giao-duc.php)
// Fields: hero_image, hero_desc
// ══════════════════════════════════════════════════════════════════
add_action('acf/init', function () {
    mona_regist_acf_field_group([
        'title'          => 'Thiết lập trang Dự án Giáo dục',
        'style'          => 'default',
        'position'       => 'acf_after_title',
        'hide_on_screen' => ['the_content'],
        'location'       => [
            Location::where('page_template', '==', 'page-template/template-du-an-giao-duc.php'),
        ],
        'fields' => [

            Tab::make('Hero')->placement('left'),

            Image::make('Ảnh nền hero', 'hero_image')
                ->helperText('Kích thước đề xuất: 1728x900px')
                ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                ->format('id'),

            Repeater::make('Mô tả', 'hero_desc')
                ->helperText('Mỗi hàng là một đoạn văn hiển thị trong hero.')
                ->layout('block')
                ->fields([
                    WYSIWYGEditor::make('Đoạn văn', 'paragraph')->required(),
                ]),

        ],
    ], false);
}, 10);

// ══════════════════════════════════════════════════════════════════
// PAGE TEMPLATE — Dự án Xây dựng (template-du-an-xay-dung.php)
// Fields: hero_image, hero_desc
// ══════════════════════════════════════════════════════════════════
add_action('acf/init', function () {
    mona_regist_acf_field_group([
        'title'          => 'Thiết lập trang Dự án Xây dựng',
        'style'          => 'default',
        'position'       => 'acf_after_title',
        'hide_on_screen' => ['the_content'],
        'location'       => [
            Location::where('page_template', '==', 'page-template/template-du-an-xay-dung.php'),
        ],
        'fields' => [

            Tab::make('Hero')->placement('left'),

            Image::make('Ảnh nền hero', 'hero_image')
                ->helperText('Kích thước đề xuất: 1728x900px')
                ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                ->format('id'),

            Repeater::make('Mô tả', 'hero_desc')
                ->helperText('Mỗi hàng là một đoạn văn hiển thị trong hero.')
                ->layout('block')
                ->fields([
                    WYSIWYGEditor::make('Đoạn văn', 'paragraph')->required(),
                ]),

        ],
    ], false);
}, 10);

// ══════════════════════════════════════════════════════════════════
// TAXONOMY — Danh mục dự án
// Fields: image, url — hiện trên form tạo/sửa taxonomy term
// ══════════════════════════════════════════════════════════════════
add_action('acf/init', function () {
    mona_regist_acf_field_group([
        'title'    => 'Thông tin danh mục dự án',
        'style'    => 'default',
        'location' => [
            Location::where('taxonomy', '==', 'danh_muc_du_an'),
        ],
        'fields' => [

            Number::make('Thứ tự hiển thị', 'order')
                ->helperText('Số nhỏ hơn hiển thị trước. Ví dụ: 1, 2, 3…')
                ->default(0),

            Tab::make('Ảnh danh mục')->placement('left'),

            Image::make('Ảnh đại diện', 'image')
                ->helperText('Hiển thị trên trang Danh mục dự án (lưới 2×2). Kích thước đề xuất: 800x600px (4:3).')
                ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                ->format('id'),

            Tab::make('Hero trang chi tiết')->placement('left'),

            Image::make('Ảnh nền hero', 'hero_image')
                ->helperText('Ảnh nền hiển thị ở phần hero trang chi tiết danh mục. Kích thước đề xuất: 1728x900px.')
                ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                ->format('id'),

            Repeater::make('Mô tả', 'hero_desc')
                ->helperText('Mỗi hàng là một đoạn văn trong hero. Hỗ trợ in đậm với class "text-sec" để tô màu đỏ.')
                ->layout('block')
                ->fields([
                    WYSIWYGEditor::make('Đoạn văn', 'paragraph')->required(),
                ]),

            Tab::make('Phạm vi hoạt động (Xây dựng)')->placement('left'),

            Repeater::make('Các tab phạm vi', 'scope_tabs')
                ->helperText('Mỗi hàng = 1 accordion item. Chỉ dùng cho danh mục Xây dựng.')
                ->layout('block')
                ->fields([
                    Text::make('Tiêu đề', 'tab_title')
                        ->helperText('Ví dụ: Thi công hạ tầng kỹ thuật')
                        ->required(),
                    Image::make('Ảnh', 'tab_image')
                        ->helperText('Hiển thị bên trái khi tab active. Kích thước đề xuất: 696×522px (4:3).')
                        ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                        ->format('url'),
                    Repeater::make('Danh sách hạng mục', 'tab_items')
                        ->helperText('Mỗi hàng = 1 bullet point hiện ra khi accordion mở.')
                        ->layout('table')
                        ->fields([
                            Image::make('Icon', 'item_icon')
                                ->helperText('Icon 16×16px. Để trống nếu không có.')
                                ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'svg'])
                                ->format('url'),
                            Text::make('Nội dung', 'item_text')
                                ->helperText('Ví dụ: San nền, đường giao thông')
                                ->required(),
                        ]),
                ]),


        ],
    ], false);
}, 10);
