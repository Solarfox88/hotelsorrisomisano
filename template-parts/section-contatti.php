<?php
/**
 * Contact Form Section
 *
 * @package Hotel_Sorriso
 */
?>

<section class="contatti" id="preventivo">
	<div class="container">
		<div class="section-header" data-animate="fade-up">
			<span class="section-header__label">Hotel Sorriso</span>
			<h2 class="section-header__title">Richiesta Preventivo</h2>
			<p class="section-header__desc">Compila il modulo e ti invieremo un preventivo personalizzato per la tua vacanza.</p>
		</div>

		<div class="contatti__form-wrapper" data-animate="fade-up">
			<form class="contatti__form" id="contact-form" method="post" novalidate>
				<input type="hidden" name="action" value="hotel_sorriso_contact">
				<input type="hidden" name="nonce" value="<?php echo esc_attr( wp_create_nonce( 'hotel_sorriso_nonce' ) ); ?>">

				<div class="form-row form-row--3">
					<div class="form-group">
						<label for="data_arrivo" class="form-label">Data arrivo <span class="required">*</span></label>
						<input type="date" id="data_arrivo" name="data_arrivo" class="form-input" required>
					</div>
					<div class="form-group">
						<label for="data_partenza" class="form-label">Data partenza <span class="required">*</span></label>
						<input type="date" id="data_partenza" name="data_partenza" class="form-input" required>
					</div>
					<div class="form-group">
						<label for="trattamento" class="form-label">Seleziona un trattamento</label>
						<select id="trattamento" name="trattamento" class="form-select">
							<option value="">-- Seleziona --</option>
							<option value="All Inclusive">All Inclusive</option>
							<option value="Pensione Completa">Pensione Completa</option>
							<option value="B&B">B&amp;B</option>
						</select>
					</div>
				</div>

				<div class="form-row form-row--2">
					<div class="form-group">
						<label for="adulti" class="form-label">N. Adulti <span class="required">*</span></label>
						<select id="adulti" name="adulti" class="form-select" required>
							<?php for ( $i = 0; $i <= 10; $i++ ) : ?>
								<option value="<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $i ); ?></option>
							<?php endfor; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="bambini_num" class="form-label">N. Bambini</label>
						<select id="bambini_num" name="bambini" class="form-select">
							<?php for ( $i = 0; $i <= 10; $i++ ) : ?>
								<option value="<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $i ); ?></option>
							<?php endfor; ?>
						</select>
					</div>
				</div>

				<div class="form-row form-row--2">
					<div class="form-group">
						<label for="nome" class="form-label">Nome <span class="required">*</span></label>
						<input type="text" id="nome" name="nome" class="form-input" required placeholder="Il tuo nome">
					</div>
					<div class="form-group">
						<label for="cognome" class="form-label">Cognome <span class="required">*</span></label>
						<input type="text" id="cognome" name="cognome" class="form-input" required placeholder="Il tuo cognome">
					</div>
				</div>

				<div class="form-row form-row--2">
					<div class="form-group">
						<label for="email" class="form-label">E-mail <span class="required">*</span></label>
						<input type="email" id="email" name="email" class="form-input" required placeholder="La tua email">
					</div>
					<div class="form-group">
						<label for="telefono" class="form-label">Telefono / WhatsApp</label>
						<input type="tel" id="telefono" name="telefono" class="form-input" placeholder="+39">
					</div>
				</div>

				<div class="form-row">
					<div class="form-group">
						<label for="note" class="form-label">Note / Richieste particolari</label>
						<textarea id="note" name="note" class="form-textarea" rows="4" placeholder="Scrivi qui le tue richieste..."></textarea>
					</div>
				</div>

				<p class="form-note"><em>I campi contrassegnati con * sono obbligatori</em></p>

				<div class="form-row form-row--checkboxes">
					<div class="form-checkbox">
						<input type="checkbox" id="newsletter" name="newsletter" value="1">
						<label for="newsletter">Acconsento a ricevere offerte esclusive e materiale informativo tramite newsletter.</label>
					</div>
					<div class="form-checkbox">
						<input type="checkbox" id="privacy" name="privacy" value="1" required>
						<label for="privacy">Ho preso visione della <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" target="_blank">privacy policy</a> ed acconsento al trattamento dei dati <span class="required">*</span></label>
					</div>
				</div>

				<div class="form-row form-row--submit">
					<button type="submit" class="btn btn--primary btn--lg" id="submit-btn">
						<span class="btn__text">Invia richiesta</span>
						<span class="btn__loading" hidden>
							<svg width="24" height="24" viewBox="0 0 24 24" class="spinner" aria-hidden="true"><circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-width="3" stroke-dasharray="31.4" stroke-linecap="round"/></svg>
							Invio in corso...
						</span>
					</button>
				</div>

				<div class="form-message" id="form-message" hidden></div>
			</form>
		</div>
	</div>
</section>
