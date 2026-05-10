<?php get_header(); ?>

    <section class="p-fv">
      <div class="p-fv__inner">
        <div class="p-fv__container">
          <div class="p-fv__logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fv-logo.svg" alt="" />
          </div>
          <div class="p-fv__lead">
            <div class="p-fv__lead-main">
              <p>"あたらしい道"をひらめきで作り上げる</p>
              <p>お客様のビジネスに寄り添い向き合う</p>
              <p>connect（繋がり）のCが4つ向かい合って話し合っている</p>
            </div>
            <div class="p-fv__lead-sub">
              <div class="p-fv__heading">
                <p>信頼されるWeb制作を、</p>
                <p>チームで実現する。</p>
              </div>
              <p class="p-fv__body">
                私たちは、それぞれの専門性を持ち寄り、クライアントと誠実に向き合うWeb制作チームです。<br />
                企画・デザイン・実装を一貫して担い、本質的な価値を届けることを大切にしています。
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="p-fv__wave">
        <picture>
          <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/fv-wave-pc.svg" media="(min-width: 768px)" />
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fv-wave-sp.svg" alt="" />
        </picture>
      </div>
    </section>

    <main>
      <!-- CTA -->
      <section class="p-cta">
        <div class="p-cta__inner">
          <h2 class="p-cta__heading">協業・制作のご相談</h2>
          <p class="p-cta__body">プロジェクトのご相談や、チームでの協業についてお気軽にお問い合わせください。<br />まずはお話を伺い、最適な進め方をご提案いたします。</p>
          <a href="<?php echo home_url('/contact/'); ?>" class="c-btn">
            <span class="c-btn__text">協業・制作について相談する</span>
            <span class="c-btn__icon" aria-hidden="true"></span>
          </a>
        </div>
      </section>

      <!-- Works -->
      <section class="p-works">
        <div class="p-works__wave-top" aria-hidden="true">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 375 31.25" preserveAspectRatio="none">
            <path d="M0 14.2965C33.1923 3.50803 118.4 -11.5959 193.691 14.2965C224.31 24.5506 303.438 38.9064 375 14.2965L375 31.25L0 31.25L0 14.2965Z" fill="#d4e3e8"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none">
            <path d="M0 54.8987C127.458 13.4708 454.655 -44.5281 743.775 54.8987C861.35 94.2745 1165.2 149.401 1440 54.8987L1440 120L0 120L0 54.8987Z" fill="#d4e3e8"/>
          </svg>
        </div>
        <div class="p-works__inner">
          <h2 class="c-section-heading">
            <span class="c-section-heading__en">Works</span>
            <span class="c-section-heading__ja">実績</span>
          </h2>
          <ul class="p-works__list">
            <?php
            $works_query = new WP_Query([
              'post_type'      => 'works_post',
              'posts_per_page' => 3,
              'orderby'        => 'date',
              'order'          => 'DESC',
            ]);
            if ($works_query->have_posts()) :
              while ($works_query->have_posts()) : $works_query->the_post();
            ?>
            <li>
              <a href="<?php the_permalink(); ?>" class="c-works-card">
                <div class="c-works-card__img">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
                  <?php endif; ?>
                </div>
                <div class="c-works-card__body">
                  <p class="c-works-card__title"><?php the_title(); ?></p>
                  <p class="c-works-card__text"><?php echo wp_trim_words(wp_strip_all_tags(get_the_content()), 40); ?></p>
                </div>
              </a>
            </li>
            <?php
              endwhile;
              wp_reset_postdata();
            endif;
            ?>
          </ul>
          <a href="<?php echo home_url('/works/'); ?>" class="c-btn">
            <span class="c-btn__text">制作実績を見る</span>
            <span class="c-btn__icon" aria-hidden="true"></span>
          </a>
        </div>
        <div class="p-works__wave-bottom" aria-hidden="true">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 375 26.04" preserveAspectRatio="none">
            <path d="M0 14.8904C47.0199 3.65376 166.51 -12.0776 268.311 14.8904C286.887 20.3592 334.232 28.0155 375 14.8904L375 26.0417L0 26.0417L0 14.8904Z" fill="#d4e3e8"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100" preserveAspectRatio="none">
            <path d="M0 57.1792C180.556 14.0304 639.398 -46.3778 1030.32 57.1792C1101.65 78.1792 1283.45 107.579 1440 57.1792L1440 100L0 100L0 57.1792Z" fill="#d4e3e8"/>
          </svg>
        </div>
      </section>

      <!-- News -->
      <section class="p-news">
        <div class="p-news__inner">
          <h2 class="c-section-heading">
            <span class="c-section-heading__en">News</span>
            <span class="c-section-heading__ja">お知らせ</span>
          </h2>
          <ul class="p-news__list">
            <?php
            $news_query = new WP_Query([
              'post_type'      => 'post',
              'posts_per_page' => 3,
              'orderby'        => 'date',
              'order'          => 'DESC',
            ]);
            if ($news_query->have_posts()) :
              while ($news_query->have_posts()) : $news_query->the_post();
            ?>
            <li>
              <a href="<?php the_permalink(); ?>" class="c-news-card">
                <div class="c-news-card__img">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
                  <?php endif; ?>
                </div>
                <div class="c-news-card__body">
                  <p class="c-news-card__title"><?php the_title(); ?></p>
                  <p class="c-news-card__date"><?php echo get_the_date('Y.m.d'); ?></p>
                  <p class="c-news-card__text"><?php echo wp_trim_words(wp_strip_all_tags(get_the_content()), 40); ?></p>
                </div>
              </a>
            </li>
            <?php
              endwhile;
              wp_reset_postdata();
            endif;
            ?>
          </ul>
          <a href="<?php echo home_url('/news/'); ?>" class="c-btn">
            <span class="c-btn__text">お知らせをもっと見る</span>
            <span class="c-btn__icon" aria-hidden="true"></span>
          </a>
        </div>
      </section>

      <!-- About Us -->
      <section class="p-about">
        <div class="p-about__wave-top" aria-hidden="true">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 375 31.25" preserveAspectRatio="none">
            <path d="M0 14.2965C33.1923 3.50803 118.4 -11.5959 193.691 14.2965C224.31 24.5506 303.438 38.9064 375 14.2965L375 31.25L0 31.25L0 14.2965Z" fill="#d4e3e8"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none">
            <path d="M0 54.8987C127.458 13.4708 454.655 -44.5281 743.775 54.8987C861.35 94.2745 1165.2 149.401 1440 54.8987L1440 120L0 120L0 54.8987Z" fill="#d4e3e8"/>
          </svg>
        </div>
        <div class="p-about__inner">
          <h2 class="c-section-heading">
            <span class="c-section-heading__en">About us</span>
            <span class="c-section-heading__ja">私たちについて</span>
          </h2>
          <div class="p-about__img">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about-img.png" alt="" />
          </div>
          <p class="p-about__body">
            私たちは、それぞれの専門性を持ち寄り、クライアントと誠実に向き合うWeb制作チームです。<br />
            企画・デザイン・実装を一貫して担い、本質的な価値を届けることを大切にしています。
          </p>
          <a href="<?php echo home_url('/about/'); ?>" class="c-btn">
            <span class="c-btn__text">メンバーのプロフィールを見る</span>
            <span class="c-btn__icon" aria-hidden="true"></span>
          </a>
        </div>
        <div class="p-about__wave-bottom" aria-hidden="true">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 375 31.25" preserveAspectRatio="none">
            <path d="M0 14.2965C33.1923 3.50803 118.4 -11.5959 193.691 14.2965C224.31 24.5506 303.438 38.9064 375 14.2965L375 31.25L0 31.25L0 14.2965Z" fill="#d4e3e8"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none">
            <path d="M0 54.8987C127.458 13.4708 454.655 -44.5281 743.775 54.8987C861.35 94.2745 1165.2 149.401 1440 54.8987L1440 120L0 120L0 54.8987Z" fill="#d4e3e8"/>
          </svg>
        </div>
      </section>

      <!-- Price -->
      <section class="p-price">
        <div class="p-price__inner">
          <h2 class="c-section-heading">
            <span class="c-section-heading__en">Price</span>
            <span class="c-section-heading__ja">料金</span>
          </h2>
          <div class="p-price__cards">
            <div class="c-price-card">
              <div class="c-price-card__head">
                <p class="c-price-card__name">スタートアッププラン</p>
                <p class="c-price-card__price">15万円〜</p>
                <p class="c-price-card__type">WordPressのテーマを元に作るサイト</p>
              </div>
              <div class="c-price-card__body">
                <p class="c-price-card__tagline">予算は抑えたいけれど、<br />ページ数は必要な方におすすめ</p>
                <ul class="c-price-card__features">
                  <li class="c-price-card__feature">WordPressのブロックテーマを元に最小限のカスタマイズで必要コンテンツを取り入れて制作します。</li>
                  <li class="c-price-card__feature">お問い合わせフォーム設置</li>
                  <li class="c-price-card__feature">レスポンシブ対応</li>
                </ul>
              </div>
            </div>
            <div class="c-price-card">
              <div class="c-price-card__head">
                <p class="c-price-card__name">スタンダードプラン</p>
                <p class="c-price-card__price">30万円〜</p>
                <p class="c-price-card__type">WordPressのオリジナルテーマで作るサイト</p>
              </div>
              <div class="c-price-card__body">
                <p class="c-price-card__tagline">問い合わせに繋がる<br />集客を意識した設計</p>
                <ul class="c-price-card__features">
                  <li class="c-price-card__feature">WordPressのオリジナルテーマを作り、自由度の高いデザインで様々なコンテンツを取り入れて制作します。</li>
                  <li class="c-price-card__feature">基本SEO設計</li>
                  <li class="c-price-card__feature">リリース後30日間の無料サポート</li>
                </ul>
              </div>
            </div>
            <div class="c-price-card">
              <div class="c-price-card__head">
                <p class="c-price-card__name">アドバンスプラン</p>
                <p class="c-price-card__price">60万円〜</p>
                <p class="c-price-card__type">オリジナルテーマでSEO設計を強化したサイト</p>
              </div>
              <div class="c-price-card__body">
                <p class="c-price-card__tagline">戦略設計まで含めた<br />売り上げに繋げるサイト</p>
                <ul class="c-price-card__features">
                  <li class="c-price-card__feature">SEO内部強化設定はもちろん、Googleアナリティクスやサーチコンソールで戦略的に売り上げに繋がるサイトを設計します。</li>
                  <li class="c-price-card__feature">SNSシェアボタン設置</li>
                  <li class="c-price-card__feature">顧客管理サポート</li>
                </ul>
              </div>
            </div>
          </div>
          <p class="p-price__note">こちらのプラン以外にも達成したい目標とご予算に合わせて最適なプランを柔軟に提案させていただきます。<br />まずはお気軽にご相談ください。</p>
          <a href="<?php echo home_url('/contact/'); ?>" class="c-btn">
            <span class="c-btn__text">協業・制作について相談する</span>
            <span class="c-btn__icon" aria-hidden="true"></span>
          </a>
        </div>
      </section>

      <!-- Flow -->
      <section class="p-flow">
        <div class="p-flow__wave-top" aria-hidden="true">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 375 31" preserveAspectRatio="none">
            <path d="M0 14.1822C33.1923 3.47997 118.4 -11.5031 193.691 14.1822C224.31 24.3542 303.438 38.5952 375 14.1822L375 31L0 31L0 14.1822Z" fill="#d4e3e8"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none">
            <path d="M0 54.8987C127.458 13.4708 454.655 -44.5281 743.775 54.8987C861.35 94.2745 1165.2 149.401 1440 54.8987L1440 120L0 120L0 54.8987Z" fill="#d4e3e8"/>
          </svg>
        </div>
        <div class="p-flow__inner">
          <h2 class="c-section-heading">
            <span class="c-section-heading__en">Flow</span>
            <span class="c-section-heading__ja">ご依頼の流れ</span>
          </h2>
          <div class="p-flow__list">
            <div class="c-flow-card">
              <div class="c-flow-card__head">
                <p class="c-flow-card__step">STEP 01</p>
                <div class="c-flow-card__icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/flow-icon-01.svg" alt="" />
                </div>
              </div>
              <div class="c-flow-card__body">
                <p class="c-flow-card__title">お問い合わせ・ご相談</p>
                <p class="c-flow-card__text">まずはお気軽にお問い合わせください。<br />制作内容が未定でも問題ありません。</p>
              </div>
            </div>
            <div class="c-flow-arrow" aria-hidden="true"></div>
            <div class="c-flow-card">
              <div class="c-flow-card__head">
                <p class="c-flow-card__step">STEP 02</p>
                <div class="c-flow-card__icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/flow-icon-02.svg" alt="" />
                </div>
              </div>
              <div class="c-flow-card__body">
                <p class="c-flow-card__title">ヒアリング</p>
                <p class="c-flow-card__text">目的・ターゲット・ご予算・納期などをお伺いし、<br />最適な制作プランをご提案します。</p>
              </div>
            </div>
            <div class="c-flow-arrow" aria-hidden="true"></div>
            <div class="c-flow-card">
              <div class="c-flow-card__head">
                <p class="c-flow-card__step">STEP 03</p>
                <div class="c-flow-card__icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/flow-icon-03.svg" alt="" />
                </div>
              </div>
              <div class="c-flow-card__body">
                <p class="c-flow-card__title">お見積り・ご契約</p>
                <p class="c-flow-card__text">制作内容とスケジュールをご提示します。<br />内容にご納得いただけましたら制作開始となります。</p>
              </div>
            </div>
            <div class="c-flow-arrow" aria-hidden="true"></div>
            <div class="c-flow-card">
              <div class="c-flow-card__head">
                <p class="c-flow-card__step">STEP 04</p>
                <div class="c-flow-card__icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/flow-icon-04.svg" alt="" />
                </div>
              </div>
              <div class="c-flow-card__body">
                <p class="c-flow-card__title">構成・デザイン制作</p>
                <p class="c-flow-card__text">構成案を確認後、デザイン制作を進めます。<br />チーム体制で品質チェックを行いながら制作します。</p>
              </div>
            </div>
            <div class="c-flow-arrow" aria-hidden="true"></div>
            <div class="c-flow-card">
              <div class="c-flow-card__head">
                <p class="c-flow-card__step">STEP 05</p>
                <div class="c-flow-card__icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/flow-icon-05.svg" alt="" />
                </div>
              </div>
              <div class="c-flow-card__body">
                <p class="c-flow-card__title">サイト実装</p>
                <p class="c-flow-card__text">デザイン確定後、コーディング・公開準備を行います。<br />スマートフォン対応や動作確認も丁寧に実施します。</p>
              </div>
            </div>
            <div class="c-flow-arrow" aria-hidden="true"></div>
            <div class="c-flow-card">
              <div class="c-flow-card__head">
                <p class="c-flow-card__step">STEP 06</p>
                <div class="c-flow-card__icon">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/flow-icon-06.svg" alt="" />
                </div>
              </div>
              <div class="c-flow-card__body">
                <p class="c-flow-card__title">納品・サポート</p>
                <p class="c-flow-card__text">公開後も軽微な修正や運用のご相談に対応可能です。<br />長期的に伴走できる体制を整えています。</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <?php get_template_part('template-parts/section-contact'); ?>

      <?php get_template_part('template-parts/section-brochure'); ?>
    </main>

<?php get_footer(); ?>
