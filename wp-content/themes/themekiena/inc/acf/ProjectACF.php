<?php

use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Location;

defined('ABSPATH') || exit;

// ACF fields cho CPT project
add_action('acf/init', function () {
    mona_regist_acf_field_group([
        'title'    => 'Thông tin dự án',
        'style'    => 'default',
        'position' => 'acf_after_title',
        'hide_on_screen' => ['the_content'],
        'location' => [
            Location::where('post_type', '==', 'project'),
        ],
        'fields' => [
            Tab::make('Thông tin')
                ->placement('left'),

            Image::make('Ảnh đại diện', 'banner')
                ->helperText('Kích thước đề xuất: 596x447px')
                ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                ->format('id')
                ->required(),

            Text::make('Vị trí', 'location')
                ->required(),

            Text::make('Diện tích', 'area'),

            Repeater::make('Quy mô', 'scale_items')
                ->helperText('Danh sách các loại hình trong dự án')
                ->layout('block')
                ->collapsed('item')
                ->fields([
                    Text::make('Hạng mục', 'item')->required(),
                ]),

            Textarea::make('Mô tả', 'description')
                ->helperText('Mô tả ngắn xuất hiện trên card dự án (tuỳ chọn)')
                ->rows(3),
        ],
    ], false);
}, 10);

// ACF fields cho page template Dự án
add_action('acf/init', function () {
    mona_regist_acf_field_group([
        'title'    => 'Trang Dự án — Hero',
        'style'    => 'default',
        'position' => 'acf_after_title',
        'hide_on_screen' => ['the_content'],
        'location' => [
            Location::where('page_template', '==', 'page-template/template-projects.php'),
        ],
        'fields' => [
            Image::make('Ảnh nền hero', 'hero_image')
                ->helperText('Ảnh nền banner trang Dự án — kích thước đề xuất: 1920x1019px')
                ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                ->format('id')
                ->required(),
        ],
    ], false);
}, 10);

// ACF fields cho taxonomy project_category
add_action('acf/init', function () {
    mona_regist_acf_field_group([
        'title'    => 'Thông tin danh mục dự án',
        'style'    => 'default',
        'position' => 'acf_after_title',
        'hide_on_screen' => ['the_content'],
        'location' => [
            Location::where('taxonomy', '==', 'project_category'),
        ],
        'fields' => [
            Tab::make('Thông tin')
                ->placement('left'),

            Image::make('Ảnh danh mục', 'image')
                ->helperText('Ảnh hiển thị trên grid trang Dự án — kích thước đề xuất: 596x447px')
                ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                ->format('id')
                ->required(),

            Textarea::make('Mô tả danh mục', 'category_description')
                ->helperText('Đoạn mô tả xuất hiện ở hero khi vào trang danh mục')
                ->rows(5),
        ],
    ], false);
}, 10);
