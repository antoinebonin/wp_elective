<?php get_header(); ?>

<main id="main">
  <section>
    <?php if ( have_posts() ): ?>
      <?php while ( have_posts() ): the_post(); ?>
        <article <?php post_class(); ?>>
          <h1 class="post-title"><?php the_title(); ?></h1>
          <div class="post-content">
            <?php if (in_array('post-0', get_post_class())): //si la page est une page d'archive ?>
              <?php if (strlen(get_the_content()) == 42): //si le contenu est null ?>
                <p>Aucun contenu trouvé.</p>
                <p><a class="go-to-shop" href="<?= get_permalink(6) ?>">Retourner à la boutique</a></p>
              <?php else: ?>
                <?php the_content(); ?>
              <?php endif; ?>
            <?php else: ?>
              <?php the_content(); ?>
            <?php endif; ?>
          </div>
        </article>
      <?php endwhile; ?>
    <?php endif; ?>
  </section>
</main>

<?php get_footer(); ?>
