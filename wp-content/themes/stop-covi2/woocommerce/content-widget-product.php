<?php
/**
 * The template for displaying product widget entries.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

?>
<li class="product-view">
	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>

	<?php $on_sale = false; if ($product->get_sale_price()) { $on_sale = true; } ?>

	<a class="image <?php if ($on_sale) { ?>on-sale<?php } ?>" href="<?= esc_url( $product->get_permalink() ); ?>">
		<?= $product->get_image(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<?= $product->get_price_html(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</a>

	<a class="title <?php if ($on_sale) { ?>on-sale<?php } ?>" href="<?= esc_url( $product->get_permalink() ); ?>">
		<span class="product-title"><?= wp_kses_post( $product->get_name() ); ?></span>
	</a>

	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
</li>
