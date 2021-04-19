<?php
/**
 * Additional Information tab
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$heading = apply_filters( 'woocommerce_product_additional_information_heading', __( 'Additional information', 'woocommerce' ) );

?>
<div class="informations-area">
	<?php if ( $heading ) : ?>
		<b><?php echo esc_html( $heading ); ?></b>
	<?php endif; ?>

	<?php do_action( 'woocommerce_product_additional_information', $product ); ?>
</div>
