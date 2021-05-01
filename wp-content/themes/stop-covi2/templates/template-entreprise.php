<?php /* Template Name: Qui sommes-nous ? */ ?>
<?php get_header(); ?>

<main id="main">
  <section>
    <?php
    $bloc = get_field('bloc');
    if ($bloc) :
      $image = $bloc['image'];
      $texte = $bloc['texte']; ?>
      <article>
        <h1><?php the_title(); ?></h1>
      </article>
      <article class="presentation">
        <div class="image">
          <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" />
        </div>
        <div class="texte">
          <?= $texte ?>
        </div>
      </article>
    <?php endif; ?>

    <article>
      <?php the_content(); ?>
    </article>
  </section>
</main>

<?php get_footer(); ?>
