<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
	<div class="site-header__inner container">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-header__logo" aria-label="<?php bloginfo( 'name' ); ?>">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<span class="site-header__logo-text">
					<span class="site-header__logo-stars">&#9733; &#9733; &#9733;</span>
					<span class="site-header__logo-name">Hotel Sorriso</span>
				</span>
			<?php endif; ?>
		</a>

		<button class="site-header__toggle" id="menu-toggle" aria-label="Menu" aria-expanded="false">
			<span class="hamburger">
				<span class="hamburger__line"></span>
				<span class="hamburger__line"></span>
				<span class="hamburger__line"></span>
			</span>
		</button>

		<nav class="site-nav" id="site-nav" role="navigation" aria-label="Menu principale">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'nav__list',
					'walker'         => new Hotel_Sorriso_Walker_Nav(),
					'fallback_cb'    => false,
				) );
			} else {
				// Fallback navigation
				?>
				<ul class="nav__list">
					<li class="nav__item"><a href="#offertemisano" class="nav__link" data-scroll="true">Offerte</a></li>
					<li class="nav__item"><a href="#allinclusive" class="nav__link" data-scroll="true">All Inclusive</a></li>
					<li class="nav__item"><a href="#ristorante" class="nav__link" data-scroll="true">Ristorante</a></li>
					<li class="nav__item"><a href="#bambini" class="nav__link" data-scroll="true">Servizi per Bambini</a></li>
				</ul>
				<?php
			}
			?>
			<a href="#preventivo" class="btn btn--accent nav__cta" data-scroll="true">Preventivo</a>
		</nav>
	</div>
</header>

<main class="site-main" id="main-content">
