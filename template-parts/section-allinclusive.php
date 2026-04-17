<?php
/**
 * All Inclusive Section
 *
 * @package Hotel_Sorriso
 */

$ai_intro = get_theme_mod( 'allinclusive_intro', 'La tua vacanza tutto incluso, senza sorprese. Ecco i concetti base di una vacanza All Inclusive.' );
$ai_desc  = get_theme_mod( 'allinclusive_description', 'La comodita di un pacchetto dove tutti i servizi sono inclusi e la sicurezza di trovare il meglio che l\'estate ha da offrire: sole, relax, tempo insieme alla tua famiglia o agli amici.' );

$services = array();
$service_icons = array(
	1 => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>',
	2 => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 12h6l3-9 3 18 3-9h5"/></svg>',
	3 => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
	4 => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><line x1="12" y1="20" x2="12.01" y2="20"/></svg>',
	5 => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
);

$ai_defaults = array(
	1 => array( 'title' => 'Servizio Spiaggia', 'desc' => '1 ombrellone e 2 lettini per ogni camera nello stabilimento convenzionato' ),
	2 => array( 'title' => 'Piscina in spiaggia', 'desc' => 'La meraviglia di essere in spiaggia e poter decidere di andare al mare o farsi un bel tuffo in piscina' ),
	3 => array( 'title' => 'Animazione in spiaggia', 'desc' => 'Animazione in spiaggia tutti i giorni' ),
	4 => array( 'title' => 'Wi-Fi', 'desc' => 'Gratuito in tutto l\'hotel' ),
	5 => array( 'title' => 'Ciccio Park', 'desc' => 'Ingresso tutte le sere al Ciccio Park, parco giochi dedicato ai bambini' ),
);

for ( $i = 1; $i <= 5; $i++ ) {
	$services[] = array(
		'title' => get_theme_mod( "ai_service_{$i}_title", $ai_defaults[ $i ]['title'] ),
		'desc'  => get_theme_mod( "ai_service_{$i}_desc", $ai_defaults[ $i ]['desc'] ),
		'icon'  => $service_icons[ $i ],
	);
}
?>

<section class="allinclusive" id="allinclusive">
	<div class="allinclusive__bg-shape" aria-hidden="true"></div>
	<div class="container">
		<div class="section-header" data-animate="fade-up">
			<span class="section-header__label">Hotel Sorriso</span>
			<h2 class="section-header__title">All Inclusive</h2>
			<p class="section-header__subtitle"><?php echo esc_html( $ai_intro ); ?></p>
		</div>

		<div class="allinclusive__layout">
			<div class="allinclusive__text" data-animate="fade-right">
				<p class="allinclusive__desc"><?php echo wp_kses_post( $ai_desc ); ?></p>
			</div>

			<div class="allinclusive__services" data-animate="fade-left">
				<?php foreach ( $services as $idx => $svc ) : ?>
					<div class="service-card" data-delay="<?php echo esc_attr( $idx * 100 ); ?>">
						<div class="service-card__icon">
							<?php echo $svc['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</div>
						<div class="service-card__content">
							<h4 class="service-card__title"><?php echo esc_html( $svc['title'] ); ?></h4>
							<p class="service-card__desc"><?php echo esc_html( $svc['desc'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
