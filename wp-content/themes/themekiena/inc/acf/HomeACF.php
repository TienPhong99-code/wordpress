<?php

use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Link;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
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
                        ->format('id')
                        ->required(),
                    Text::make('Alt text', 'alt'),
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
                    Text::make('Tiêu đề dự án', 'title')
                        ->required(),
                    Link::make('Link chi tiết', 'link'),
                ]),
        ],
    ], false);
}, 10);
