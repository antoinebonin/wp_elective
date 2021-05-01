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
        </div>
      </article>
    <?php endif; ?>


    <?php
    $colonne = get_field('colonne');
    if ($colonne) :
      $col1 = $colonne['colonne1'];
      $col2 = $colonne['colonne2'];
      $col3 = $colonne['colonne3'];
      $icon1 = $colonne['icon1'];
      $icon2 = $colonne['icon2'];
      $icon3 = $colonne['icon3'];  ?>
    <div class="colonne">
      <div class="col">
        <div class="icon">
          <img src="<?= $icon1['url'] ?>" alt="<?= $icon1['alt'] ?>" />
        </div>
          <div class="content">
            <?= $col1 ?>
          </div>
      </div>
      <div class="col">
        <div class="icon">
          <img src="<?= $icon2['url'] ?>" alt="<?= $icon2['alt'] ?>" />
        </div>
          <div class="content">
            <?= $col2 ?>
          </div>
      </div>
      <div class="col">
        <div class="icon">
          <img src="<?= $icon3['url'] ?>" alt="<?= $icon3['alt'] ?>" />
        </div>
          <div class="content">
            <?= $col3 ?>
          </div>
      </div>
    </div>
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
