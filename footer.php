    <!-- フッター -->
    <footer class="l-footer">
      <div class="l-footer__inner">
        <div class="l-footer__logo">
          <a href="<?php echo home_url('/'); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-footer.svg" alt="Convia" />
          </a>
        </div>
        <nav class="l-footer__nav">
          <?php wp_nav_menu([
            'theme_location' => 'footer-menu',
            'container'      => false,
            'menu_class'     => 'l-footer__list',
          ]); ?>
        </nav>
        <a href="<?php echo home_url('/privacy/'); ?>" class="l-footer__privacy">Privacy Policy</a>
        <p class="l-footer__copyright">©2026 convia site</p>
      </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>
