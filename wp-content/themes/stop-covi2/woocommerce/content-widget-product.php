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

	<?php
	$variations = $product->get_children();
	if ($variations) :
		$max_price = 0;
		$min_price = 10**15;
		foreach ($variations as $sub_product){
			$single_variation = new WC_Product_Variation($sub_product);
			if ($single_variation->price > $max_price){
				$max_price = $single_variation->price;
			}
			if ($single_variation->price < $min_price){
				$min_price = $single_variation->price;
			}
		}
		?>
		<a class="image" href="<?= esc_url( $product->get_permalink() ); ?>">
			<?= $product->get_image(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<span class="woocommerce-Price-amount amount">
				<?= number_format((float)$min_price, 2, ',', '') . get_woocommerce_currency_symbol() . ' - ' . number_format((float)$max_price, 2, ',', '') . get_woocommerce_currency_symbol(); ?>
			</span>
		</a>
	<?php else: ?>
		<?php $on_sale = false; if ($product->get_sale_price()) { $on_sale = true; } ?>

		<?php if ($on_sale) : ?>
			<a class="image on-sale" href="<?= esc_url( $product->get_permalink() ); ?>">
				<?= $product->get_image(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<span class="woocommerce-Price-amount amount">
					<del><i><?= number_format((float)$product->get_regular_price(), 2, ',', '') . get_woocommerce_currency_symbol(); ?></i></del>
					<span> <?= number_format((float)$product->get_sale_price(), 2, ',', '') . get_woocommerce_currency_symbol(); ?></span>
				</span>
			</a>
		<?php else : ?>
			<a class="image" href="<?= esc_url( $product->get_permalink() ); ?>">
				<?= $product->get_image(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<?= $product->get_price_html(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</a>
		<?php endif; ?>
	<?php endif; ?>

	<a class="title <?php if ($on_sale) { ?>on-sale<?php } ?>" href="<?= esc_url( $product->get_permalink() ); ?>">
		<span class="product-title"><?= wp_kses_post( $product->get_name() ); ?></span>
	</a>

	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
</li>
