<?php
/**
 * Rooms Section
 *
 * @package Hotel_Sorriso
 */

$rooms_description = get_theme_mod( 'rooms_description', 'Camere accoglienti e confortevoli, tutte dotate dei migliori servizi per il tuo soggiorno.' );
$rooms_amenities   = get_theme_mod( 'rooms_amenities', "Cassaforte\nFrigobar su richiesta\nWifi\nPhon\nTv lcd 24''\nAria condizionata" );
$amenities_list    = array_filter( array_map( 'trim', explode( "\n", $rooms_amenities ) ) );

$default_room_images = array(
	get_template_directory_uri() . '/assets/images/camera-1.jpg',
	get_template_directory_uri() . '/assets/images/camera-2.jpg',
	get_template_directory_uri() . '/assets/images/camera-3.jpg',
	get_template_directory_uri() . '/assets/images/bagno.jpg',
);

$room_images = array();
$has_custom = false;
for ( $i = 1; $i <= 6; $i++ ) {
	$img = get_theme_mod( "room_image_{$i}", '' );
	if ( $img ) {
		$room_images[] = $img;
		$has_custom = true;
	}
}
if ( ! $has_custom ) {
	$room_images = $default_room_images;
}
?>

<section class="rooms" id="camere">
	<div class="container">
		<div class="section-header" data-animate="fade-up">
			<span class="section-header__label">Hotel Sorriso</span>
			<h2 class="section-header__title">Le Nostre Camere</h2>
			<p class="section-header__desc"><?php echo esc_html( $rooms_description ); ?></p>
		</div>

		<?php if ( ! empty( $room_images ) ) : ?>
			<div class="rooms__gallery" data-animate="fade-up">
				<div class="gallery-slider" id="rooms-slider">
					<?php foreach ( $room_images as $idx => $image ) : ?>
						<div class="gallery-slider__slide">
							<img src="<?php echo esc_url( $image ); ?>"
								 alt="<?php echo esc_attr( sprintf( 'Camera Hotel Sorriso %d', $idx + 1 ) ); ?>"
								 loading="lazy"
								 width="800"
								 height="600">
						</div>
					<?php endforeach; ?>
				</div>
				<button class="gallery-slider__btn gallery-slider__btn--prev" aria-label="Foto precedente" data-slider="rooms-slider" data-dir="prev">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
				</button>
				<button class="gallery-slider__btn gallery-slider__btn--next" aria-label="Foto successiva" data-slider="rooms-slider" data-dir="next">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
				</button>
				<div class="gallery-slider__dots" id="rooms-slider-dots"></div>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $amenities_list ) ) : ?>
			<div class="rooms__amenities" data-animate="fade-up">
				<h3 class="rooms__amenities-title">Servizi in Camera</h3>
				<ul class="rooms__amenities-list">
					<?php foreach ( $amenities_list as $amenity ) : ?>
						<li class="rooms__amenity">
							<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--color-gold)" stroke-width="2" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
							<?php echo esc_html( $amenity ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>
	</div>
</section>
