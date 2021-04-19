<?php get_header(); ?>
<main id="main">
  <section>
    <article>
      <?php get_template_part('loop'); ?>
      <?php previous_posts_link(); ?>
      <?php next_posts_link(); ?>
    </article>
  </section>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
