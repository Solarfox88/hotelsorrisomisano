<?php
/**
 * Page template
 *
 * @package Hotel_Sorriso
 */

get_header();
?>

<section class="page-hero">
	<div class="page-hero__overlay"></div>
	<div class="container">
		<h1 class="page-hero__title"><?php the_title(); ?></h1>
	</div>
</section>

<div class="page-content">
	<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-content__article' ); ?>>
				<div class="page-content__body">
					<?php the_content(); ?>
				</div>
			</article>
			<?php
		endwhile;
		?>
	</div>
</div>

<?php
get_footer();
