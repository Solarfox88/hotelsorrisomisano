<?php
/**
 * Features Section - 3 highlight cards
 *
 * @package Hotel_Sorriso
 */

$features = array();
$icons = array(
	1 => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>',
	2 => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
	3 => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>',
);

for ( $i = 1; $i <= 3; $i++ ) {
	$defaults = array(
		1 => array( 'title' => 'Tutto Incluso', 'desc' => 'Pacchetto All Inclusive senza sorprese, con tutti i servizi inclusi nel prezzo' ),
		2 => array( 'title' => 'Perfetto per Famiglie', 'desc' => 'Ideale per coppie e famiglie con bambini, con servizi dedicati ai piu piccoli' ),
		3 => array( 'title' => 'Cucina Espressa', 'desc' => 'Ristorante con cucina show cooking e piatti preparati al momento davanti a te' ),
	);

	$features[] = array(
		'title' => get_theme_mod( "feature_{$i}_title", $defaults[ $i ]['title'] ),
		'desc'  => get_theme_mod( "feature_{$i}_description", $defaults[ $i ]['desc'] ),
		'icon'  => $icons[ $i ],
	);
}
?>

<section class="features">
	<div class="container">
		<div class="features__grid">
			<?php foreach ( $features as $index => $feature ) : ?>
				<div class="features__card" data-animate="fade-up" data-delay="<?php echo esc_attr( $index * 150 ); ?>">
					<div class="features__icon">
						<?php echo $feature['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- SVG markup ?>
					</div>
					<h3 class="features__title"><?php echo esc_html( $feature['title'] ); ?></h3>
					<p class="features__desc"><?php echo esc_html( $feature['desc'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
