<?php
$breadcrumb_slug_arr = '';
$breadcrumb_arr = '';
if ( isset( $args['breadcrumb_slug_arr'] ) ) {
    $breadcrumb_slug_arr = $args['breadcrumb_slug_arr'];
}

if ( isset( $args['breadcrumb_arr'] ) ) {
    $breadcrumb_arr = $args['breadcrumb_arr'];
}
// ========================================
// $page_type [0:カテゴリー, 1:カテゴリー個別, 2:画像ギャラリー, 3:固定ページ]
// ========================================
function generate_breadcrumb($breadcrumb_slug_arr, $breadcrumb_arr)
{
    $home_url = esc_url(home_url('/'));
    $html = '';
    for ($i = 0; $i < count($breadcrumb_arr); $i++) {
        if ($i == count($breadcrumb_arr) - 1) {
            $html .= '<li class="c-breadcrumb-item">' . $breadcrumb_arr[$i] . '</li>';
        } else {
            $href = "";

            switch ($breadcrumb_slug_arr[$i]) {
                case $breadcrumb_slug_arr[0]:
                    $href = $home_url . $breadcrumb_slug_arr[0];
                    break;
                case $breadcrumb_slug_arr[1]:
                    $href = $home_url . $breadcrumb_slug_arr[0] . '/' . $breadcrumb_slug_arr[1];
                default:
            }

            $html .= '<li class="c-breadcrumb-item"><a href="' . $href . '">' . $breadcrumb_arr[$i] . '</a></li>';
        }
    }
    return $html;
}
?>
<div id="breadcrumb" class="c-breadcrumb">
    <ol id="breadcrumb-list" class="c-breadcrumb-list">
        <li class="c-breadcrumb-item"><a href="<?= esc_url(home_url('/')) ?>">TOP</a></li>
        <?php echo generate_breadcrumb($breadcrumb_slug_arr, $breadcrumb_arr); ?>
    </ol>
</div>