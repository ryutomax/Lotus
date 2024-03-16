<?php

function enqueue_styles() {
	$version = date('Ymd-His'); // バージョン番号を設定

	wp_enqueue_style('style',  get_template_directory_uri() .'/dist/assets/css/app-min.css', [], $version, 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');
function enqueue_scripts()
{
	$version = date('Ymd-Hi'); // バージョン番号を設定

	if (is_home() || is_front_page()) {
		wp_enqueue_script('top', get_theme_file_uri('/assets/js/nonBundle/top-min.js'), [], $version, true);
	}

	wp_enqueue_script('bundle', get_template_directory_uri() . '/assets/js/bundle.js', [], $version, true);
	// wp_enqueue_script('noBundle', get_template_directory_uri() . '/assets/js/nonBundle/noBundle-min.js', [], $css_version, true);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

// ========================================
// バリデーション
// // ========================================
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

function create_post_type() {

	post_type_template('news', 'ニュース', 5);
	post_type_template('interview', 'インタビュー', 6);
	post_type_template('music', '音楽', 7);
	post_type_template('animation', 'アニメ', 8);
	post_type_template('game', 'ゲーム', 9);
	post_type_template('entertainment', 'エンタメ', 10);
	post_type_template('gallery', '画像ギャラリ―', 11);
	post_type_template('event', '作品情報', 12);
	post_type_template('event', 'イベント情報', 13);
	post_type_template('profile', 'プロフィール', 14);
}
add_action( 'init', 'create_post_type' );

function post_type_template ($postTypeName, $label, $menuPosition) {
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

	register_taxonomy(
		"{$postTypeName}-cat",
		$postTypeName,
		[
			'label' => 'カテゴリー',
			'hierarchical' => true,
			'public' => true,
			'show_in_rest' => true,
		]
	);

	register_taxonomy(
		"{$postTypeName}-tag",
		$postTypeName,
		[
			'label' => 'タグ',
			'hierarchical' => false,
			'public' => true,
			'show_in_rest' => true,
			'update_count_callback' => '_update_post_term_count',
		]
	);
}

function change_menu_label() {
	global $menu, $submenu;
	$menu[10][0] = '画像・ファイル';
	$submenu['upload.php'][5][0] = '画像・ファイル一覧';
	$submenu['upload.php'][10][0] = '画像・ファイルを追加';
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
	$menu[19] = ["メディア", "upload_files", "upload.php", "", "menu-top menu-icon-media" ,"menu-media" ,"dashicons-admin-media"];
}
add_action( 'admin_menu', 'change_menu_label' );

// キーワード検索 検索結果調整
function search_exclude_custom_post_type( $query ) {
	if ( $query->is_search() && $query->is_main_query() && ! is_admin() ) {
		$query->set( 'post_type', array( 'post', 'page', 'gallery') ); // 除外したい投稿タイプを除く
	}
}
add_filter( 'pre_get_posts', 'search_exclude_custom_post_type' );