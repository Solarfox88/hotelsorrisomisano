<?php
/**
 * Restaurant Section
 *
 * @package Hotel_Sorriso
 */

$colazione    = get_theme_mod( 'ristorante_colazione', 'Colazione Internazionale a Buffet con uova strapazzate e Bacon, Affettati e formaggi, Croissant, Torte e Biscotti fatti in casa, Yogurt e Cereali, Confetture, Caffetteria espressa, Frutta sciroppata.' );
$pranzo_cena  = get_theme_mod( 'ristorante_pranzo_cena', 'Buffet con Antipasti caldi, Antipasti freddi, Primi Piatti caldi e freddi di carne e di pesce, Secondi di carne e Pesce, Frutta fresca e dolci.' );
$bevande      = get_theme_mod( 'ristorante_bevande', 'Dalla mattina fino a notte ed in ogni momento Acqua, Cola, Aranciata, The pesca, The Limone, Succhi di frutta.' );
$rist_image   = get_theme_mod( 'ristorante_image', get_template_directory_uri() . '/assets/images/ristorante.jpg' );
?>

<section class="ristorante" id="ristorante">
	<div class="container">
		<div class="section-header" data-animate="fade-up">
			<span class="section-header__label">Hotel Sorriso</span>
			<h2 class="section-header__title">Il Nostro Ristorante</h2>
		</div>

		<div class="ristorante__grid">
			<div class="ristorante__content" data-animate="fade-right">
				<div class="ristorante__meal">
					<div class="ristorante__meal-icon">
						<svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>
					</div>
					<h3 class="ristorante__meal-title">Colazione</h3>
					<p><?php echo wp_kses_post( $colazione ); ?></p>
				</div>

				<div class="ristorante__meal">
					<div class="ristorante__meal-icon">
						<svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
					</div>
					<h3 class="ristorante__meal-title">Pranzo e Cena Show Cooking</h3>
					<p><?php echo wp_kses_post( $pranzo_cena ); ?></p>
				</div>

				<div class="ristorante__meal">
					<div class="ristorante__meal-icon">
						<svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 8h1a4 4 0 1 1 0 8h-1"/><path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8z"/><line x1="6" y1="2" x2="6" y2="4"/><line x1="10" y1="2" x2="10" y2="4"/></svg>
					</div>
					<h3 class="ristorante__meal-title">Bevande Illimitate Tutto il Giorno</h3>
					<p><?php echo wp_kses_post( $bevande ); ?></p>
				</div>
			</div>

				<div class="ristorante__image" data-animate="fade-left">
				<img src="<?php echo esc_url( $rist_image ); ?>" alt="Ristorante Hotel Sorriso" loading="lazy" width="600" height="800">
			</div>
		</div>
	</div>
</section>
