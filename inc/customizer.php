<?php
/**
 * Hotel Sorriso - Customizer Settings
 *
 * @package Hotel_Sorriso
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function hotel_sorriso_customize_register( $wp_customize ) {

	// ─── Hotel Info Panel ───
	$wp_customize->add_panel( 'hotel_info_panel', array(
		'title'    => __( 'Info Hotel', 'hotel-sorriso' ),
		'priority' => 30,
	) );

	// Contact Info Section
	$wp_customize->add_section( 'hotel_contact_section', array(
		'title' => __( 'Contatti', 'hotel-sorriso' ),
		'panel' => 'hotel_info_panel',
	) );

	$contact_fields = array(
		'hotel_phone'   => array( 'label' => 'Telefono', 'default' => '0541 610443' ),
		'hotel_email'   => array( 'label' => 'Email', 'default' => 'info@hotelsorrisomisano.it' ),
		'hotel_address' => array( 'label' => 'Indirizzo', 'default' => 'Via Liguria, 20, 47843 Misano Adriatico RN' ),
		'hotel_cin'     => array( 'label' => 'CIN', 'default' => 'IT099005A146JUYVZT' ),
	);

	foreach ( $contact_fields as $id => $field ) {
		$wp_customize->add_setting( $id, array(
			'default'           => $field['default'],
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( $id, array(
			'label'   => $field['label'],
			'section' => 'hotel_contact_section',
			'type'    => 'text',
		) );
	}

	// ─── Hero Section ───
	$wp_customize->add_section( 'hero_section', array(
		'title'    => __( 'Hero Homepage', 'hotel-sorriso' ),
		'priority' => 35,
	) );

	$wp_customize->add_setting( 'hero_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_image', array(
		'label'   => __( 'Immagine Hero', 'hotel-sorriso' ),
		'section' => 'hero_section',
	) ) );

	$wp_customize->add_setting( 'hero_title', array(
		'default'           => 'La Tua Vacanza All Inclusive A Misano Adriatico',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'hero_title', array(
		'label'   => __( 'Titolo Hero', 'hotel-sorriso' ),
		'section' => 'hero_section',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'hero_subtitle', array(
		'default'           => 'Scopri il perfetto mix tra relax e divertimento per tutta la famiglia nella splendida Riviera Romagnola',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'hero_subtitle', array(
		'label'   => __( 'Sottotitolo Hero', 'hotel-sorriso' ),
		'section' => 'hero_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'hero_cta_text', array(
		'default'           => 'Scopri le Offerte',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'hero_cta_text', array(
		'label'   => __( 'Testo CTA', 'hotel-sorriso' ),
		'section' => 'hero_section',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'hero_cta_link', array(
		'default'           => '#offertemisano',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'hero_cta_link', array(
		'label'   => __( 'Link CTA', 'hotel-sorriso' ),
		'section' => 'hero_section',
		'type'    => 'text',
	) );

	// ─── Features Section ───
	$wp_customize->add_section( 'features_section', array(
		'title'    => __( 'Feature Cards Homepage', 'hotel-sorriso' ),
		'priority' => 36,
	) );

	for ( $i = 1; $i <= 3; $i++ ) {
		$defaults = array(
			1 => array( 'title' => 'Tutto Incluso', 'desc' => 'Pacchetto All Inclusive senza sorprese, con tutti i servizi inclusi nel prezzo', 'icon' => 'fa-concierge-bell' ),
			2 => array( 'title' => 'Perfetto per Famiglie', 'desc' => 'Ideale per coppie e famiglie con bambini, con servizi dedicati ai piu piccoli', 'icon' => 'fa-users' ),
			3 => array( 'title' => 'Cucina Espressa', 'desc' => 'Ristorante con cucina show cooking e piatti preparati al momento davanti a te', 'icon' => 'fa-utensils' ),
		);

		$wp_customize->add_setting( "feature_{$i}_title", array(
			'default'           => $defaults[ $i ]['title'],
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( "feature_{$i}_title", array(
			'label'   => sprintf( __( 'Feature %d - Titolo', 'hotel-sorriso' ), $i ),
			'section' => 'features_section',
			'type'    => 'text',
		) );

		$wp_customize->add_setting( "feature_{$i}_description", array(
			'default'           => $defaults[ $i ]['desc'],
			'sanitize_callback' => 'sanitize_textarea_field',
		) );
		$wp_customize->add_control( "feature_{$i}_description", array(
			'label'   => sprintf( __( 'Feature %d - Descrizione', 'hotel-sorriso' ), $i ),
			'section' => 'features_section',
			'type'    => 'textarea',
		) );

		$wp_customize->add_setting( "feature_{$i}_icon", array(
			'default'           => $defaults[ $i ]['icon'],
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( "feature_{$i}_icon", array(
			'label'       => sprintf( __( 'Feature %d - Icona (classe SVG)', 'hotel-sorriso' ), $i ),
			'section'     => 'features_section',
			'type'        => 'text',
			'description' => 'Usare nome icona SVG inline (es: concierge-bell, users, utensils)',
		) );
	}

	// ─── About Section ───
	$wp_customize->add_section( 'about_section', array(
		'title'    => __( 'Sezione Chi Siamo', 'hotel-sorriso' ),
		'priority' => 37,
	) );

	$wp_customize->add_setting( 'about_text', array(
		'default'           => 'Sono questi i 3 punti da cui la Famiglia Giorgetti, con piu di 40 anni di esperienza in vacanze per famiglie a Misano Adriatico, e partita per confezionare la soluzione perfetta per chi dall\'estate cerca un piccolo hotel con tutti i servizi che si possono trovare nelle strutture piu grandi!',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'about_text', array(
		'label'   => __( 'Testo Chi Siamo', 'hotel-sorriso' ),
		'section' => 'about_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'about_text_2', array(
		'default'           => 'Ti aspetta una vacanza in All Inclusive, spiaggia con piscina riscaldata a soli 300m dall\'hotel, equipe di animatori in spiaggia tutto il giorno, cucina show cooking con piatti preparati al momento, free bar h24 con bevande alla spina sempre incluse ed accesso gratuito tutte le sere al Ciccio Park, un parco giochi ad 1km dall\'hotel interamente dedicato ai bambini.',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'about_text_2', array(
		'label'   => __( 'Testo Chi Siamo (paragrafo 2)', 'hotel-sorriso' ),
		'section' => 'about_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'about_closing', array(
		'default'           => 'Al tuo arrivo troverai esattamente questo: il mix perfetto tra relax e divertimento per tutti!',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'about_closing', array(
		'label'   => __( 'Frase di chiusura', 'hotel-sorriso' ),
		'section' => 'about_section',
		'type'    => 'text',
	) );

	// ─── Rooms Section ───
	$wp_customize->add_section( 'rooms_section', array(
		'title'    => __( 'Sezione Camere', 'hotel-sorriso' ),
		'priority' => 38,
	) );

	$wp_customize->add_setting( 'rooms_description', array(
		'default'           => 'Camere accoglienti e confortevoli, tutte dotate dei migliori servizi per il tuo soggiorno.',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'rooms_description', array(
		'label'   => __( 'Descrizione Camere', 'hotel-sorriso' ),
		'section' => 'rooms_section',
		'type'    => 'textarea',
	) );

	$room_amenities_default = "Cassaforte\nFrigobar su richiesta\nWifi\nPhon\nTv lcd 24''\nAria condizionata";
	$wp_customize->add_setting( 'rooms_amenities', array(
		'default'           => $room_amenities_default,
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'rooms_amenities', array(
		'label'       => __( 'Servizi Camera (uno per riga)', 'hotel-sorriso' ),
		'section'     => 'rooms_section',
		'type'        => 'textarea',
		'description' => 'Inserire un servizio per riga',
	) );

	for ( $i = 1; $i <= 6; $i++ ) {
		$wp_customize->add_setting( "room_image_{$i}", array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "room_image_{$i}", array(
			'label'   => sprintf( __( 'Foto Camera %d', 'hotel-sorriso' ), $i ),
			'section' => 'rooms_section',
		) ) );
	}

	// ─── All Inclusive Section ───
	$wp_customize->add_section( 'allinclusive_section', array(
		'title'    => __( 'Sezione All Inclusive', 'hotel-sorriso' ),
		'priority' => 39,
	) );

	$wp_customize->add_setting( 'allinclusive_intro', array(
		'default'           => 'La tua vacanza tutto incluso, senza sorprese. Ecco i concetti base di una vacanza All Inclusive.',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'allinclusive_intro', array(
		'label'   => __( 'Testo introduttivo All Inclusive', 'hotel-sorriso' ),
		'section' => 'allinclusive_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'allinclusive_description', array(
		'default'           => 'La comodita di un pacchetto dove tutti i servizi sono inclusi e la sicurezza di trovare il meglio che l\'estate ha da offrire: sole, relax, tempo insieme alla tua famiglia o agli amici.',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'allinclusive_description', array(
		'label'   => __( 'Descrizione completa', 'hotel-sorriso' ),
		'section' => 'allinclusive_section',
		'type'    => 'textarea',
	) );

	// All Inclusive services
	$ai_services = array(
		1 => array( 'title' => 'Servizio Spiaggia', 'desc' => '1 ombrellone e 2 lettini per ogni camera nello stabilimento convenzionato' ),
		2 => array( 'title' => 'Piscina in spiaggia', 'desc' => 'La meraviglia di essere in spiaggia e poter decidere di andare al mare o farsi un bel tuffo in piscina' ),
		3 => array( 'title' => 'Animazione in spiaggia', 'desc' => 'Animazione in spiaggia tutti i giorni' ),
		4 => array( 'title' => 'Wi-Fi', 'desc' => 'Gratuito in tutto l\'hotel' ),
		5 => array( 'title' => 'Ciccio Park', 'desc' => 'Ingresso tutte le sere al Ciccio Park, parco giochi dedicato ai bambini' ),
	);

	foreach ( $ai_services as $idx => $svc ) {
		$wp_customize->add_setting( "ai_service_{$idx}_title", array(
			'default'           => $svc['title'],
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( "ai_service_{$idx}_title", array(
			'label'   => sprintf( __( 'Servizio AI %d - Titolo', 'hotel-sorriso' ), $idx ),
			'section' => 'allinclusive_section',
			'type'    => 'text',
		) );

		$wp_customize->add_setting( "ai_service_{$idx}_desc", array(
			'default'           => $svc['desc'],
			'sanitize_callback' => 'sanitize_textarea_field',
		) );
		$wp_customize->add_control( "ai_service_{$idx}_desc", array(
			'label'   => sprintf( __( 'Servizio AI %d - Descrizione', 'hotel-sorriso' ), $idx ),
			'section' => 'allinclusive_section',
			'type'    => 'textarea',
		) );
	}

	// ─── Restaurant Section ───
	$wp_customize->add_section( 'ristorante_section', array(
		'title'    => __( 'Sezione Ristorante', 'hotel-sorriso' ),
		'priority' => 40,
	) );

	$wp_customize->add_setting( 'ristorante_colazione', array(
		'default'           => 'Colazione Internazionale a Buffet con uova strapazzate e Bacon, Affettati e formaggi, Croissant, Torte e Biscotti fatti in casa, Yogurt e Cereali, Confetture, Caffetteria espressa, Frutta sciroppata.',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'ristorante_colazione', array(
		'label'   => __( 'Colazione', 'hotel-sorriso' ),
		'section' => 'ristorante_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'ristorante_pranzo_cena', array(
		'default'           => 'Buffet con Antipasti caldi, Antipasti freddi, Primi Piatti caldi e freddi di carne e di pesce, Secondi di carne e Pesce, Frutta fresca e dolci.',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'ristorante_pranzo_cena', array(
		'label'   => __( 'Pranzo e Cena Show Cooking', 'hotel-sorriso' ),
		'section' => 'ristorante_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'ristorante_bevande', array(
		'default'           => 'Dalla mattina fino a notte ed in ogni momento Acqua, Cola, Aranciata, The pesca, The Limone, Succhi di frutta.',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'ristorante_bevande', array(
		'label'   => __( 'Bevande illimitate', 'hotel-sorriso' ),
		'section' => 'ristorante_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'ristorante_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ristorante_image', array(
		'label'   => __( 'Immagine Ristorante', 'hotel-sorriso' ),
		'section' => 'ristorante_section',
	) ) );

	// ─── Children Section ───
	$wp_customize->add_section( 'bambini_section', array(
		'title'    => __( 'Sezione Servizi Bambini', 'hotel-sorriso' ),
		'priority' => 41,
	) );

	$wp_customize->add_setting( 'bambini_description', array(
		'default'           => 'Servizi dedicati ai piu piccoli con animazione, giochi e divertimento per tutta la famiglia.',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'bambini_description', array(
		'label'   => __( 'Descrizione servizi bambini', 'hotel-sorriso' ),
		'section' => 'bambini_section',
		'type'    => 'textarea',
	) );

	for ( $i = 1; $i <= 6; $i++ ) {
		$wp_customize->add_setting( "bambini_image_{$i}", array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "bambini_image_{$i}", array(
			'label'   => sprintf( __( 'Foto Bambini %d', 'hotel-sorriso' ), $i ),
			'section' => 'bambini_section',
		) ) );
	}

	// ─── Ciccio Park Section ───
	$wp_customize->add_section( 'cicciopark_section', array(
		'title'    => __( 'Sezione Ciccio Park', 'hotel-sorriso' ),
		'priority' => 42,
	) );

	$wp_customize->add_setting( 'cicciopark_description', array(
		'default'           => 'Ad 1km dall\'hotel esiste un parco giochi interamente dedicato ai piu piccoli... il Ciccio Park! Piu di 2000mq per il divertimento di tutti i bambini con gonfiabili, animazione tutte le sere, spettacoli, cabaret e musical... il regno delle famiglie in vacanza!',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'cicciopark_description', array(
		'label'   => __( 'Descrizione Ciccio Park', 'hotel-sorriso' ),
		'section' => 'cicciopark_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'cicciopark_note', array(
		'default'           => 'L\'ingresso al parco e in omaggio tutte le sere, per tutta la famiglia, con il pacchetto All Inclusive!',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'cicciopark_note', array(
		'label'   => __( 'Nota Ciccio Park', 'hotel-sorriso' ),
		'section' => 'cicciopark_section',
		'type'    => 'text',
	) );

	for ( $i = 1; $i <= 6; $i++ ) {
		$wp_customize->add_setting( "cicciopark_image_{$i}", array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "cicciopark_image_{$i}", array(
			'label'   => sprintf( __( 'Foto Ciccio Park %d', 'hotel-sorriso' ), $i ),
			'section' => 'cicciopark_section',
		) ) );
	}

	// ─── Trattamenti Section ───
	$wp_customize->add_section( 'trattamenti_section', array(
		'title'    => __( 'Sezione Trattamenti', 'hotel-sorriso' ),
		'priority' => 43,
	) );

	$wp_customize->add_setting( 'pensione_completa_text', array(
		'default'           => "Colazione: Colazione Internazionale a Buffet con uova strapazzate e Bacon, Affettati e formaggi, Croissant, Torte e Biscotti fatti in casa, Yogurt e Cereali, Confetture, Caffetteria espressa, Frutta sciroppata\nPranzo o Cena Show Cooking e Buffet con Antipasti caldi, Antipasti freddi, Primi Piatti caldi e freddi di carne e di pesce, Secondi di carne e Pesce, Frutta fresca e dolci\nWI-FI gratuito in tutto l'hotel",
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'pensione_completa_text', array(
		'label'   => __( 'Pensione Completa', 'hotel-sorriso' ),
		'section' => 'trattamenti_section',
		'type'    => 'textarea',
	) );

	$wp_customize->add_setting( 'bb_text', array(
		'default'           => "Colazione: Colazione Internazionale a Buffet con uova strapazzate e Bacon, Affettati e formaggi, Croissant, Torte e Biscotti fatti in casa, Yogurt e Cereali, Confetture, Caffetteria espressa, Frutta sciroppata\nWI-FI gratuito in tutto l'hotel",
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'bb_text', array(
		'label'   => __( 'B&B', 'hotel-sorriso' ),
		'section' => 'trattamenti_section',
		'type'    => 'textarea',
	) );

	// ─── Social Links ───
	$wp_customize->add_section( 'social_section', array(
		'title' => __( 'Social Media', 'hotel-sorriso' ),
		'panel' => 'hotel_info_panel',
	) );

	$socials = array(
		'facebook'  => 'Facebook URL',
		'instagram' => 'Instagram URL',
		'whatsapp'  => 'WhatsApp Numero (con prefisso, es: 39XXXXXXXXXX)',
	);

	foreach ( $socials as $id => $label ) {
		$wp_customize->add_setting( "social_{$id}", array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( "social_{$id}", array(
			'label'   => $label,
			'section' => 'social_section',
			'type'    => 'url',
		) );
	}
}
add_action( 'customize_register', 'hotel_sorriso_customize_register' );
