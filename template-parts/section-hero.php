<?php
/**
 * Hero Section
 *
 * @package Hotel_Sorriso
 */

$hero_title    = get_theme_mod( 'hero_title', 'La Tua Vacanza All Inclusive A Misano Adriatico' );
$hero_subtitle = get_theme_mod( 'hero_subtitle', 'Scopri il perfetto mix tra relax e divertimento per tutta la famiglia nella splendida Riviera Romagnola' );
$hero_cta_text = get_theme_mod( 'hero_cta_text', 'Scopri le Offerte' );
$hero_cta_link = get_theme_mod( 'hero_cta_link', '#offertemisano' );
$hero_image    = get_theme_mod( 'hero_image', '' );
?>

<section class="hero" id="hero">
	<?php if ( $hero_image ) : ?>
		<div class="hero__bg" style="background-image: url('<?php echo esc_url( $hero_image ); ?>')"></div>
	<?php else : ?>
		<div class="hero__bg hero__bg--default"></div>
	<?php endif; ?>
	<div class="hero__overlay"></div>

	<div class="hero__content container">
		<div class="hero__text" data-animate="fade-up">
			<span class="hero__label">Hotel Sorriso &mdash; Misano Adriatico</span>
			<h1 class="hero__title"><?php echo esc_html( $hero_title ); ?></h1>
			<p class="hero__subtitle"><?php echo esc_html( $hero_subtitle ); ?></p>
			<div class="hero__actions">
				<a href="<?php echo esc_url( $hero_cta_link ); ?>" class="btn btn--primary btn--lg" data-scroll="true">
					<?php echo esc_html( $hero_cta_text ); ?>
				</a>
				<a href="#preventivo" class="btn btn--outline-light btn--lg" data-scroll="true">
					Richiedi Preventivo
				</a>
			</div>
		</div>
	</div>

	<div class="hero__scroll-indicator" aria-hidden="true">
		<span class="hero__scroll-text">Scorri</span>
		<div class="hero__scroll-line"></div>
	</div>
</section>
