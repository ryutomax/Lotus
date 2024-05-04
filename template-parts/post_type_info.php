<?php

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

?>