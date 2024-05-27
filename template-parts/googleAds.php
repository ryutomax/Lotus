<?php
  $ads_locate = "";
  if ( isset( $args['ads_locate'] ) ) {
    $ads_locate = $args['ads_locate'];
  }

  if ($ads_locate=="top"):
?>
<section class="p-top-googleAd">
  <div class="p-googleAd-inner"></div>
</section>

<?php elseif ($ads_locate=="mid"): ?>

<section class="p-mid-googleAd">
  <div class="p-googleAd-inner"></div>
</section>

<?php elseif ($ads_locate=="side"): ?>

<div class="p-side02"></div>

<?php elseif ($ads_locate=="side03"): ?>

<div class="p-side03"></div>

<?php elseif ($ads_locate=="side04"): ?>

<div class="p-side04"></div>

<?php endif; ?>