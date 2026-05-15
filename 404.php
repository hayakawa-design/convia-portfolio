<?php get_header(); ?>

<nav class="c-breadcrumb" aria-label="パンくずリスト">
  <ol class="c-breadcrumb__list">
    <li class="c-breadcrumb__item">
      <a href="<?php echo home_url('/'); ?>" class="c-breadcrumb__link">TOP</a>
    </li>
    <li class="c-breadcrumb__sep" aria-hidden="true">｜</li>
    <li class="c-breadcrumb__item" aria-current="page">404</li>
  </ol>
</nav>

<main class="p-404">

  <div class="p-404__decos-tl" aria-hidden="true">
    <span></span><span></span><span></span><span></span>
  </div>

  <div class="p-404__decos-br" aria-hidden="true">
    <span></span><span></span><span></span><span></span>
  </div>

  <div class="p-404__inner">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Convia" class="p-404__logo" />

    <div class="p-404__body">
      <div class="p-404__text-group">
        <p class="p-404__number">４０４</p>
        <div class="p-404__desc">
          <p>お探しのページが見つかりません。</p>
          <p>URLが変更されたか、ページが削除された可能性があります。</p>
        </div>
      </div>

      <?php $contact_url = get_permalink(get_page_by_path('contact')) ?: home_url('/contact/'); ?>
      <a href="<?php echo esc_url($contact_url); ?>" class="c-btn">
        <span class="c-btn__text">協業・制作について相談する</span>
        <span class="c-btn__icon" aria-hidden="true"></span>
      </a>
    </div>
  </div>

</main>

<?php get_footer(); ?>
