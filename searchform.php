<form role="search" method="get" id="searchform" class="searchform" action="<?= esc_url(home_url('/')) ?>">
  <div>
    <label class="screen-reader-text" for="s">検索:</label>
    <input type="text" value="" name="s" id="s" placeholder="SEARCH">
    <input type="submit" id="searchsubmit" value="検索">
  </div>
</form>