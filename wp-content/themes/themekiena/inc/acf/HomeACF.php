<?php

use Extended\ACF\Fields\File;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Link;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Taxonomy;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\TrueFalse;
use Extended\ACF\Location;

defined('ABSPATH') || exit;

add_action('acf/init', function () {
    mona_regist_acf_field_group([
        'title' => 'Thiết lập trang chủ',
        'style' => 'default',
        'position' => 'acf_after_title',
        'hide_on_screen' => [
            'the_content',
        ],
        'location' => [
            Location::where('page_type', '==', 'front_page'),
        ],
        'fields' => [
            Tab::make('Banner')
                ->placement('left'),
            Repeater::make('Danh sách banner', 'banners')
                ->helperText('Kích thước đề xuất: 1728x800px')
                ->layout('block')
                ->collapsed('image')
                ->fields([
                    Image::make('Ảnh', 'image')
                        ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                        ->format('id'),
                    Text::make('Alt text', 'alt'),
                    File::make('Video (tuỳ chọn)', 'video')
                        ->helperText('Nếu có video, video sẽ được ưu tiên hiển thị thay ảnh. Định dạng: mp4, webm')
                        ->acceptedFileTypes(['mp4', 'webm'])
                        ->format('url'),
                ]),

            Tab::make('Lĩnh vực hoạt động')
                ->placement('left'),
            Repeater::make('Danh sách lĩnh vực', 'works')
                ->helperText('Kích thước đề xuất: 600x389px')
                ->layout('block')
                ->collapsed('title')
                ->fields([
                    Image::make('Ảnh', 'image')
                        ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                        ->format('id')
                        ->required(),
                    Text::make('Tiêu đề', 'title')
                        ->required(),
                    Taxonomy::make('Danh mục dự án', 'category')
                        ->taxonomy('danh_muc_du_an')
                        ->appearance('select')
                        ->format('id')
                        ->nullable(),
                ]),

            Tab::make('Đối tác')
                ->placement('left'),
            Repeater::make('Danh sách đối tác', 'partners')
                ->helperText('Logo đối tác — nền trong suốt (PNG)')
                ->layout('block')
                ->collapsed('name')
                ->fields([
                    Image::make('Logo', 'image')
                        ->acceptedFileTypes(['png', 'svg', 'jpg', 'jpeg', 'webp'])
                        ->format('id')
                        ->required(),
                    Text::make('Tên đối tác', 'name'),
                ]),

            Tab::make('Dự án')
                ->placement('left'),
            Repeater::make('Danh sách dự án', 'projects')
                ->helperText('Kích thước ảnh đề xuất: 1728x800px')
                ->layout('block')
                ->collapsed('title')
                ->fields([
                    Image::make('Ảnh', 'image')
                        ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                        ->format('id')
                        ->required(),
                    Text::make('Loại dự án', 'type')
                        ->helperText('Ví dụ: Khu căn hộ cao cấp, Khu biệt thự đảo'),
                    Text::make('Tiêu đề dự án', 'title')
                        ->required(),
                    Link::make('Link chi tiết', 'link'),
                ]),

            Tab::make('Popup dự án')
                ->placement('left'),
            TrueFalse::make('Hiển thị popup', 'popup_show')
                ->stylized()
                ->default(0),
            Textarea::make('Tiêu đề (phần thường)', 'popup_title_1')
                ->helperText('Nhấn Enter để xuống hàng trong tiêu đề.')
                ->rows(2)
                ->default('Ra mắt dự án khu căn hộ cao cấp'),
            Text::make('Tiêu đề (phần nổi bật — màu đỏ)', 'popup_title_2')
                ->default('ARCADIA AT LAVILA'),
            Image::make('Ảnh dự án', 'popup_image')
                ->helperText('Kích thước đề xuất: 680x780px')
                ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                ->format('id'),
            Link::make('Link nút "Chi tiết dự án"', 'popup_link'),
        ],
    ], false);
}, 10);
