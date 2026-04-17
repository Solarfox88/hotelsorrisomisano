<?php
/**
 * About Section
 *
 * @package Hotel_Sorriso
 */

$about_text    = get_theme_mod( 'about_text', 'Sono questi i 3 punti da cui la Famiglia Giorgetti, con piu di 40 anni di esperienza in vacanze per famiglie a Misano Adriatico, e partita per confezionare la soluzione perfetta per chi dall\'estate cerca un piccolo hotel con tutti i servizi che si possono trovare nelle strutture piu grandi!' );
$about_text_2  = get_theme_mod( 'about_text_2', 'Ti aspetta una vacanza in All Inclusive, spiaggia con piscina riscaldata a soli 300m dall\'hotel, equipe di animatori in spiaggia tutto il giorno, cucina show cooking con piatti preparati al momento, free bar h24 con bevande alla spina sempre incluse ed accesso gratuito tutte le sere al Ciccio Park, un parco giochi ad 1km dall\'hotel interamente dedicato ai bambini.' );
$about_closing = get_theme_mod( 'about_closing', 'Al tuo arrivo troverai esattamente questo: il mix perfetto tra relax e divertimento per tutti!' );
?>

<section class="about" data-animate="fade-up">
	<div class="container">
		<div class="about__content">
			<div class="about__text">
				<p><?php echo wp_kses_post( $about_text ); ?></p>
				<p><?php echo wp_kses_post( $about_text_2 ); ?></p>
				<p class="about__closing"><strong><?php echo esc_html( $about_closing ); ?></strong></p>
			</div>
			<div class="about__decoration" aria-hidden="true">
				<svg viewBox="0 0 200 200" width="200" height="200">
					<path d="M100,10 Q190,100 100,190 Q10,100 100,10" fill="none" stroke="var(--color-gold)" stroke-width="1" opacity="0.3"/>
					<path d="M100,30 Q170,100 100,170 Q30,100 100,30" fill="none" stroke="var(--color-gold)" stroke-width="1" opacity="0.2"/>
				</svg>
			</div>
		</div>
	</div>
</section>
