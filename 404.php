<?php
/**
 * 404 Not Found template
 *
 * @package Hotel_Sorriso
 */

get_header();
?>

<section class="error-404">
	<div class="container">
		<div class="error-404__content">
			<span class="error-404__number">404</span>
			<h1 class="error-404__title">Pagina non trovata</h1>
			<p class="error-404__text">La pagina che stai cercando non esiste o e stata spostata.</p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--primary">Torna alla Homepage</a>
		</div>
	</div>
</section>

<?php
get_footer();
