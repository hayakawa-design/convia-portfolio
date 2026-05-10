<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- google-font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap"
      rel="stylesheet"
    />

    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- ヘッダー -->
    <header class="l-header">
      <div class="l-header__inner">
        <!-- ロゴ -->
        <div class="l-header__logo">
          <a href="<?php echo home_url('/'); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Convia" />
          </a>
        </div>

        <!-- グローバルメニュー（PC） -->
        <nav class="l-header__nav">
          <?php wp_nav_menu([
            'theme_location' => 'global-menu',
            'container'      => false,
            'menu_class'     => 'c-global-menu',
            'fallback_cb'    => false,
          ]); ?>
        </nav>

        <!-- ハンバーガーメニューボタン（SP） -->
        <button class="c-hamburger u-hidden-md" aria-label="メニューを開く">
          <span class="c-hamburger__line"></span>
          <span class="c-hamburger__line"></span>
          <span class="c-hamburger__line"></span>
        </button>
      </div>

      <!-- モーダルメニュー（SP） -->
      <div class="c-modal-menu u-hidden-md">
        <nav class="c-modal-menu__nav">
          <?php wp_nav_menu([
            'theme_location' => 'global-menu',
            'container'      => false,
            'menu_class'     => 'c-modal-menu__list',
            'fallback_cb'    => false,
          ]); ?>
        </nav>
      </div>
    </header>
