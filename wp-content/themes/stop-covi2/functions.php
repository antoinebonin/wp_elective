<?php

function theme_setup() {
	if ( ! isset( $content_width ) ) $content_width = 1200;
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'menus' );
	add_theme_support( 'post-thumbnails' );
	add_filter( 'show_admin_bar', '__return_false' );
}
add_action( 'after_setup_theme', 'theme_setup' );

wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array ( 'jquery' ), 1.1, true);

// Création des menus
function register_my_menus() {
	register_nav_menus(
		array(
			'principal-menu' 			=> __('Menu principal' ),
			'mobile-menu'   			=> __('Menu mobile' ),
			'footer-sitemap-menu' => __('Menu footer - Sitemap'),
			'footer-contact-menu' => __('Menu footer - Contact')
		)
	);
}
add_action( 'init', 'register_my_menus' );

// Création des widgets
function last_product_widgets_init() {
	register_sidebar(
		array(
			'name' => 'Derniers produits',
			'id' => 'last-products',
			'before_widget' => '<div class="last-product-container">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="last-product-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'last_product_widgets_init' );

function best_product_widgets_init() {
	register_sidebar(
		array(
			'name' => 'Meilleurs produits',
			'id' => 'best-products',
			'before_widget' => '<div class="best-product-container">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="best-product-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'best_product_widgets_init' );

// Reorganisation de la page produit
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 20);
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 30 );
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 40);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

// Réorganisation des produits de la page boutique
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

add_action ('woocommerce_shop_loop_item_image', 'woocommerce_template_loop_product_thumbnail', 10);
add_action ('woocommerce_shop_loop_item_image', 'woocommerce_template_loop_price', 10);

// Affichage des catégories en liste
function get_all_categories() {
	$taxonomy     = 'product_cat';
	$show_count   = 0;      // 1 for yes, 0 for no
	$pad_counts   = 0;      // 1 for yes, 0 for no
	$hierarchical = 1;      // 1 for yes, 0 for no
	$title        = '';
	$empty        = 0;

	$args = array(
	 'taxonomy'     => $taxonomy,
	 'show_count'   => $show_count,
	 'pad_counts'   => $pad_counts,
	 'hierarchical' => $hierarchical,
	 'title_li'     => $title,
	 'hide_empty'   => $empty
	);

	$all_categories = get_categories( $args );
	if (count($all_categories) != 0) {
	 echo '<ul class="categories">';
	 foreach ($all_categories as $cat) {
		if($cat->category_parent == 0) {
			$category_id = $cat->term_id;
			$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
			$image = wp_get_attachment_url( $thumbnail_id );
			?>
			<li class="categorie-view">
				<a class="image" href="<?= get_term_link($cat->slug, 'product_cat') ?>">
					<img src="<?= $image ?>" alt="<?= $cat->name ?>" />
				</a>
				<a class="title" href="<?= get_term_link($cat->slug, 'product_cat') ?>">
					<span class="product-title"><?= $cat->name ?></span>
				</a>
			</li>
			<?php
			}
		}
		echo '</ul>';
	}
}

function get_menu_categories() {
	$taxonomy     = 'product_cat';
	$show_count   = 0;      // 1 for yes, 0 for no
	$pad_counts   = 0;      // 1 for yes, 0 for no
	$hierarchical = 1;      // 1 for yes, 0 for no
	$title        = '';
	$empty        = 0;

	$args = array(
	 'taxonomy'     => $taxonomy,
	 'show_count'   => $show_count,
	 'pad_counts'   => $pad_counts,
	 'hierarchical' => $hierarchical,
	 'title_li'     => $title,
	 'hide_empty'   => $empty
	);

	$all_categories = get_categories( $args );
	if (count($all_categories) != 0) {
	 echo '<ul id="menu-categories">';
	 foreach ($all_categories as $cat) {
		if($cat->category_parent == 0) {
			$category_id = $cat->term_id;
			$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
			$image = wp_get_attachment_url( $thumbnail_id );
			?>
			<li class="categorie-view">
				<a class="image" href="<?= get_term_link($cat->slug, 'product_cat') ?>">
					<img src="<?= $image ?>" alt="<?= $cat->name ?>" />
				</a>
				<a class="title" href="<?= get_term_link($cat->slug, 'product_cat') ?>">
					<span class="product-title"><?= $cat->name ?></span>
				</a>
			</li>
			<?php
			}
		}
		echo '</ul>';
	}
}

// Modification des filtres woocommerce
add_filter("woocommerce_catalog_orderby", function ($tab) {
	unset($tab["popularity"]);
	unset($tab["rating"]);

	return $tab;
});
