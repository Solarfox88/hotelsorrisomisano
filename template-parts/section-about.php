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
		<div class="about__layout">
			<div class="about__image" data-animate="fade-right">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/esterni.jpg' ); ?>" alt="Hotel Sorriso Misano Adriatico" loading="lazy" width="600" height="400">
			</div>
			<div class="about__content" data-animate="fade-left">
				<div class="about__text">
					<p><?php echo wp_kses_post( $about_text ); ?></p>
					<p><?php echo wp_kses_post( $about_text_2 ); ?></p>
					<p class="about__closing"><strong><?php echo esc_html( $about_closing ); ?></strong></p>
				</div>
			</div>
		</div>
	</div>
</section>
