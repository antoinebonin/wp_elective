<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<p class="woocommerce-result-count">
	<?php
	if ( 1 === $total ) {
		_e( '1 résultat', 'woocommerce' );
	} elseif ( $total <= $per_page || -1 === $per_page ) {
		/* translators: %d: total results */
		printf( _n( '%d résultats', '%d résultats', $total, 'woocommerce' ), $total );
	} else {
		$first = ( $per_page * $current ) - $per_page + 1;
		$last  = min( $total, $per_page * $current );
		/* translators: 1: first result 2: last result 3: total results */
		printf( _nx( '%1$d à %2$d des %3$d résultats', '%1$d à %2$d des %3$d résultats', $total, 'with first and last result', 'woocommerce' ), $first, $last, $total );
	}
	?>
</p>
