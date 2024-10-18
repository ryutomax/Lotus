<?php
// CSSファイル読み込み
function enqueue_styles() {
	$version = date('Ymd-His'); // バージョン番号を設定

	if (is_page('contact')) {
		wp_enqueue_style('jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css', [], $version, 'al');
	}
	wp_enqueue_style('slick',  get_template_directory_uri() .'/assets/vender/slick-1.8.1/slick/slick.css', [], $version, 'all');
	wp_enqueue_style('slick-theme',  get_template_directory_uri() .'/assets/vender/slick-1.8.1/slick/slick-theme.css', [], $version, 'all');
	wp_enqueue_style('style',  get_template_directory_uri() .'/assets/css/app-min.css', [], $version, 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');
//JSファイル読み込み
function enqueue_scripts() {
	$version = date('Ymd-Hi'); // バージョン番号を設定

	if (is_home() || is_front_page()) {
		wp_enqueue_script('top', get_theme_file_uri('/assets/js/parts/top-min.js'), [], $version, true);
	}
	if (is_single()||is_page('information')) {
		wp_enqueue_script('single', get_theme_file_uri('/assets/js/parts/single-min.js'), [], $version, true);
	}
	if (is_page('contact')) {
		wp_enqueue_script('datepicker', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', [], $version, true);
		wp_enqueue_script('contact', get_theme_file_uri('/assets/js/parts/contact-min.js'), [], $version, true);
	}
	wp_enqueue_script('jQuery', get_template_directory_uri() . '/assets/vender/jquery-3.7.1.min.js', [], 1, true);
	wp_enqueue_script('slick-min', get_template_directory_uri() . '/assets/vender/slick-1.8.1/slick/slick.min.js', [], 1, true);
	wp_enqueue_script('bundle', get_template_directory_uri() . '/assets/js/bundle.js', [], $version, true);
	// wp_enqueue_script('noBundle', get_template_directory_uri() . '/assets/js/nonBundle/noBundle-min.js', [], $css_version, true);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

// ========================================
// お問い合わせ バリデーションメッセージ変更
// ========================================
function my_exam_validation_rule( $Validation, $data, $Data ) {

	$Validation->set_rule( '貴社名(部署名)', 'noEmpty', array( 'message' => '必須項目です。' ) );
	$Validation->set_rule( '媒体名・番組名', 'noEmpty', array( 'message' => '必須項目です。' ) );
	$Validation->set_rule( 'ご担当者様氏名', 'noEmpty', array( 'message' => '必須項目です。' ) );
	$Validation->set_rule( 'メールアドレス', 'noEmpty', array( 'message' => '必須項目です。' ) );
	// $Validation->set_rule( 'メールアドレス', 'mail', array( 'message' => '形式を確認してください。' ) );
	// $Validation->set_rule( 'メールアドレス（確認用）', 'noEmpty', array( 'message' => '※メールアドレス（確認用）を入力してください。' ) );
	// $Validation->set_rule( 'メールアドレス（確認用）', 'eq', array( 'message' => '※メールアドレスが一致しません。' ) );
	$Validation->set_rule( '連絡可能な電話番号', 'noEmpty', array( 'message' => '必須項目です。' ) );
	$Validation->set_rule( '取材内容・趣旨', 'noEmpty', array( 'message' => '必須項目です。' ) );
	$Validation->set_rule( '取材方法', 'noEmpty', array( 'message' => '必須項目です。' ) );
	$Validation->set_rule( '取材希望日時または期限', 'noEmpty', array( 'message' => '必須項目です。' ) );
	$Validation->set_rule( '撮影の有無', 'noEmpty', array( 'message' => '必須項目です。' ) );

	return $Validation;
}
// キー指定）mwform_validation_mw-wp-form-OOO
add_filter( 'mwform_validation_mw-wp-form-130', 'my_exam_validation_rule', 10, 3 );

//カスタム投稿タイプ生成　呼び出し
function create_post_type() {

	post_type_template('music', 'Music', 7, true);
	post_type_template('animation', 'Anime', 8, true);
	post_type_template('game', 'Game', 9, true);
	post_type_template('entertainment', 'Entertainment', 10, true);
	post_type_template('gallery', '画像ギャラリ―', 11, false);
	post_type_template('meta-info', '付属情報', 12, false);
}
add_action( 'init', 'create_post_type' );

//アイキャッチ画像
add_theme_support( 'post-thumbnails' );

//投稿タイプ生成
function post_type_template ($postTypeName, $label, $menuPosition, $main_type) {
	if ($main_type == true) {
		register_post_type(
			$postTypeName,
			[
				'label' => $label,
				'public' => true,
				'has_archive' => true,
				'show_in_rest' => true,
				'menu_position' => $menuPosition,
				'supports' =>  [  // 初期値 title と editor のみ
					'title',  // 記事タイトル
					'editor',  // 記事本文
					'thumbnail',  // アイキャッチ画像
					'revisions'  // リビジョン
				]
			]
		);

		register_taxonomy(
			"{$postTypeName}-tag",
			$postTypeName,
			[
				'label' => 'タグ',
				'labels' => array(
					'all_items' => 'タグ一覧',
					'add_new_item' => 'タグを追加',
					'name' => 'タグ',
					'singular_name' => 'タグ',
				),
				'hierarchical' => false,
				'public' => true,
				'show_ui' => true,
				'show_in_rest' => true
			]
		);
	} else {
		register_post_type(
			$postTypeName,
			[
				'label' => $label,
				'public' => true,
				'has_archive' => true,
				'show_in_rest' => true,
				'menu_position' => $menuPosition,
				'supports' =>  [  // 初期値 title と editor のみ
					'title',  // 記事タイトル
					'editor',  // 記事本文
					'revisions'  // リビジョン
				]
			]
		);
	}
}

//複数のカスタム投稿タイプへ共通のカスタムタクソノミーを付与
function add_custom_taxonomy() {
	//カテゴリ
	$args = array(
			'labels' => 'カテゴリー',
			'hierarchical' => true, // このタクソノミーが階層化される（カテゴリーのように）かどうか
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_rest' => true,
			'query_var' => true,
			'show_in_menu' => false
	);
	register_taxonomy('category', ['game', 'music' , 'entertainment', 'animation'], $args);

	//TOPカルーセル
	$args = array(
			'label' => 'TOPカルーセル',
			'labels' => [
				'name' => 'TOPカルーセル(表示順)',
				'singular_name' => 'TOPカルーセル',
			],
			'hierarchical' => true, // このタクソノミーが階層化される（カテゴリーのように）かどうか
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_rest' => true,
			'query_var' => true,
			'show_in_menu' => false //管理画面メニュー表示
	);
	register_taxonomy('top_carousel', ['game', 'music' , 'entertainment', 'animation'], $args);

	//Pick Up News
	$args = array(
			'label' => 'Pick Up News',
			'labels' => [
				'name' => 'Pick Up News',
				'singular_name' => 'Pick Up News'
			],
			'hierarchical' => true, // このタクソノミーが階層化される（カテゴリーのように）かどうか
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_rest' => true,
			'query_var' => true,
			'show_in_menu' => false //管理画面メニュー表示
	);
	register_taxonomy('pick_up_news', ['game', 'music' , 'entertainment', 'animation'], $args);

	//紐づけタグ
	$args = array(
			'label' => '付属情報紐づけ',
			'labels' => [
				'all_items' => '付属情報紐づけ一覧',
				'add_new_item' => '付属情報紐づけを追加',
				'name' => '付属情報紐づけ',
				'singular_name' => '付属情報紐づけ',
			],
			'hierarchical' => false, // このタクソノミーが階層化される（カテゴリーのように）かどうか
			'public' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'query_var' => true,
	);
	register_taxonomy('meta-bind', ['game', 'music', 'entertainment', 'animation', 'meta-info'], $args);
}
// init アクションフックを使用して、カスタムタクソノミーを初期化
add_action('init', 'add_custom_taxonomy');

// 「新規カテゴリー追加」を非表示
function my_admin_style() {
    echo '<style>
    div.components-flex-item > button {
        display:none;
    }
    </style>'.PHP_EOL;
}
add_action('admin_print_styles', 'my_admin_style');

// 管理画面メニュー情報変更
function change_menu_label() {
	global $menu, $submenu;
	unset($menu[2]); //ダッシュボード
	unset($menu[4]); //スペース
	unset($menu[10]);//メディア
	unset($menu[5]); //投稿
	// $menu[6];//インタビュー
	// $menu[7];//音楽
	// $menu[8];//アニメ
	// $menu[9];//ゲーム
	// $menu[]
	// $menu[15];
	// $menu[25];
	$menu[19] = ["画像・ファイル", "upload_files", "upload.php", "", "menu-top menu-icon-media" ,"menu-media" ,"dashicons-admin-media"];
	$submenu['upload.php'][5][0] = '画像・ファイル一覧';
	$submenu['upload.php'][10][0] = '画像・ファイルを追加';
}
add_action( 'admin_menu', 'change_menu_label' );

// キーワード検索 検索結果調整
function search_exclude_custom_post_type( $query ) {
	if ( $query->is_search() && $query->is_main_query() && ! is_admin() ) {
		$query->set( 'post_type', array( 'music', 'game', 'animation', 'entertainment') );//検索対象を追加
		$query->set( 'posts_per_page', 15 );

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$query->set( 'paged', $paged );
	}
}
add_filter( 'pre_get_posts', 'search_exclude_custom_post_type' );

function add_custom_menu_item() {
	add_menu_page(
			'TOPカルーセル', // ページタイトル
			'TOPカルーセル', // メニュータイトル
			'manage_options', // 必要な権限
			'top_carousel-list', // ページスラッグ
			'display_menu_top_carousel' // ページを表示する関数
	);
	add_menu_page(
			'Pick Up News', // ページタイトル
			'Pick Up News', // メニュータイトル
			'manage_options', // 必要な権限
			'pick_up_news-list', // ページスラッグ
			'display_menu_pick_up_news' // ページを表示する関数
	);
}
add_action('admin_menu', 'add_custom_menu_item');

// TOPカルーセル メニュー追加
function display_menu_top_carousel() {
	// 対象とする投稿タイプ
	$post_types = array('music', 'game', 'animation', 'entertainment');

	// タクソノミーの条件
	$taxonomy = 'top_carousel';
	$term = ['1', '2', '3', '4', '5', '6'];

	echo '<div class="wrap">';
	echo '<h2>TOPカルーセル</h2>';

	foreach ($post_types as $post_type) {
			$post_type_obj = get_post_type_object($post_type);
			if ($post_type_obj) {
					echo '<h3>' . esc_html($post_type_obj->labels->name) . '</h3>';

					// 投稿リストの表示
					$args = array(
							'post_type' => $post_type,
							'posts_per_page' => 10, // 必要に応じて調整
							'tax_query' => array(
									array(
											'taxonomy' => $taxonomy,
											'field' => 'slug',
											'terms' => $term,
									),
							),
					);
					$query = new WP_Query($args);

					if ($query->have_posts()) {
							// ↓ヘッダー
							echo '<table class="wp-list-table widefat fixed striped posts">';
							echo '<thead>';
							echo '<tr>';
							echo '<th scope="col" id="title" class="manage-column column-title column-primary">タイトル</th>';
							echo '<th scope="col" id="taxonomy" class="manage-column column-taxonomy">TOPカルーセル(表示順)</th>';
							echo '<th scope="col" id="author" class="manage-column column-author">作成者</th>';
							echo '<th scope="col" id="date" class="manage-column column-date">更新日</th>';
							echo '</tr>';
							echo '</thead>';
							echo '<tbody id="the-list">';
							// ↑ヘッダー
							while ($query->have_posts()) {
									$query->the_post();
									$term_list = wp_get_post_terms(get_the_ID(), $taxonomy, array("fields" => "all"));
									$term_names = !is_wp_error($term_list) ? join(', ', wp_list_pluck($term_list, 'name')) : '';

									echo '<tr id="post-' . get_the_ID() . '" class="iedit">';
									echo '<td class="title column-title has-row-actions column-primary page-title">';
									echo '<strong><a class="row-title" href="' . get_edit_post_link() . '">' . get_the_title() . '</a></strong>';
									echo '<div class="row-actions">';
									echo '<span class="edit"><a href="' . get_edit_post_link() . '">編集</a> | </span>';
									echo '<span class="inline hide-if-no-js">';
									echo '</span>';
									echo '</div>';
									echo '</td>';
									echo '<td class="taxonomy column-taxonomy">' . esc_html($term_names) . '</td>';
									echo '<td class="author column-author">' . get_the_author() . '</td>';
									echo '<td class="date column-date">' . get_the_date() . '</td>';
									echo '</tr>';
							}

							echo '</tbody>';
							echo '</table>';
					} else {
							echo '<p>TOPカルーセルに設定した投稿はありません。</p>';
					}
					wp_reset_postdata();
			}
	}

	echo '</div>';
}
// Pick Up News メニュー追加
function display_menu_pick_up_news() {
	// 対象とする投稿タイプ
	$post_types = array('music', 'game', 'animation', 'entertainment');

	// タクソノミーの条件
	$taxonomy = 'pick_up_news';
	$term = 'is_display';

	echo '<div class="wrap">';
	echo '<h2>Pick Up News(4つまで表示可能)</h2>';

	foreach ($post_types as $post_type) {
			$post_type_obj = get_post_type_object($post_type);
			if ($post_type_obj) {
					echo '<h3>' . esc_html($post_type_obj->labels->name) . '</h3>';

					// 投稿リストの表示
					$args = array(
							'post_type' => $post_type,
							'posts_per_page' => 10, // 必要に応じて調整
							'tax_query' => array(
									array(
											'taxonomy' => $taxonomy,
											'field' => 'slug',
											'terms' => $term
									),
							),
					);
					$query = new WP_Query($args);

					if ($query->have_posts()) {
							// ↓ヘッダー
							echo '<table class="wp-list-table widefat fixed striped posts">';
							echo '<thead>';
							echo '<tr>';
							echo '<th scope="col" id="title" class="manage-column column-title column-primary">タイトル</th>';
							echo '<th scope="col" id="author" class="manage-column column-author">作成者</th>';
							echo '<th scope="col" id="date" class="manage-column column-date">更新日</th>';
							echo '</tr>';
							echo '</thead>';
							echo '<tbody id="the-list">';
							// ↑ヘッダー
							while ($query->have_posts()) {
									$query->the_post();

									echo '<tr id="post-' . get_the_ID() . '" class="iedit">';
									echo '<td class="title column-title has-row-actions column-primary page-title">';
									echo '<strong><a class="row-title" href="' . get_edit_post_link() . '">' . get_the_title() . '</a></strong>';
									echo '<div class="row-actions">';
									echo '<span class="edit"><a href="' . get_edit_post_link() . '">編集</a> | </span>';
									echo '<span class="inline hide-if-no-js">';
									echo '</span>';
									echo '</div>';
									echo '</td>';
									echo '<td class="author column-author">' . get_the_author() . '</td>';
									echo '<td class="date column-date">' . get_the_date() . '</td>';
									echo '</tr>';
							}

							echo '</tbody>';
							echo '</table>';
					} else {
							echo '<p>Pick Up Newsに設定した投稿はありません。</p>';
					}
					wp_reset_postdata();
			}
	}

	echo '</div>';
}

// ========================================
// 「パスワード保護」一覧非表示
// ========================================
function password_post_exclude_archive_posts($query) {
	if(is_singular() || is_admin()) {
		return;
	}
	$query->set('has_password', false);
}
add_action('pre_get_posts', 'password_post_exclude_archive_posts');

// ========================================
// 「カスタム投稿タイプ」へ「予約投稿機能」追加
// ========================================
function enable_reservation_for_custom_post_type() {
	add_post_type_support( 'music', 'future' );
	add_post_type_support( 'game', 'future' );
	add_post_type_support( 'animation', 'future' );
	add_post_type_support( 'entertainment', 'future' );
}
add_action( 'init', 'enable_reservation_for_custom_post_type' );


add_filter( 'ppp_nonce_life', 'my_nonce_life' );
function my_nonce_life() {
    return 60 * 60 * 24 * 30;
}