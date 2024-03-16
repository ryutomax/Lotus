<?php
/*
Template Name: おすすめコンテンツ
*/
?>
<?php
  $page = get_page_by_path('recommend_contents');  // 適用中のスラッグ名を取得
  $id = $page->ID; // ページのIDを取得
?>
<section class="p-recommend">
  <div class="p-recommend-inner">
    <h2 class="p-recommend-ttl">おすすめのコンテンツ</h2>
    <div class="p-recommend-wrapper">
      <?php $cont01 = get_field_object('recommend01', $id); ?>
      <article class="p-recommend-cnt <?php if(!$cont01['value']) echo 'u-comingsoon'; ?>">
        <a href="<?php if($cont01['value'])  echo esc_url($cont01['value']); ?>" class="p-recommend-cnt-link" style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/recommend/recommend01.png);" target="_blank">
          <h3 class="p-recommend-cnt-ttl">オーナー様必見</h3>
          <h4 class="p-recommend-cnt-msg">飲食店の海外展開<br>成功メソッド</h4>
        </a>
      </article>
      <?php $cont02 = get_field_object('recommend02', $id); ?>
      <article class="p-recommend-cnt <?php if(!$cont02['value']) echo 'u-comingsoon'; ?>">
        <a href="<?php if($cont02['value'])  echo esc_url($cont02['value']); ?>" class="p-recommend-cnt-link" style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/recommend/recommend02.png);" target="_blank">
          <h3 class="p-recommend-cnt-ttl">海外進出を夢で終わらせないために</h3>
          <h4 class="p-recommend-cnt-msg">僕が東南アジアを<br>選んだ理由</h4>
        </a>
      </article>
      <?php $cont03 = get_field_object('recommend03', $id); ?>
      <article class="p-recommend-cnt  <?php if(!$cont03['value']) echo 'u-comingsoon'; ?>">
        <a href="<?php if($cont03['value'])  echo esc_url($cont03['value']); ?>" class="p-recommend-cnt-link" style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/recommend/recommend03.png);" target="_blank">
          <h3 class="p-recommend-cnt-ttl">海外進出あるある</h3>
          <h4 class="p-recommend-cnt-msg">海外進出<br>こんな失敗例</h4>
        </a>
      </article>
    </div>
    <!-- /.p-recommend-wrapper -->
  </div>
  <!-- /.p-recommend-inner -->
</section>