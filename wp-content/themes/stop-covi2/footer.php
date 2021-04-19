    <footer>
      <div class="container">
        <div class="sitemap">
          <b>Plan du site</b>

          <?php if ( has_nav_menu( 'footer-sitemap-menu' ) ) : ?>
            <?php wp_nav_menu ( array (
              'theme_location' => 'footer-sitemap-menu'
            ) ); ?>
          <?php endif; ?>
        </div>

        <div class="categories">
          <b>Catégories</b>

          <?php get_menu_categories(); ?>
        </div>

        <div class="contact">
          <b>Contact</b>

          <?php if ( has_nav_menu( 'footer-contact-menu' ) ) : ?>
            <?php wp_nav_menu ( array (
              'theme_location' => 'footer-contact-menu'
            ) ); ?>
          <?php endif; ?>
        </div>

        <div class="informations">
          <b>Réseaux sociaux</b>

          <p><a target="blank" href="https://www.facebook.com/">Facebook</a></p>
          <p><a target="blank" href="https://www.instagram.com/">Instagram</a></p>
          <p><a href="mailto:antoinebonin69@gmail.com">Écrivez-nous par mail</a></p>
        </div>
      </div>

      <div class="credits">
        <p>Stop Covi2 &copy; <?= Date('Y') ?></p>
      </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>
