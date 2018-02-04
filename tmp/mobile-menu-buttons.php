<div class="mobile-menu-buttons">
  <?php if (has_nav_menu( 'navi-header' )): ?>
    <!-- メニューボタン -->
    <div class="navi-menu-button menu-button">
      <input id="navi-menu-input" type="checkbox" class="display-none">
      <label id="navi-menu-open" class="menu-open" for="navi-menu-input">
        <span class="navi-menu-icon menu-icon"></span>
        <span class="navi-menu-caption menu-caption"><?php _e( 'メニュー', THEME_NAME ) ?></span>
      </label>
      <label class="display-none" id="navi-menu-close" for="navi-menu-input"></label>
      <div id="navi-menu-content" class="navi-menu-content menu-content">
        <label class="navi-menu-close-button menu-close-button" for="navi-menu-input"></label>
        <?php //ヘッダーナビ
        wp_nav_menu(
          array (
            //カスタムメニュー名
            'theme_location' => 'navi-header',
            //ul 要素に適用するCSS クラス名
            'menu_class' => 'menu-drawer',
            //コンテナを表示しない
            'container' => false,
            //カスタムメニューを設定しない際に固定ページでメニューを作成しない
            'fallback_cb' => false,
          )
        ); ?>
        <!-- <label class="navi-menu-close-button menu-close-button" for="navi-menu-input"></label> -->
      </div>
    </div>
  <?php endif ?>


  <!-- ホームボタン -->
  <div class="home-menu-button menu-button">
    <a href="<?php echo site_url(); ?>">
      <div class="home-menu-icon menu-icon"></div>
      <div class="home-menu-caption menu-caption"><?php _e( 'ホーム', THEME_NAME ) ?></div>
    </a>
  </div>

  <!-- 検索ボタン -->
<!--
  <div class="search-menu-button menu-button">
    <a href="<?php echo site_url(); ?>">
      <div class="search-menu-icon menu-icon"></div>
      <div class="search-menu-caption menu-caption"><?php _e( '検索', THEME_NAME ) ?></div>
    </a>
  </div>
 -->
  <?php if (!is_amp()): ?>
    <!-- 検索ボタン -->
    <div class="search-menu-button menu-button">
      <input id="search-menu-input" type="checkbox" class="display-none">
      <label id="search-menu-open" class="menu-open" for="search-menu-input">
        <span class="search-menu-icon menu-icon"></span>
        <span class="search-menu-caption menu-caption"><?php _e( '検索', THEME_NAME ) ?></span>
      </label>
      <label class="display-none" id="search-menu-close" for="search-menu-input"></label>
      <div id="search-menu-content" class="search-menu-content">
        <?php //検索フォーム
        get_template_part('searchform') ?>
      </div>
    </div>
  <?php endif ?>



  <?php if (!is_amp()): ?>
  <!-- トップボタン -->
  <div class="top-menu-button menu-button">
    <div class="top-menu-icon menu-icon"></div>
    <div class="top-menu-caption menu-caption"><?php _e( 'トップ', THEME_NAME ) ?></div>
  </div>
  <?php endif ?>

  <?php if (is_active_sidebar( 'sidebar' ) || is_active_sidebar( 'sidebar-scroll' )): ?>
  <!-- サイドバーボタン -->
    <div class="sidebar-menu-button menu-button">
      <input id="sidebar-menu-input" type="checkbox" class="display-none">
      <label id="sidebar-menu-open" class="menu-open" for="sidebar-menu-input">
        <span class="sidebar-menu-icon menu-icon"></span>
        <span class="sidebar-menu-caption menu-caption"><?php _e( 'サイドバー', THEME_NAME ) ?></span>
      </label>
      <label class="display-none" id="sidebar-menu-close" for="sidebar-menu-input"></label>
      <div id="sidebar-menu-content" class="sidebar-menu-content menu-content">
        <label class="sidebar-menu-close-button menu-close-button" for="sidebar-menu-input"></label>
        <?php //サイドバー
        ob_start();
        get_template_part('sidebar');
        $sidebar = ob_get_clean();
        //ドロワーメニュー用のサイドバーからIDを削除（IDの重複HTML5エラー対応）
        $sidebar = preg_replace('/ id="[^"]+?"/i', '', $sidebar);
        echo $sidebar;
         ?>
        <!-- <label class="sidebar-menu-close-button menu-close-button" for="sidebar-menu-input"></label> -->
      </div>
    </div>
  <?php endif ?>


</div>