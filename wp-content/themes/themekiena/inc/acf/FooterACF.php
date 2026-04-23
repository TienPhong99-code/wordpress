<?php

use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Location;

defined('ABSPATH') || exit;

add_action('acf/init', function () {
    register_extended_field_group([
        'title'    => 'Thiết lập footer',
        'style'    => 'default',
        'position' => 'acf_after_title',
        'location' => [
            Location::where('options_page', '==', 'theme-settings'),
        ],
        'fields' => [

            Tab::make('Thông tin công ty')
                ->placement('left'),

            Group::make('Thông tin công ty', 'footer_company')
                ->fields([
                    Image::make('Logo', 'logo')
                        ->helperText('Kích thước đề xuất: 230x80px')
                        ->acceptedFileTypes(['png', 'jpg', 'jpeg', 'gif', 'webp', 'avif', 'svg'])
                        ->format('id'),
                    Text::make('Tên công ty', 'name')
                        ->required(),
                    Text::make('Mã số thuế', 'tax'),
                    Text::make('Email', 'email'),
                    Textarea::make('Địa chỉ', 'address')
                        ->newLines('br')
                        ->rows(3),
                    Text::make('Hotline', 'hotline'),
                ]),

            Tab::make('Mạng xã hội')
                ->placement('left'),

            Repeater::make('Mạng xã hội', 'footer_socials')
                ->layout('block')
                ->collapsed('label')
                ->fields([
                    Image::make('Icon', 'icon')
                        ->acceptedFileTypes(['png', 'jpg', 'jpeg', 'gif', 'webp', 'avif', 'svg'])
                        ->format('id')
                        ->column(33)
                        ->required(),
                    Text::make('Nhãn', 'label')
                        ->column(33)
                        ->required(),
                    Text::make('Đường dẫn', 'url')
                        ->column(33),
                ]),

            Tab::make('Menu điều hướng')
                ->placement('left'),

            Repeater::make('Cột menu', 'footer_nav')
                ->layout('block')
                ->collapsed('heading')
                ->maxRows(6)
                ->fields([
                    Text::make('Tiêu đề cột', 'heading')
                        ->required(),
                    Repeater::make('Các liên kết', 'links')
                        ->layout('table')
                        ->fields([
                            Text::make('Nhãn', 'label')
                                ->required(),
                            Text::make('Đường dẫn', 'path')
                                ->helperText('VD: /gioi-thieu hoặc để trống cho trang chủ'),
                            Text::make('Section ID', 'section_id')
                                ->helperText('VD: about-vision (không cần #)'),
                        ]),
                ]),

            Tab::make('Bản đồ')
                ->placement('left'),

            Text::make('Google Maps embed URL', 'footer_map_url')
                ->helperText('Lấy link nhúng từ Google Maps → Chia sẻ → Nhúng bản đồ → copy src của iframe'),
        ],
    ]);
}, 10);
