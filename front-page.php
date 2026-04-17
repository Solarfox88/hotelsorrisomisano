<?php
/**
 * Homepage template
 *
 * @package Hotel_Sorriso
 */

get_header();
?>

<?php get_template_part( 'template-parts/section', 'hero' ); ?>

<?php get_template_part( 'template-parts/section', 'features' ); ?>

<?php get_template_part( 'template-parts/section', 'about' ); ?>

<?php get_template_part( 'template-parts/section', 'camere' ); ?>

<?php get_template_part( 'template-parts/section', 'allinclusive' ); ?>

<?php get_template_part( 'template-parts/section', 'ristorante' ); ?>

<?php get_template_part( 'template-parts/section', 'bambini' ); ?>

<?php get_template_part( 'template-parts/section', 'trattamenti' ); ?>

<?php get_template_part( 'template-parts/section', 'cicciopark' ); ?>

<?php get_template_part( 'template-parts/section', 'offerte' ); ?>

<?php get_template_part( 'template-parts/section', 'contatti' ); ?>

<?php
get_footer();
