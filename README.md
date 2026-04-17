# Hotel Sorriso Misano - Custom WordPress Theme

Tema WordPress 100% custom per Hotel Sorriso Misano Adriatico. Design **Mediterranean Luxury** con palette costiera, tipografia elegante e animazioni smooth.

## Struttura

```
├── style.css                          # Theme metadata
├── functions.php                      # Theme setup, scripts, customizer
├── header.php                         # Site header + navigation
├── footer.php                         # Site footer
├── front-page.php                     # Homepage (single-page con sezioni)
├── page.php                           # Template pagina generica
├── index.php                          # Template fallback
├── 404.php                            # Pagina errore 404
├── assets/
│   ├── css/main.css                   # Stylesheet principale (~1900 righe)
│   └── js/main.js                     # JavaScript (scroll, slider, form AJAX)
├── inc/
│   ├── customizer.php                 # WordPress Customizer (500+ impostazioni)
│   ├── contact-form.php               # Gestione form AJAX
│   └── class-walker-nav.php           # Walker navigazione custom
├── template-parts/
│   ├── section-hero.php               # Hero fullscreen con parallax
│   ├── section-features.php           # 3 card highlight
│   ├── section-about.php              # Chi Siamo
│   ├── section-camere.php             # Le Nostre Camere + gallery
│   ├── section-allinclusive.php       # Servizi All Inclusive
│   ├── section-ristorante.php         # Ristorante e cucina
│   ├── section-bambini.php            # Servizi per bambini
│   ├── section-trattamenti.php        # Pensione Completa / B&B
│   ├── section-cicciopark.php         # Ciccio Park
│   ├── section-offerte.php            # Griglia offerte
│   └── section-contatti.php           # Form richiesta preventivo
└── page-templates/
    ├── template-offerta.php           # Template pagine offerta
    └── template-confirmation.php      # Pagina conferma invio
```

## Design

- **Palette**: Blu mare `#0F4C75`, Oro/Sabbia `#D4A853`, Corallo `#E07A5F`, Teal `#1B9AAA`
- **Font titoli**: Cormorant Garamond (serif, italic)
- **Font body**: DM Sans (sans-serif)
- **Animazioni**: Scroll reveal con IntersectionObserver, parallax hero, slider touch-friendly

## Funzionalita

- WordPress Customizer per gestire tutti i contenuti (testi, immagini, colori, contatti)
- Form contatto con invio AJAX e validazione
- Menu navigazione nativo WordPress
- Gallery slider con swipe mobile e auto-advance
- Header sticky con trasparenza su homepage
- Menu hamburger mobile
- Design responsive (mobile-first breakpoints: 480px, 768px, 1024px)
- Markup semantico SEO-friendly
- Zero plugin esterni, zero temi esterni

## Requisiti

- WordPress 5.0+
- PHP 7.4+
