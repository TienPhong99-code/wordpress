<?php

use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\WYSIWYGEditor;
use Extended\ACF\Location;

defined('ABSPATH') || exit;

add_action('acf/init', function () {
    register_extended_field_group([
        'title' => 'Thiết lập trang giới thiệu',
        'style' => 'default',
        'position' => 'acf_after_title',
        'hide_on_screen' => [
            'the_content',
        ],
        'location' => [
            Location::where('page_template', '==', 'page-template/template-about.php',)
        ],
        'fields' => [
            Tab::make('Hành trình')
                ->placement('left'),
            Group::make('Section hành trình', 'section_journey')
                ->fields([
                    Repeater::make('Các giai đoạn', 'milestones')
                        ->collapsed('year')
                        ->layout('block')
                        ->fields([
                            Text::make('Năm', 'year')
                                ->required(),
                            Repeater::make('Nội dung', 'items')
                                ->layout('table')
                                ->fields([
                                    WYSIWYGEditor::make('Nội dung', 'content')
                                        ->disableMediaUpload()
                                        ->tabs('visual'),
                                ]),
                            Image::make('Hình ảnh', 'image')
                                ->helperText('Kích thước đề xuất: 697×523px')
                                ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                                ->format('id'),
                        ]),
                ]),
            Tab::make('Giải thưởng')
                ->placement('left'),
            Group::make('Section giải thưởng', 'section_awards')
                ->fields([
                    Repeater::make('Banner ngang (4 ảnh)', 'banners')
                        ->helperText('Kích thước đề xuất: 420×280px')
                        ->layout('table')
                        ->fields([
                            Image::make('Ảnh', 'image')
                                ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                                ->format('id')
                                ->required(),
                        ]),
                    Repeater::make('Thẻ giải thưởng (cards)', 'cards')
                        ->helperText('Kích thước đề xuất: 200×200px — 8 card mỗi hàng trên desktop')
                        ->collapsed('name')
                        ->layout('table')
                        ->fields([
                            Image::make('Ảnh', 'image')
                                ->acceptedFileTypes(['jpg', 'jpeg', 'png', 'webp', 'avif'])
                                ->format('id')
                                ->required(),
                            Text::make('Tên giải thưởng', 'name'),
                            Text::make('Alt text', 'alt'),
                        ]),
                ]),
        ],
    ]);
}, 10);
