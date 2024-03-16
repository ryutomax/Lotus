<?php
/*
Template Name: M&A
*/
?>

  <?php get_template_part('template-parts/head') ?>
    <div class="l-wrap">
      <!-- 閉じタグは_footer.ejs -->
        <?php get_template_part('template-parts/header') ?>
        <?php get_template_part('template-parts/contactIcon') ?>
          <main class="l-main">
            <section class="p-mv"  style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/ma/mv/ma_mv_bg.png);">
              <div class="p-mv-inner">
                <h2 class="p-mv-ttl-other-long">M&A <br class="u-tb-show">Intermediary</h2>
                <h3 class="p-mv-ttl-sub">M&A 仲介</h3>
              </div>
              <!-- /.p-mv-inner -->
            </section>
            <div class="p-breadcrumbs">
              <a href="<?= esc_url(home_url('/')) ?>">TOP</a>
              <span>＞</span>
              <span>M&A仲介</span>
            </div>
            <!-- /.p-breadcrumbs -->
            <section class="p-otherSec01 c-section">
              <div class="p-otherSec01-inner c-section-inner">
                <h2 class="p-otherSec01-ttl u-d-green">中小企業を買いたい方、<br class="u-pc-show">譲りたい方のお手伝い</h2>
                <p class="p-otherSec01-text u-black u-sp-m-none">
                  M&Aは企業が市場シェアを拡大し、<br class="u-pc-show u-sp-none">新たな地域や<br class="u-sp-show">顧客層に進出する手段として有効な手段の一つです。<br>
                  一方で2020年現在、国内企業の3分の2にあたる企業が<br class="u-pc-l-show">後継者不在の問題を抱えており、<br class="u-tb-show">業績は決して悪くないのにもかかわらず、<br>
                  後継者不在によって倒産を余儀なくされるケースも<br class="u-pc-l-show">珍しくないほど問題は深刻化しているため、<br class="u-tb-show">M&Aなどを活用し、この問題を打開すべく、<br>
                  新たなビジネス領域への挑戦や<br class="u-tb-show">事業承継に関して積極的な姿勢が見られます。<br>当社はそのようなお客様の意欲をしっかりと理解し、<br class="u-tb-show">M&Aを通じて成長を支援します。
                </p>
                <p class="p-otherSec01-text u-black u-sp-m-show">
                  M&Aは企業が市場シェアを拡大し、新たな地域や顧客層に進出する手段として有効な手段の一つです。<br>
                  一方で2020年現在、国内企業の3分の2にあたる企業が後継者不在の問題を抱えており、業績は決して悪くないのにもかかわらず、
                  後継者不在によって倒産を余儀なくされるケースも珍しくないほど問題は深刻化しているため、M&Aなどを活用し、この問題を打開すべく、
                  新たなビジネス領域への挑戦や事業承継に関して積極的な姿勢が見られます。<br>当社はそのようなお客様の意欲をしっかりと理解し、M&Aを通じて成長を支援します。
                </p>
              </div>
              <!-- /.p-survSec01-inner -->
            </section>
            <section class="p-maSec02 c-section">
              <div class="p-maSec02-inner c-section-inner">
                <h2 class="p-maSec02-ttl c-section-ttl">中小企業のM&Aについて</h2>
                <div class="p-maSec02-cnt">
                  <h3 class="p-maSec02-cnt-ttl">中小企業の後継者不足の現状</h3>
                  <h4 class="p-maSec02-cnt-copy">若者の安定志向━中小企業への就職や<br class="u-tb-show-sp-show">事業継承に対する関心が減少</h4>
                  <p class="p-maSec02-cnt-text">「中小企業における後継者不足は、重要な問題として取り上げられています。経済産業省の調査によれば、日本国内の中小企業の約半数が後継者問題に直面しており、
                  そのうち約20％が後継者不足によって経営の継続が危ぶまれています（経済産業省、中小企業白書）。後継者不足は複数の要因によって引き起こされています。<br>
                  一つは、若者の起業志向の低下です。過去数十年にわたり、日本の若者は安定した就職先を求める傾向があり、中小企業への就職や事業継承に対する関心が減少してきました（日本政策金融公庫、若者の事業承継意識に関するアンケート調査）。<br>
                  また、後継者問題は経営者の高齢化も関係しています。多くの中小企業は創業者や経営者が高齢化しており、後継者の選定や育成が急務となっています。しかしながら、後継者候補の家族 や社内の人材がいない場合、経営者は外部からの後継者を探さなければなりません（日本中小企業協会、中小企業白書）。</p>
                  <div class="p-maSec02-cnt-figures">
                    <figure class="p-maSec02-cnt-figure">
                      <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/ma/ma_figure01.png" alt="休廃業・解散件数と経営者平均年齢の推移" class="p-maSec02-cnt-img">
                    </figure>
                    <figure class="p-maSec02-cnt-figure">
                      <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/ma/ma_figure02.png" alt="休廃業・解散企業の代表者年齢の構成比" class="p-maSec02-cnt-img">
                    </figure>
                  </div>
                </div>
                <!-- /.p-maSec02-cnt -->
                <div class="p-maSec02-cnt">
                  <h3 class="p-maSec02-cnt-ttl">中小企業のM&Aの現状</h3>
                  <h4 class="p-maSec02-cnt-copy">M&A件数は増加傾向にあり、経営者年齢が若い企業ほど積極性が高い</h4>
                  <p class="p-maSec02-cnt-text">一方で中小企業のM&Aの実施状況は、公表されていないことも多く、データの制約も大きいです。しかし、中小企業庁のサイトから引用した図表を見ると、中小企業M&A仲介上場3社および事業 承継・引継ぎ支援センターの成約件数が増加傾向にあることが分かります。また、別の表では経営者年齢が若い企業では、新事業分野への積極的な取組みが行われている様子が見て取れます。
                  <br>こうした事実から、経営者年齢が若い企業では新たな取組みに果敢にチャレンジする企業が多く、M&Aへの積極性がうかがえます。</p>
                  <div class="p-maSec02-cnt-figures">
                    <figure class="p-maSec02-cnt-figure">
                      <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/ma/ma_figure03.png" alt="M&A件数の推移" class="p-maSec02-cnt-img">
                    </figure>
                    <figure class="p-maSec02-cnt-figure">
                      <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/ma/ma_figure04.png" alt="M&Aの相手先経営者の年齢別に見た、相手先のM&Aの目的" class="p-maSec02-cnt-img">
                    </figure>
                  </div>
                </div>
                <!-- /.p-maSec02-cnt -->
              </div>
              <!-- /.p-maSec02-inner -->
            </section>

            <section class="p-maSec03">
              <div class="p-maSec03-inner">
                <div class="p-maSec03-task">
                  <div class="p-maSec03-task-inner u-zindex_1 u-tb-show"  style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/ma/ma_sec02_bg_sp.png);"></div>
                  <div class="p-maSec03-task-inner u-zindex_1 u-tb-none"  style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/ma/ma_sec02_bg.png);">
                    <h2 class="p-maSec03-task-copy">M&Aをお考えの経営者様、<br class="u-pc-l-show">こんな課題を抱えていませんか？</h2>
                    <ul class="p-maSec03-task-list">
                      <li class="p-maSec03-task-item">事業を継承してくれる<br class="u-pc-show">人材がいない<br>これからの事業をどうしよう？</li>
                      <li class="p-maSec03-task-item">M&Aに関心はあるが、<br>資金調達や財務戦略に<br class="u-pc-show">心配がある</li>
                      <li class="p-maSec03-task-item">M&Aに関心はあるが、<br>やはり仲介手数料が<br class="u-pc-show">高額だと思う</li>
                      <li class="p-maSec03-task-item">現状の事業は順調だが<br class="u-pc-show">利益が頭打ち。<br>新規事業を展開し、<br class="u-pc-show">グループ企業として<br>事業拡張していきたい</li>
                      <li class="p-maSec03-task-item">M&Aについて<br>気軽に相談出来る場が欲しい</li>
                      <li class="p-maSec03-task-item">M&A成約後の<br>コンサルティング対策が欲しい</li>
                    </ul>
                  </div>
                  <!-- /.p-maSec03-task-inner -->
                </div>
                <div class="p-maSec03-support">
                  <div class="p-maSec03-support-inner">
                    <h2 class="p-maSec03-support-copy">当社の実務経験から得た<br class="u-pc-l-show">豊富で的確なノウハウと<br class="u-sp-show">専門スタッフが、<br>経営者様と二人三脚で<br class="u-tb-show">最善のM&Aをすすめます</h2>
                    <div class="p-maSec03-support-wrap">
                      <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/ma/ma_img01.png" alt="当社の実務経験から得た豊富で的確なノウハウと専門スタッフが、経営者様と二人三脚で最善のM&Aをすすめます" class="p-maSec03-support-img">
                      <p class="p-maSec03-support-text">当社はM&A仲介会社として、合併・買収案件をお手伝いしております。M&Aは企業にとって重要な戦略的な 取引であり、成功することでさまざまな利点を得ることができます。当社では適切な事業承継のプロセスをサポート し、世代交代による円滑な経営継続を実現します。また、市場動向や業界のトレンドに精通し、中小企業の売 り手様と買い手様の両方の意見を丁寧に聞き取り、最善のマッチングを実現するために努め、お客様の成長を 促進します。売却経験や購買経験を持つ経営者の貴重な意見やアドバイスを直接お聞きいただける機会も設 けさせていただき、実体験に基づいたアドバイスが提供出来るのも当社の特長です。その他、M&Aに関わるすべて のご要望、お悩みに経営者様に寄り添ってまいります。まずはお気軽にご相談ください。</p>
                    </div>
                    <!-- /.p-maSec03-support-wrap -->
                  </div>
                  <!-- /.p-maSec03-support-inner -->
                </div>
                <!-- /.p-maSec03-support -->
              </div>
              <!-- /.p-maSec03-inner -->
            </section>
            <?php get_template_part('template-parts/cta') ?>
            <?php get_template_part('template-parts/recommend') ?>
          </main>
          <?php get_template_part('template-parts/footer') ?>
    </div><!-- l-wrap -->


    </html>
