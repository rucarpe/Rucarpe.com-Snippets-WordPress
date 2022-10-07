<?php

/* Colocar aviso EN LA FICHA DEL PRODUCTO de la cantidad faltante para obtener gastos de envío GRATIS */
add_action( 'woocommerce_after_add_to_cart_button', 'rcp_notificacion_envio_gratis_ficha', 10, 0 );
function rcp_notificacion_envio_gratis_fricha() {
	if ( is_checkout() && WC()->cart ) {
		$total = WC()->cart->get_cart_contents_total(); // Después del dto
		$limit = 49.00; // Pon aquí cual es el precio del envío gratuito
		// Condicional si el carrito es inferior a la cantidad
		if ( $total < $limit ) {
			// Calcular diferencia
			$diff = $limit - $total;
			$diff_formatted = wc_price( $diff );
			// Mostrar aviso
			wc_add_notice( sprintf( "Te falta %s para envío GRATIS", $diff_formatted ), 'notice' );
		}
	}
}


/* Colocar aviso EN EL CHECKOUT de la cantidad faltante para obtener gastos de envío GRATIS */
add_action( 'woocommerce_before_checkout_form_cart_notices', 'dl_notificacion_envio_carrito_checkout', 10, 0 );
function dl_notificacion_envio_carrito_checkout() {
	if ( is_checkout() && WC()->cart ) {
		$total = WC()->cart->get_cart_contents_total(); // Después del dto
		$limit = 100.00; // Pon aquí cual es el precio del envío gratuito
		// Condicional si el carrito es inferior a la cantidad
		if ( $total < $limit ) {
			// Calcular diferencia
			$diff = $limit - $total;
			$diff_formatted = wc_price( $diff );
			// Mostrar aviso
			wc_add_notice( sprintf( "Añade %s para tener envío gratuito!", $diff_formatted ), 'notice' );
		}
	}
}
