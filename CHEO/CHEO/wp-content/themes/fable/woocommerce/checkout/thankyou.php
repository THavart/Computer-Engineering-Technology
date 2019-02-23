<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="woocommerce-order">

	<?php if ( $order ) : ?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>
        
       <?php

		$shortcode=
		'
			[pb_notice icon="speaker_alt.png" icon_bg_color="ED2B2B" css_class="pb-margin-bottom-50"]
			[pb_notice_first_line]'.__('Error','woocommerce').'[/pb_notice_first_line]
			[pb_notice_second_line]'.__('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.','woocommerce').'[/pb_notice_second_line]
			[/pb_notice]		
		';
		
		echo do_shortcode($shortcode);
        
        ?>

		<?php else : ?>
    
        <?php
        
		$shortcode=
		'
			[pb_notice icon="tick_alt.png" css_class="pb-margin-bottom-50"]
			[pb_notice_first_line]'.__('Thank you','woocommerce').'[/pb_notice_first_line]
			[pb_notice_second_line]'.__('Your order has been received.','woocommerce').'[/pb_notice_second_line]
			[/pb_notice]		
		';
		
		echo do_shortcode($shortcode);
        
        ?>

            <table class="woocommerce-table woocommerce-table--customer-details shop_table customer_details">

                <tbody>
                    
                    <tr>
                        <th><?php _e( 'Order number:', 'woocommerce' ); ?></th>
                        <td><?php echo $order->get_order_number(); ?></td>
                    </tr>
                    <tr>
                        <th><?php _e( 'Date:', 'woocommerce' ); ?></th>
                        <td><?php echo wc_format_datetime( $order->get_date_created() ); ?></td>
                    </tr>
                    <tr>
                        <th><?php _e( 'Total:', 'woocommerce' ); ?></th>
                        <td><?php echo $order->get_formatted_order_total(); ?></td>
                    </tr>
                    
                    <?php if ( $order->get_payment_method_title() ) : ?>
                    <tr>
                        <th><?php _e( 'Payment method:', 'woocommerce' ); ?></th>
                        <td><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></td>
                    </tr>
                    <?php endif; ?>

                </tbody>

            </table>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>
    
    <?php
        
    $shortcode=
    '
        [pb_notice icon="tick_alt.png" css_class="pb-margin-bottom-50"]
        [pb_notice_first_line]'.__('Thank you','woocommerce').'[/pb_notice_first_line]
        [pb_notice_second_line]'.__('Your order has been received.','woocommerce').'[/pb_notice_second_line]
        [/pb_notice]		
    ';

    echo do_shortcode($shortcode);
        
    ?>
    
	<?php endif; ?>

</div>
