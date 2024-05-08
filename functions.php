<?php
function enqueue_styles() {
	$version = date('Ymd-His'); // バージョン番号を設定

	wp_enqueue_style('slick',  get_template_directory_uri() .'/assets/vender/slick-1.8.1/slick/slick.css', [], $version, 'all');
	wp_enqueue_style('slick-theme',  get_template_directory_uri() .'/assets/vender/slick-1.8.1/slick/slick-theme.css', [], $version, 'all');
	wp_enqueue_style('style',  get_template_directory_uri() .'/assets/css/app-min.css', [], $version, 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');
function enqueue_scripts()
{
	$version = date('Ymd-Hi'); // バージョン番号を設定

	if (is_home() || is_front_page()) {
		wp_enqueue_script('top', get_theme_file_uri('/assets/js/parts/top-min.js'), [], $version, true);
	}
	if (is_single()) {
		wp_enqueue_script('single', get_theme_file_uri('/assets/js/parts/single-min.js'), [], $version, true);
	}
	wp_enqueue_script('jQuery', get_template_directory_uri() . '/assets/vender/jquery-3.7.1.min.js', [], $version, true);
	wp_enqueue_script('slick-min', get_template_directory_uri() . '/assets/vender/slick-1.8.1/slick/slick.min.js', [], $version, true);
	wp_enqueue_script('bundle', get_template_directory_uri() . '/assets/js/bundle.js', [], $version, true);
	// wp_enqueue_script('noBundle', get_template_directory_uri() . '/assets/js/nonBundle/noBundle-min.js', [], $css_version, true);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

// ========================================
// お問い合わせ バリデーション
// ========================================
function my_exam_validation_rule( $Validation, $data, $Data ) {

	$Validation->set_rule( 'お名前', 'noEmpty', array( 'message' => '※お名前を入力してください。' ) );
	$Validation->set_rule( 'フリガナ', 'noEmpty', array( 'message' => '※フリガナを入力してください。' ) );
	$Validation->set_rule( 'メールアドレス', 'noEmpty', array( 'message' => '※メールアドレスを入力してください。' ) );
	$Validation->set_rule( 'メールアドレス', 'mail', array( 'message' => '※メールアドレスの書式で入力してください。' ) );
	$Validation->set_rule( 'メールアドレス（確認用）', 'noEmpty', array( 'message' => '※メールアドレス（確認用）を入力してください。' ) );
	// $Validation->set_rule( 'メールアドレス（確認用）', 'eq', array( 'message' => '※メールアドレスが一致しません。' ) );
	$Validation->set_rule( '電話番号', 'noEmpty', array( 'message' => '※電話番号を入力してください。' ) );
	$Validation->set_rule( 'お問い合わせ詳細', 'noEmpty', array( 'message' => '※お問い合わせ詳細を入力してください。' ) );

	return $Validation;
}
// mwform_validation_mw-wp-form-OOO
add_filter( 'mwform_validation_mw-wp-form-5', 'my_exam_validation_rule', 10, 3 );

//投稿タイプ生成　呼び出し
function create_post_type() {

	post_type_template('music', 'Music', 7, true);
	post_type_template('animation', 'Anime', 8, true);
	post_type_template('game', 'Game', 9, true);
	post_type_template('entertainment', 'Entertainment', 10, true);
	post_type_template('gallery', '画像ギャラリ―', 11, false);
	post_type_template('meta-info', '付属情報', 12, false);
	// post_type_template('work-info', '作品情報', 12, false);
	// post_type_template('event', 'イベント情報', 13, false);
	// post_type_template('profile', 'プロフィール', 14, false);
}
add_action( 'init', 'create_post_type' );

//アイキャッチ画像
add_theme_support( 'post-thumbnails' );

//投稿タイプ生成
function post_type_template ($postTypeName, $label, $menuPosition, $main_type) {
	$postTypeSupports = [  // supports のパラメータを設定する配列（初期値だと title と editor のみ投稿画面で使える）
		'title',  // 記事タイトル
		'editor',  // 記事本文
		'thumbnail',  // アイキャッチ画像
		'revisions'  // リビジョン
	];
	register_post_type(
		$postTypeName,
		[
			'label' => $label,
			'public' => true,
			'has_archive' => true,
			'show_in_rest' => true,
			'menu_position' => $menuPosition,
			'supports' => $postTypeSupports
		]
	);

	if ($main_type == true) {

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
				'show_in_rest' => true,
				// 'update_count_callback' => '_update_post_term_count',
			]
		);
	}

	register_taxonomy(
		"{$postTypeName}-bind",
		$postTypeName,
		[
			'label' => '紐づけタグ',
			'labels' => array(
				'all_items' => '紐づけタグ一覧',
				'add_new_item' => '紐づけタグを追加',
				'name' => '紐づけタグ',
				'singular_name' => '紐づけタグ',
			),
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			// 'update_count_callback' => '_update_post_term_count',
		]
	);
}

//複数のカスタム投稿タイプに同じタクソノミーを付与
function add_custom_taxonomy() {

    $args = array(
        'labels' => 'カテゴリー',
        'hierarchical' => true, // このタクソノミーが階層化される（カテゴリーのように）かどうか
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
				'show_in_rest' => true,
        'query_var' => true,
    );
	register_taxonomy('category', array('game', 'music' , 'entertainment', 'animation'), $args);

    $labels = array(
        'name' => _x('表示位置指定', 'taxonomy general name'),
        'singular_name' => _x('Location', 'taxonomy singular name')
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true, // このタクソノミーが階層化される（カテゴリーのように）かどうか
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
				'show_in_rest' => true,
        'query_var' => true,
    );
    register_taxonomy('post_locate', array('game', 'music' , 'entertainment', 'animation'), $args);
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

function change_menu_label() {
	global $menu, $submenu;
	unset($menu[2]); //ダッシュボード
	unset($menu[4]); //スペース
	unset($menu[10]);//メディア
	unset($menu[5]);//投稿
	// $menu[6];//インタビュー
	// $menu[7];//音楽
	// $menu[8];//アニメ
	// $menu[9];//ゲーム
	// $menu[]
	// $menu[15];//
	// $menu[25];
	$menu[19] = ["画像・ファイル", "upload_files", "upload.php", "", "menu-top menu-icon-media" ,"menu-media" ,"dashicons-admin-media"];
	$submenu['upload.php'][5][0] = '画像・ファイル一覧';
	$submenu['upload.php'][10][0] = '画像・ファイルを追加';
}
add_action( 'admin_menu', 'change_menu_label' );

// キーワード検索 検索結果調整
function search_exclude_custom_post_type( $query ) {
	if ( $query->is_search() && $query->is_main_query() && ! is_admin() ) {
		$query->set( 'post_type', array( 'music', 'game', 'animation', 'entertainment') ); //検索対象を追加
	}
}
add_filter( 'pre_get_posts', 'search_exclude_custom_post_type' );