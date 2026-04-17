<?php
/**
 * Offers Section
 *
 * @package Hotel_Sorriso
 */

// Get child pages that are offers
$offer_pages = get_pages( array(
	'parent'      => get_the_ID(),
	'sort_column' => 'menu_order',
	'sort_order'  => 'ASC',
) );

// Filter to only offer pages (exclude confirmation page, etc.)
$offers = array();
foreach ( $offer_pages as $page ) {
	if ( strpos( $page->post_name, 'offerta' ) !== false || strpos( $page->post_name, 'special' ) !== false ) {
		$offers[] = $page;
	}
}

$offer_icons = array(
	'<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>',
	'<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>',
	'<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
	'<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>',
);
?>

<section class="offerte" id="offertemisano">
	<div class="container">
		<div class="section-header" data-animate="fade-up">
			<span class="section-header__label">Hotel Sorriso</span>
			<h2 class="section-header__title">Offerte</h2>
		</div>

		<?php if ( ! empty( $offers ) ) : ?>
			<div class="offerte__grid" data-animate="fade-up">
				<?php foreach ( $offers as $idx => $offer ) : ?>
					<a href="<?php echo esc_url( get_permalink( $offer->ID ) ); ?>" class="offerte__card" data-delay="<?php echo esc_attr( $idx * 100 ); ?>">
						<div class="offerte__card-icon">
							<?php echo $offer_icons[ $idx % count( $offer_icons ) ]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</div>
						<h3 class="offerte__card-title"><?php echo esc_html( $offer->post_title ); ?></h3>
						<span class="offerte__card-arrow">
							<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
						</span>
					</a>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<!-- Fallback static offers when no child pages exist -->
			<div class="offerte__grid" data-animate="fade-up">
				<?php
				$static_offers = array(
					array( 'title' => 'Offerta estate', 'url' => home_url( '/hotel-sorriso/offerta-estate/' ) ),
					array( 'title' => 'Offerta giugno', 'url' => home_url( '/hotel-sorriso/offerta-giugno/' ) ),
					array( 'title' => 'Offerta luglio', 'url' => home_url( '/hotel-sorriso/offerta-luglio/' ) ),
					array( 'title' => 'Offerta agosto', 'url' => home_url( '/hotel-sorriso/offerta-agosto/' ) ),
				);
				foreach ( $static_offers as $idx => $offer ) :
				?>
					<a href="<?php echo esc_url( $offer['url'] ); ?>" class="offerte__card" data-delay="<?php echo esc_attr( $idx * 100 ); ?>">
						<div class="offerte__card-icon">
							<?php echo $offer_icons[ $idx % count( $offer_icons ) ]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</div>
						<h3 class="offerte__card-title"><?php echo esc_html( $offer['title'] ); ?></h3>
						<span class="offerte__card-arrow">
							<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
						</span>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
