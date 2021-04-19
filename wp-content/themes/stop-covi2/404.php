<?php get_header(); ?>

<main id="main">
  <section>
    <article class="page-404">
      <h1 class="post-title">Page non trouvée</h1>
      <div class="post-content">
        <p>Malheureusement, la page n'existe plus ...</p>
        <p>Mais vous pouvez toujours visiter notre boutique en cliquant <a href="<?= get_permalink(6) ?>">ici</a> !</p>
      </div>
    </article>
  </section>
</main>

<?php get_footer(); ?>
