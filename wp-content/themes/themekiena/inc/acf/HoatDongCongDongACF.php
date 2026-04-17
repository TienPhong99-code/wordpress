<?php

use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
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

            Textarea::make('Nội dung mô tả (HTML)', 'description')
                ->rows(10),

            Image::make('Ảnh minh hoạ', 'image')
                ->helperText('Ảnh full-width phía dưới mô tả. Kích thước đề xuất: 1728x741px.')
                ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                ->format('id'),

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
