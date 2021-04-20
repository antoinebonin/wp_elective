<?php
/**
 * The template for displaying product content within loops
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li class="product-view">
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
  ?>

	<?php
	$on_sale = false;
	$variations = $product->get_children();
	if ($variations) {
		foreach ($variations as $sub_product){
			$single_variation = new WC_Product_Variation($sub_product);
			$on_sale = $single_variation->get_sale_price() ? true : $on_sale;
		}
	} else {
		$on_sale = $product->get_sale_price() ? true : false;
	}
	?>

  <span class="item-image <?php if ($on_sale) { ?>on-sale<?php } ?>">
    <?php
  	/**
  	 * Hook: woocommerce_before_shop_loop_item_title.
  	 *
  	 * @hooked woocommerce_template_loop_product_thumbnail - 10
  	 * @hooked woocommerce_template_loop_price - 20
  	 */
  	do_action( 'woocommerce_shop_loop_item_image' );
    ?>
  </span>

  <span class="item-title <?php if ($on_sale) { ?>on-sale<?php } ?>">
    <?php
  	/**
  	 * Hook: woocommerce_shop_loop_item_title.
  	 *
  	 * @hooked woocommerce_template_loop_product_title - 10
  	 */
  	do_action( 'woocommerce_shop_loop_item_title' );
    ?>
  </span>

  <?php
	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li>
