<?php
    // ========================================
    // カテゴリ詳細ページにて
    // 記事タイトルから同じタイトルの画像ギャラリーリンクを生成
    // ========================================
    function generate_gallery_link($title) {
        $gallery_link = "";
        $args = [ //検索条件
            'post_type' => 'gallery',
            'title' => $title,
            'post_status' => 'publish', // 公開状態
            'numberposts' => 1
        ];

        $posts = get_posts($args);

        // 該当する投稿があればリンクを生成
        if (!empty($posts)) {
            $post_content = get_post_field('post_content', $posts[0]->ID);
            $media_urls = get_media_urls_from_post($post_content);
            $link = get_permalink($posts[0]->ID);
            $gallery_link = '<div class="p-single-gallery"><a class="p-single-gallery-link" href="' . esc_url($link) . '">すべての画像・動画(全'. count($media_urls) .'点)</a></div>';
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
    // 投稿から画像データURL配列を取得
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
    // ========================================
    // 投稿から画像URL、動画URL、YouTubeのURL配列を取得
    // ========================================
    function get_media_urls_from_post($post_content) {
        $media_urls = []; // メディアURLを格納する配列を初期化

        $pattern = '/<img.+?src="([^"]+)".*?>|<video.+?src="([^"]+)".*?>|https?:\/\/youtu\.be\/[\w\-_]+(\?[\w=&]+)?|https?:\/\/\S+\.(mp4|mov)/i';

        // 正規表現による検索
        preg_match_all($pattern, $post_content, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {

            if (!empty($match[1])) { // imgタグまたはvideoタグの場合
                $media_urls[] = $match[1];
            } elseif (!empty($match[2])) { // videoタグの場合（この条件分岐は冗長かもしれませんが、明示的に分けています）
                $media_urls[] = $match[2];
            } elseif (!empty($match[0])) { // YouTubeのURLまたはビデオファイルの直接URLの場合
                if (!empty($match[0]) && preg_match('/https?:\/\/youtu\.be\/[\w\-_]+/', $match[0])) { // YouTubeの短縮URL
                    // YouTubeの短縮URLをYouTubeの埋め込みURLに変換
                    $video_id = preg_replace('/https?:\/\/youtu\.be\/([\w\-_]+)/', '$1', $match[0]);
                    $embed_url = 'https://www.youtube.com/embed/' . $video_id;
                    $media_urls[] = $embed_url;
                } else if (!empty($match[0]) && preg_match('/https?:\/\/(?:www\.)?youtube\.com\/watch\?v=([\w\-_]+)/', $match[0])){ // YouTubeの通常のURL
                    $video_id = preg_replace('/https?:\/\/(?:www\.)?youtube\.com\/watch\?v=([\w\-_]+)/', '$1', $match[0]);
                    $embed_url = 'https://www.youtube.com/embed/' . $video_id;
                    $media_urls[] = $embed_url;
                } else { //動画URL
                    $media_urls[] = $match[0];
                }
            }
        }
        return array_unique($media_urls); //重複を除去
    }
    // ========================================
    // 投稿ID＋タクソノミーからタームネームの取得
    // ========================================
    function term_names_by_term($post_id, $taxonomy, $is_array) {
        $terms_name = [];
        $terms = get_the_terms($post_id, $taxonomy);

        if (!empty($terms) && !is_wp_error($terms)) {
            if ($is_array) {
                foreach ($terms as $term) { //配列
                    $terms_name[] = $term -> name;
                }
            } else {
                foreach ($terms as $term) { //配列
                    $terms_name[] = $term -> name;
                }
            }
        }
        return $terms_name;
    }
    // ========================================
    // アーカイブページ tabフォームのセッション管理
    // ========================================
    function tab_form_value($page_slug) {
        $buttonValue = "all";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $buttonValue = $_POST['button'];
            $_SESSION['buttonValue'] = $_POST['button'];
        } else {
            // 遷移元URLを取得
            $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
            $homeUrl = home_url('/');
            $pattern = "/^" . preg_quote($homeUrl, '/') . $page_slug. "(\/page\/[0-9]+)?\/?$/";

            if (preg_match($pattern, $referer)) {
                    $buttonValue = isset($_SESSION['buttonValue']) ? $_SESSION['buttonValue'] : '';
            } else {
                    $buttonValue = "all";
                    $_SESSION['buttonValue'] = "all";
            }
        }
        return $buttonValue;
    }