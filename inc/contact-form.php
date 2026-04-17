<?php
/**
 * Hotel Sorriso - Contact Form Handler
 *
 * @package Hotel_Sorriso
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handle AJAX form submission
 */
function hotel_sorriso_handle_contact_form() {
	// Verify nonce
	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'hotel_sorriso_nonce' ) ) {
		wp_send_json_error( array( 'message' => 'Errore di sicurezza. Riprova.' ) );
	}

	// Sanitize fields
	$data_arrivo    = isset( $_POST['data_arrivo'] ) ? sanitize_text_field( wp_unslash( $_POST['data_arrivo'] ) ) : '';
	$data_partenza  = isset( $_POST['data_partenza'] ) ? sanitize_text_field( wp_unslash( $_POST['data_partenza'] ) ) : '';
	$trattamento    = isset( $_POST['trattamento'] ) ? sanitize_text_field( wp_unslash( $_POST['trattamento'] ) ) : '';
	$adulti         = isset( $_POST['adulti'] ) ? absint( $_POST['adulti'] ) : 0;
	$bambini        = isset( $_POST['bambini'] ) ? absint( $_POST['bambini'] ) : 0;
	$nome           = isset( $_POST['nome'] ) ? sanitize_text_field( wp_unslash( $_POST['nome'] ) ) : '';
	$cognome        = isset( $_POST['cognome'] ) ? sanitize_text_field( wp_unslash( $_POST['cognome'] ) ) : '';
	$email          = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$telefono       = isset( $_POST['telefono'] ) ? sanitize_text_field( wp_unslash( $_POST['telefono'] ) ) : '';
	$note           = isset( $_POST['note'] ) ? sanitize_textarea_field( wp_unslash( $_POST['note'] ) ) : '';
	$newsletter     = isset( $_POST['newsletter'] ) ? true : false;
	$privacy        = isset( $_POST['privacy'] ) ? true : false;

	// Validate required fields
	if ( empty( $data_arrivo ) || empty( $data_partenza ) || empty( $nome ) || empty( $cognome ) || empty( $email ) || ! $privacy ) {
		wp_send_json_error( array( 'message' => 'Compila tutti i campi obbligatori.' ) );
	}

	if ( ! is_email( $email ) ) {
		wp_send_json_error( array( 'message' => 'Indirizzo email non valido.' ) );
	}

	// Build email
	$hotel_email = get_theme_mod( 'hotel_email', 'info@hotelsorrisomisano.it' );
	$subject     = sprintf( 'Richiesta Preventivo da %s %s', $nome, $cognome );

	$message = sprintf(
		"Nuova richiesta preventivo dal sito web:\n\n" .
		"Nome: %s %s\n" .
		"Email: %s\n" .
		"Telefono: %s\n\n" .
		"Data Arrivo: %s\n" .
		"Data Partenza: %s\n" .
		"Trattamento: %s\n" .
		"N. Adulti: %d\n" .
		"N. Bambini: %d\n\n" .
		"Note: %s\n\n" .
		"Newsletter: %s\n",
		$nome,
		$cognome,
		$email,
		$telefono,
		$data_arrivo,
		$data_partenza,
		$trattamento,
		$adulti,
		$bambini,
		$note,
		$newsletter ? 'Si' : 'No'
	);

	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		sprintf( 'Reply-To: %s <%s>', $nome . ' ' . $cognome, $email ),
	);

	$sent = wp_mail( $hotel_email, $subject, $message, $headers );

	if ( $sent ) {
		wp_send_json_success( array(
			'message'  => 'Richiesta inviata con successo! Ti contatteremo al piu presto.',
			'redirect' => home_url( '/hotel-sorriso/richiesta-inoltrata-correttamente/' ),
		) );
	} else {
		wp_send_json_error( array( 'message' => 'Errore nell\'invio. Riprova o contattaci telefonicamente.' ) );
	}
}
add_action( 'wp_ajax_hotel_sorriso_contact', 'hotel_sorriso_handle_contact_form' );
add_action( 'wp_ajax_nopriv_hotel_sorriso_contact', 'hotel_sorriso_handle_contact_form' );
