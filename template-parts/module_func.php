<?php
    // ========================================
    // 記事タイトルから同じタイトルの画像ギャラリーを取得
    // ========================================
    function generate_gallery_link() {
        $gallery_link = "";
        $title = get_the_title();
        $args = array(
            'post_type' => 'gallery',
            'title' => $title,
            'post_status' => 'publish', // 公開状態の投稿のみ
            'numberposts' => 1
        );

        $posts = get_posts($args);

        // 該当する投稿があればリンクを生成
        if (!empty($posts)) {
            $image_urls = get_images_from_post($posts[0]->ID);
            $post_num = 0;
            foreach ($image_urls as $url) {
                $post_num++;
            }
            $link = get_permalink($posts[0]->ID);
            $gallery_link = '<div class="p-single-gallery"><a class="p-single-gallery-link" href="' . esc_url($link) . '">すべての画像・動画を見る(全'. $post_num .'点)</a></div>';
        }

        return $gallery_link;
    }
    // ========================================
    // 記事タイトルから投稿タイプを取得
    // ========================================
    function get_post_type_by_title($title) {
        $post_type = '';
        $post_slug = '';

        // 検索対象のカスタム投稿タイプを配列で指定
        $post_types = ['music', 'game', 'animation', 'entertainment'];
        $args = array(
            'post_type' => $post_types,
            'post_status' => 'publish',
            'posts_per_page' => -1, // 必要に応じて適切な値に調整
            'title' => $title, // WordPress 5.1以降、titleパラメータによる検索が可能
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) {
            // 見つかった記事のpost_typeを出力
            while ($query->have_posts()) {
                $query->the_post();
                // 記事のpost_typeを取得して出力
                $post_type = get_post_type();
                $post_slug = get_post_field('post_name', get_the_ID());
            }
        } else {
            $post_type = '投稿タイプ未指定';
        }

        // クエリのリセット
        wp_reset_postdata();

        return ['type' => $post_type, 'slug' => $post_slug];
    }
    // ========================================
    // 日本語表記に変換
    // ========================================
    function convert_jp($text) {
        switch ($text) {
            case 'music':
                $text = 'ミュージック';
                    break;
            case 'animation':
                $text = 'アニメ';
                    break;
            case 'game':
                $text = 'ゲーム';
                    break;
            case 'entertainment':
                $text = 'エンタメ';
                break;
            case 'news':
                $text = 'ニュース';
                break;
            case 'interview':
                $text = 'インタビュー';
                break;
            case 'column':
                $text = 'コラム';
                break;
            case 'report':
                $text = 'レポート';
                break;
            default:
                $text = 'その他';
                break;
        }

        return $text;
    }
    // ========================================
    // 投稿タイプを背景色付きタグで出力
    // ========================================
    function get_post_type_info($post_type) {
        $bgc = '';
        $post_name = '';
        switch ($post_type) {
        case 'music':
            $bgc = 'background-color: #59d5e0;';
            $post_name = 'ミュージック';
            break;
        case 'game':
            $bgc = 'background-color: #9195f6;';
            $post_name = 'ゲーム';
            break;
        case 'animation':
            $bgc = 'background-color: #f4538a;';
            $post_name = 'アニメ';
            break;
        case 'entertainment':
            $bgc = 'background-color: #faa300;';
            $post_name = 'エンタメ';
            break;
        }
        return ['color' => $bgc, 'name' => $post_name];
    }
    // ========================================
    // 詳細記事のスラッグを取得
    // ========================================
    function generate_single_slug($title, $post_type) {
        $single_slug = "";

        $args = array(
            'title'        => $title,
            'post_type'   => $post_type,
            'post_status' => 'publish',
            'numberposts' => 1
        );
        $posts = get_posts($args);

        if (!empty($posts)) {
            $single_slug = $posts[0]->post_name;
        }
        return $single_slug;
    }

    // ========================================
    // 投稿から画像データ取得 HTMLタグとして出力
    // ========================================
    function get_images_from_post($post_id) {
        $post = get_post($post_id);
        $post_content = $post->post_content;
        $pattern = '/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i';

        // 正規表現によるマッチング
        preg_match_all($pattern, $post_content, $matches);
        $image_urls = $matches[1];

        return $image_urls;
    }

?>
