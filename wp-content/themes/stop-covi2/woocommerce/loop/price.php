<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$on_sale = false;
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
	<span class="woocommerce-Price-amount amount">
		<?= number_format((float)$min_price, 2, ',', '') . get_woocommerce_currency_symbol() . ' - ' . number_format((float)$max_price, 2, ',', '') . get_woocommerce_currency_symbol(); ?>
	</span>
<?php else:
	$on_sale = $product->get_sale_price() ? true : false;
	if ($on_sale) : ?>
		<span class="woocommerce-Price-amount amount">
			<del><i><?= number_format((float)$product->get_regular_price(), 2, ',', '') . get_woocommerce_currency_symbol(); ?></i></del>
			<span> <?= number_format((float)$product->get_sale_price(), 2, ',', '') . get_woocommerce_currency_symbol(); ?></span>
		</span>
	<?php else : ?>
		<?= $product->get_price_html(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<?php endif; ?>
<?php endif; ?>
