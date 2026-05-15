<?php
/*
 * Template Name: Brochure Download
 */
get_header();
$cf7_id = get_option('convia_cf7_brochure_id');
if (!$cf7_id) {
    $forms = get_posts([
        'post_type'      => 'wpcf7_contact_form',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'title'          => 'Brochure Download',
    ]);
    if (!empty($forms)) {
        $cf7_id = $forms[0]->ID;
        update_option('convia_cf7_brochure_id', $cf7_id);
    }
}
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="p-page-fv">
  <h1 class="c-section-heading">
    <span class="c-section-heading__en">Brochure</span>
    <span class="c-section-heading__ja">サービス資料</span>
  </h1>
</section>

<main>
  <section class="p-brochure-dl">
    <div class="p-brochure-dl__inner">

      <p class="p-brochure-dl__lead">
        弊社の実績や料金体系などをご確認いただけるサービス資料をご提供しています。<br />
        フォームよりご請求いただくと、ご登録のメールアドレス宛にお送りします。
      </p>

      <?php if ($cf7_id) : ?>
        <?php echo do_shortcode('[contact-form-7 id="' . esc_attr($cf7_id) . '" title="Brochure Download"]'); ?>
      <?php endif; ?>

    </div>
  </section>

  <section class="p-brochure-dl-info">
    <div class="p-brochure-dl-info__inner">

      <div>
        <h2 class="p-brochure-dl-info__title">こんなご相談をお待ちしています</h2>
        <ul class="p-brochure-dl-info__list">
          <li class="p-brochure-dl-info__item">
            <span class="p-brochure-dl-info__dot" aria-hidden="true"></span>
            <span class="p-brochure-dl-info__item-text">Webサイトの新規制作やリニューアルについて</span>
          </li>
          <li class="p-brochure-dl-info__item">
            <span class="p-brochure-dl-info__dot" aria-hidden="true"></span>
            <span class="p-brochure-dl-info__item-text">デザインのみ、実装のみなど部分的なサポート</span>
          </li>
          <li class="p-brochure-dl-info__item">
            <span class="p-brochure-dl-info__dot" aria-hidden="true"></span>
            <span class="p-brochure-dl-info__item-text">チームでの協業や長期的なパートナーシップ</span>
          </li>
          <li class="p-brochure-dl-info__item">
            <span class="p-brochure-dl-info__dot" aria-hidden="true"></span>
            <span class="p-brochure-dl-info__item-text">既存サイトの改善提案や運用サポート</span>
          </li>
        </ul>
      </div>

      <div class="p-brochure-dl-info__note">
        <h2 class="p-brochure-dl-info__title">対応できないこと</h2>
        <p class="p-brochure-dl-info__note-text">
          申し訳ございませんが、納期が極端に短い案件や、予算が明らかに不足している場合は対応が難しい場合があります。まずはお気軽にご相談ください。
        </p>
      </div>

    </div>
  </section>
</main>

<?php get_footer(); ?>
