<?php get_header(); the_post(); ?>

<main id="main">
  <section>
    <article>
			<h1 class="page-title">Résultats de la recherche</h1>
      <?php if ( have_posts() ) : ?>
        <ul class="products">
          <?php while ( have_posts() ) :
            the_post();
            wc_get_template_part( 'content', 'product' );
          endwhile; ?>
        </ul>
  		<?php else : ?>
        <p>Aucun contenu trouvé.</p>
        <p><a class="go-to-shop" href="<?= get_permalink(7) ?>">Retourner à la boutique</a></p>
  		<?php endif; ?>
    </article>
  </section>
</main>

<?php get_footer(); ?>
