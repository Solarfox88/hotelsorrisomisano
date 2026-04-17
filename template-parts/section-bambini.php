<?php
/**
 * Children Services Section
 *
 * @package Hotel_Sorriso
 */

$bambini_desc = get_theme_mod( 'bambini_description', 'Servizi dedicati ai piu piccoli con animazione, giochi e divertimento per tutta la famiglia.' );

$default_bambini_images = array(
	get_template_directory_uri() . '/assets/images/bambini.jpg',
	get_template_directory_uri() . '/assets/images/bambini-2.jpg',
	get_template_directory_uri() . '/assets/images/bambini-3.jpg',
	get_template_directory_uri() . '/assets/images/animazione.jpg',
	get_template_directory_uri() . '/assets/images/animazione-2.jpg',
);

$bambini_images = array();
$has_custom = false;
for ( $i = 1; $i <= 6; $i++ ) {
	$img = get_theme_mod( "bambini_image_{$i}", '' );
	if ( $img ) {
		$bambini_images[] = $img;
		$has_custom = true;
	}
}
if ( ! $has_custom ) {
	$bambini_images = $default_bambini_images;
}
?>

<section class="bambini" id="bambini">
	<div class="container">
		<div class="section-header" data-animate="fade-up">
			<span class="section-header__label">Hotel Sorriso</span>
			<h2 class="section-header__title">Servizi Per I Tuoi Bimbi</h2>
			<p class="section-header__desc"><?php echo wp_kses_post( $bambini_desc ); ?></p>
		</div>

		<?php if ( ! empty( $bambini_images ) ) : ?>
			<div class="bambini__gallery" data-animate="fade-up">
				<div class="gallery-slider" id="bambini-slider">
					<?php foreach ( $bambini_images as $idx => $image ) : ?>
						<div class="gallery-slider__slide">
							<img src="<?php echo esc_url( $image ); ?>"
								 alt="<?php echo esc_attr( sprintf( 'Servizi bambini %d', $idx + 1 ) ); ?>"
								 loading="lazy"
								 width="800"
								 height="600">
						</div>
					<?php endforeach; ?>
				</div>
				<button class="gallery-slider__btn gallery-slider__btn--prev" aria-label="Foto precedente" data-slider="bambini-slider" data-dir="prev">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
				</button>
				<button class="gallery-slider__btn gallery-slider__btn--next" aria-label="Foto successiva" data-slider="bambini-slider" data-dir="next">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
				</button>
				<div class="gallery-slider__dots" id="bambini-slider-dots"></div>
			</div>
		<?php endif; ?>
	</div>
</section>
