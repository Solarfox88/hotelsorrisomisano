<?php
/**
 * Template Name: Pagina Offerta
 * Description: Template per le pagine delle offerte stagionali
 *
 * @package Hotel_Sorriso
 */

get_header();
?>

<section class="offer-hero">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="offer-hero__image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( null, 'hero-banner' ) ); ?>')"></div>
	<?php else : ?>
		<div class="offer-hero__image offer-hero__image--default"></div>
	<?php endif; ?>
	<div class="offer-hero__overlay"></div>
	<div class="offer-hero__content container">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="offer-hero__back">
			<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
			Torna Indietro
		</a>
	</div>
</section>

<section class="offer-content">
	<div class="container">
		<div class="offer-content__grid">
			<div class="offer-content__main">
				<span class="offer-content__label">Hotel Sorriso</span>
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<h1 class="offer-content__title"><?php the_title(); ?></h1>
					<div class="offer-content__body">
						<?php the_content(); ?>
					</div>
					<?php
				endwhile;
				?>
			</div>

			<aside class="offer-content__sidebar">
				<div class="offer-sidebar-card">
					<h3 class="offer-sidebar-card__title">Prenota Ora!</h3>
					<p class="offer-sidebar-card__text">Contattaci per ricevere un preventivo personalizzato per la tua vacanza.</p>
					<div class="offer-sidebar-card__details">
						<p>
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
							Estate <?php echo esc_html( gmdate( 'Y' ) ); ?>
						</p>
						<p>
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
							Misano Adriatico
						</p>
					</div>
					<a href="<?php echo esc_url( home_url( '/#preventivo' ) ); ?>" class="btn btn--primary btn--full">Richiedi Preventivo</a>
					<a href="tel:<?php echo esc_attr( str_replace( ' ', '', get_theme_mod( 'hotel_phone', '0541 610443' ) ) ); ?>" class="btn btn--outline btn--full">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
						Chiamaci
					</a>
				</div>
			</aside>
		</div>
	</div>
</section>

<?php
get_footer();
