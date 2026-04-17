<?php
/**
 * Ciccio Park Section
 *
 * @package Hotel_Sorriso
 */

$cicciopark_desc = get_theme_mod( 'cicciopark_description', 'Ad 1km dall\'hotel esiste un parco giochi interamente dedicato ai piu piccoli... il Ciccio Park! Piu di 2000mq per il divertimento di tutti i bambini con gonfiabili, animazione tutte le sere, spettacoli, cabaret e musical... il regno delle famiglie in vacanza!' );
$cicciopark_note = get_theme_mod( 'cicciopark_note', 'L\'ingresso al parco e in omaggio tutte le sere, per tutta la famiglia, con il pacchetto All Inclusive!' );

$default_cicciopark_images = array(
	get_template_directory_uri() . '/assets/images/cicciopark.jpg',
	get_template_directory_uri() . '/assets/images/cicciopark-2.jpg',
);

$cicciopark_images = array();
$has_custom = false;
for ( $i = 1; $i <= 6; $i++ ) {
	$img = get_theme_mod( "cicciopark_image_{$i}", '' );
	if ( $img ) {
		$cicciopark_images[] = $img;
		$has_custom = true;
	}
}
if ( ! $has_custom ) {
	$cicciopark_images = $default_cicciopark_images;
}
?>

<section class="cicciopark">
	<div class="cicciopark__bg"></div>
	<div class="container">
		<div class="cicciopark__content" data-animate="fade-up">
			<h2 class="cicciopark__title">Ciccio Park</h2>
			<p class="cicciopark__desc"><?php echo wp_kses_post( $cicciopark_desc ); ?></p>
			<p class="cicciopark__note">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
				<?php echo esc_html( $cicciopark_note ); ?>
			</p>
		</div>

		<?php if ( ! empty( $cicciopark_images ) ) : ?>
			<div class="cicciopark__gallery" data-animate="fade-up">
				<div class="gallery-slider" id="cicciopark-slider">
					<?php foreach ( $cicciopark_images as $idx => $image ) : ?>
						<div class="gallery-slider__slide">
							<img src="<?php echo esc_url( $image ); ?>"
								 alt="<?php echo esc_attr( sprintf( 'Ciccio Park %d', $idx + 1 ) ); ?>"
								 loading="lazy"
								 width="800"
								 height="600">
						</div>
					<?php endforeach; ?>
				</div>
				<button class="gallery-slider__btn gallery-slider__btn--prev" aria-label="Foto precedente" data-slider="cicciopark-slider" data-dir="prev">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
				</button>
				<button class="gallery-slider__btn gallery-slider__btn--next" aria-label="Foto successiva" data-slider="cicciopark-slider" data-dir="next">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
				</button>
				<div class="gallery-slider__dots" id="cicciopark-slider-dots"></div>
			</div>
		<?php endif; ?>
	</div>
</section>
