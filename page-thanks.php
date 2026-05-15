<?php
/*
 * Template Name: Thanks
 */
get_header();
$contact_url = get_permalink(get_page_by_path('contact')) ?: home_url('/contact/');
?>

<nav class="c-breadcrumb" aria-label="パンくずリスト">
  <ol class="c-breadcrumb__list">
    <li class="c-breadcrumb__item">
      <a href="<?php echo home_url('/'); ?>" class="c-breadcrumb__link">TOP</a>
    </li>
    <li class="c-breadcrumb__sep" aria-hidden="true">｜</li>
    <li class="c-breadcrumb__item">
      <a href="<?php echo esc_url($contact_url); ?>" class="c-breadcrumb__link">Contact</a>
    </li>
    <li class="c-breadcrumb__sep" aria-hidden="true">｜</li>
    <li class="c-breadcrumb__item" aria-current="page">お問い合わせ完了</li>
  </ol>
</nav>

<section class="p-page-fv">
  <h1 class="c-section-heading">
    <span class="c-section-heading__en">Thank you!</span>
    <span class="c-section-heading__ja">お問い合わせありがとうございます</span>
  </h1>
</section>

<main>
  <section class="p-thanks">
    <div class="p-thanks__inner">
      <p class="p-thanks__text">
        お問い合わせありがとうございます。<br />
        お問い合わせ内容を送信いたしました。<br />
        ご入力いただいたメールアドレスへ確認メールをお送りしました。<br />
        内容を確認の上、2〜3営業日以内にご返信いたします。
      </p>
    </div>
  </section>
</main>

<?php get_footer(); ?>
