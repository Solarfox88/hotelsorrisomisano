<?php
/**
 * Custom Walker for main navigation
 *
 * @package Hotel_Sorriso
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Hotel_Sorriso_Walker_Nav extends Walker_Nav_Menu {

	/**
	 * Start element output.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'nav__item';

		if ( in_array( 'current-menu-item', $classes, true ) ) {
			$classes[] = 'nav__item--active';
		}

		$class_names = implode( ' ', array_filter( $classes ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= '<li' . $class_names . '>';

		$atts           = array();
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';
		$atts['class']  = 'nav__link';

		// Check if it's an anchor link
		if ( strpos( $atts['href'], '#' ) !== false ) {
			$atts['data-scroll'] = 'true';
		}

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$attributes .= ' ' . $attr . '="' . esc_attr( $value ) . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );

		$output .= '<a' . $attributes . '>';
		$output .= $title;
		$output .= '</a>';
	}

	/**
	 * End element output.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= '</li>';
	}
}
