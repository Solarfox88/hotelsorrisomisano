<?php
/**
 * Main template file
 *
 * @package Hotel_Sorriso
 */

get_header();
?>

<div class="page-content">
	<div class="container">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="page-content__title"><?php the_title(); ?></h1>
					<div class="page-content__body">
						<?php the_content(); ?>
					</div>
				</article>
				<?php
			endwhile;
		endif;
		?>
	</div>
</div>

<?php
get_footer();
