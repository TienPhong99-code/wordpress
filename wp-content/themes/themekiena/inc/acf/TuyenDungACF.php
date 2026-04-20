<?php

use Extended\ACF\Fields\RadioButton;
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\URL;
use Extended\ACF\Location;

defined('ABSPATH') || exit;

// ══════════════════════════════════════════════════════
// PAGE — Trang tuyển dụng (template-tuyen-dung.php)
// Fields: title, title_span
// ══════════════════════════════════════════════════════
add_action('acf/init', function () {
    mona_regist_acf_field_group([
        'title'          => 'Thiết lập trang Tuyển dụng',
        'style'          => 'default',
        'position'       => 'acf_after_title',
        'hide_on_screen' => ['the_content'],
        'location'       => [
            Location::where('page_template', '==', 'page-template/template-tuyen-dung.php'),
        ],
        'fields' => [
            Text::make('Tiêu đề (phần 1)', 'td_title')
                ->helperText('VD: Vị trí'),

            Text::make('Tiêu đề (phần đỏ)', 'td_title_span')
                ->helperText('VD: TUYỂN DỤNG — hiển thị màu đỏ'),
        ],
    ], false);
}, 10);

// ══════════════════════════════════════════════════════
// CPT — Vị trí tuyển dụng (post_type = tuyen_dung)
// Fields: status, salary, work_type, location
// ══════════════════════════════════════════════════════
add_action('acf/init', function () {
    mona_regist_acf_field_group([
        'title'          => 'Thông tin vị trí',
        'style'          => 'default',
        'position'       => 'acf_after_title',
        'hide_on_screen' => ['the_content'],
        'location'       => [
            Location::where('post_type', '==', 'tuyen_dung'),
        ],
        'fields' => [
            RadioButton::make('Trạng thái', 'td_status')
                ->choices(['open' => 'Đang tuyển', 'closed' => 'Đã tuyển'])
                ->default('open')
                ->layout('horizontal'),

            Text::make('Mức lương', 'td_salary')
                ->helperText('VD: 12 - 15 triệu Gross'),

            Select::make('Hình thức làm việc', 'td_work_type')
                ->choices([
                    'Toàn thời gian'  => 'Toàn thời gian',
                    'Bán thời gian'   => 'Bán thời gian',
                    'Thực tập'        => 'Thực tập',
                ])
                ->default('Toàn thời gian'),

            Textarea::make('Địa điểm', 'td_location')
                ->rows(2)
                ->helperText('Địa chỉ nơi làm việc'),

            Tab::make('Nội dung')->placement('left'),

            URL::make('Link ứng tuyển', 'td_apply_url')
                ->helperText('URL form ứng tuyển hoặc email'),

            Textarea::make('Mô tả công việc', 'td_mo_ta')
                ->rows(6),

            Textarea::make('Yêu cầu về chuyên môn', 'td_yc_chuyen_mon')
                ->rows(4),

            Textarea::make('Yêu cầu về kỹ năng', 'td_yc_ky_nang')
                ->rows(4),

            Textarea::make('Quyền lợi được hưởng', 'td_quyen_loi')
                ->rows(4),
        ],
    ], false);
}, 10);
