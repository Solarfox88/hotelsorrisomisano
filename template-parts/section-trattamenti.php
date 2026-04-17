<?php
/**
 * Trattamenti Section (Pensione Completa & B&B)
 *
 * @package Hotel_Sorriso
 */

$pensione_text = get_theme_mod( 'pensione_completa_text', "Colazione: Colazione Internazionale a Buffet con uova strapazzate e Bacon, Affettati e formaggi, Croissant, Torte e Biscotti fatti in casa, Yogurt e Cereali, Confetture, Caffetteria espressa, Frutta sciroppata\nPranzo o Cena Show Cooking e Buffet con Antipasti caldi, Antipasti freddi, Primi Piatti caldi e freddi di carne e di pesce, Secondi di carne e Pesce, Frutta fresca e dolci\nWI-FI gratuito in tutto l'hotel" );
$bb_text = get_theme_mod( 'bb_text', "Colazione: Colazione Internazionale a Buffet con uova strapazzate e Bacon, Affettati e formaggi, Croissant, Torte e Biscotti fatti in casa, Yogurt e Cereali, Confetture, Caffetteria espressa, Frutta sciroppata\nWI-FI gratuito in tutto l'hotel" );

$pensione_items = array_filter( array_map( 'trim', explode( "\n", $pensione_text ) ) );
$bb_items       = array_filter( array_map( 'trim', explode( "\n", $bb_text ) ) );
?>

<section class="trattamenti">
	<div class="container">
		<div class="section-header" data-animate="fade-up">
			<span class="section-header__label">Hotel Sorriso</span>
			<h2 class="section-header__title">Gli Altri Trattamenti Disponibili</h2>
		</div>

		<div class="trattamenti__grid">
			<div class="trattamenti__card" data-animate="fade-up" data-delay="0">
				<div class="trattamenti__card-header">
					<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
					<h3 class="trattamenti__card-title">Pensione Completa</h3>
				</div>
				<ul class="trattamenti__list">
					<?php foreach ( $pensione_items as $item ) : ?>
						<li>
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--color-gold)" stroke-width="2" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
							<?php echo esc_html( $item ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="trattamenti__card" data-animate="fade-up" data-delay="150">
				<div class="trattamenti__card-header">
					<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>
					<h3 class="trattamenti__card-title">B&amp;B</h3>
				</div>
				<ul class="trattamenti__list">
					<?php foreach ( $bb_items as $item ) : ?>
						<li>
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--color-gold)" stroke-width="2" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
							<?php echo esc_html( $item ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</section>
