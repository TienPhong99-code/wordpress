<?php

use Extended\ACF\Fields\Gallery;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\WYSIWYGEditor;
use Extended\ACF\Fields\URL;
use Extended\ACF\Location;

defined('ABSPATH') || exit;

// ══════════════════════════════════════════════════════════════════
// PAGE TEMPLATE — Hoạt động cộng đồng
// ══════════════════════════════════════════════════════════════════
add_action('acf/init', function () {
    mona_regist_acf_field_group([
        'title'          => 'Thiết lập trang Hoạt động cộng đồng',
        'style'          => 'default',
        'position'       => 'acf_after_title',
        'hide_on_screen' => ['the_content'],
        'location'       => [
            Location::where('page_template', '==', 'page-template/template-hoat-dong-cong-dong.php'),
        ],
        'fields' => [

            // ── Tab: Section giới thiệu ──────────────────
            Tab::make('Section giới thiệu')->placement('left'),

            Text::make('Tiêu đề (màu xanh)', 'title')
                ->helperText('Dòng đầu tiêu đề — màu xanh. Ví dụ: Hoạt động')
                ->default('Hoạt động'),

            Text::make('Tiêu đề (màu đỏ)', 'title_span')
                ->helperText('Dòng thứ hai tiêu đề — màu đỏ. Ví dụ: cộng đồng')
                ->default('cộng đồng'),

            WYSIWYGEditor::make('Nội dung mô tả', 'description')
                ->tabs('all')
                ->toolbar('full')
                ->disableMediaUpload(),

            Image::make('Ảnh minh hoạ', 'image')
                ->helperText('Ảnh full-width phía dưới mô tả. Kích thước đề xuất: 1728x741px.')
                ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                ->format('id'),

            // ── Tab: Các hoạt động ──────────────────────
            Tab::make('Các hoạt động')->placement('left'),

            Text::make('Tiêu đề (trắng)', 'hoat_dong_title')
                ->helperText('Phần tiêu đề màu trắng. Ví dụ: Các')
                ->default('Các'),

            Text::make('Tiêu đề (màu đỏ)', 'hoat_dong_title_span')
                ->helperText('Phần tiêu đề màu đỏ. Ví dụ: hoạt động')
                ->default('hoạt động'),

            Repeater::make('Danh sách hoạt động', 'hoat_dong_items')
                ->helperText('Mỗi item là 1 ô trong lưới Masonry. Có thể thêm bao nhiêu tuỳ ý.')
                ->layout('block')
                ->collapsed('hoat_dong_item_title')
                ->fields([
                    Image::make('Ảnh thumbnail', 'image')
                        ->helperText('Ảnh đại diện hiển thị trên lưới. Kích thước đề xuất: 800x600px.')
                        ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                        ->format('url')
                        ->required(),

                    Text::make('Tiêu đề', 'hoat_dong_item_title')
                        ->required(),

                    Gallery::make('Thư viện ảnh', 'gallery')
                        ->helperText('Ảnh hiển thị trong lightbox khi click vào item. Nếu để trống sẽ dùng ảnh thumbnail.')
                        ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                        ->format('url'),
                ]),

            // ── Tab: Tư liệu video ───────────────────────
            Tab::make('Tư liệu video')->placement('left'),

            Text::make('Tiêu đề section (màu xanh)', 'video_title')
                ->helperText('Ví dụ: Các')
                ->default('Các'),

            Text::make('Tiêu đề section (màu đỏ)', 'video_title_span')
                ->helperText('Ví dụ: Tư liệu')
                ->default('Tư liệu'),

            Repeater::make('Danh sách video', 'videos')
                ->collapsed('video_item_title')
                ->layout('block')
                ->fields([
                    Text::make('Tiêu đề', 'video_item_title')
                        ->required(),

                    URL::make('Link video', 'video_item_url')
                        ->helperText('YouTube URL (https://www.youtube.com/watch?v=...) hoặc đường dẫn file .mp4')
                        ->required(),

                    Image::make('Ảnh thumbnail (tuỳ chọn)', 'video_item_thumb')
                        ->helperText('Để trống → tự lấy thumbnail YouTube. Kích thước đề xuất: 800x450px (16:9).')
                        ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                        ->format('url'),
                ]),

        ],
    ], false);
}, 10);
