<?php get_header(); ?>

<main id="main">
  <section>
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
          <?php if (is_woocommerce()) { woocommerce_breadcrumb(); } ?>

          <div class="post-content">
            <?php the_content(); ?>
          </div>
        </article>
      <?php endwhile; ?>
    <?php endif; ?>
  </section>
</main>

<?php get_footer(); ?>
