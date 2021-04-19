<?php /* Template Name: Accueil */ ?>
<?php get_header(); ?>

<main id="main" class="on-top">
  <section>
    <?php
    $bloc = get_field('bloc');
    if ($bloc) :
      $image = $bloc['image'];
      $texte = $bloc['texte']; ?>
      <article class="presentation">
        <div class="image">
          <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" />
        </div>
        <div class="texte">
          <?= $texte ?>
          <br />
          <p><a href="<?= get_permalink(6) ?>">Visiter la boutique</a></p>
        </div>
      </article>
    <?php endif; ?>
    
    <article class="categories-list">
      <h2>Les catégories</h2>
      <?php get_all_categories(); ?>
    </article>

    <?php if ( is_active_sidebar( 'last-products' ) ) : ?>
      <article class="last-products">
        <?php dynamic_sidebar( 'last-products' ); ?>
      </article>
    <?php endif; ?>

    <?php if ( is_active_sidebar( 'best-products' ) ) : ?>
      <article class="best-products">
        <?php dynamic_sidebar( 'best-products' ); ?>
      </article>
    <?php endif; ?>
  </section>
</main>

<?php get_footer(); ?>
