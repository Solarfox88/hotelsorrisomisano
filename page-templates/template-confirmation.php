<?php
/**
 * Template Name: Pagina Conferma
 * Description: Template per la pagina di conferma invio richiesta
 *
 * @package Hotel_Sorriso
 */

get_header();
?>

<section class="confirmation">
	<div class="container">
		<div class="confirmation__content" data-animate="fade-up">
			<div class="confirmation__icon">
				<svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="var(--color-success, #2ECC71)" stroke-width="1.5" aria-hidden="true">
					<circle cx="12" cy="12" r="10"/>
					<polyline points="16 8 10 16 7 13"/>
				</svg>
			</div>
			<h1 class="confirmation__title">Richiesta Inoltrata!</h1>
			<p class="confirmation__text">
				Grazie per averci contattato. La tua richiesta di preventivo e stata inviata con successo.
				Ti risponderemo il prima possibile all'indirizzo email che ci hai indicato.
			</p>
			<div class="confirmation__actions">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--primary btn--lg">Torna alla Homepage</a>
				<a href="tel:<?php echo esc_attr( str_replace( ' ', '', get_theme_mod( 'hotel_phone', '0541 610443' ) ) ); ?>" class="btn btn--outline btn--lg">
					<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
					Chiamaci
				</a>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
