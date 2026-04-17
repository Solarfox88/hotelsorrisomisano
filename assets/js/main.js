/**
 * Hotel Sorriso Misano - Main JavaScript
 *
 * Features:
 * - Smooth scroll for anchor links
 * - Sticky header with transparency
 * - Mobile menu toggle
 * - Scroll animations (fade-in on scroll)
 * - Image gallery sliders
 * - Contact form AJAX submission
 *
 * @package Hotel_Sorriso
 */

(function () {
	'use strict';

	/* ─── DOM Ready ─── */
	document.addEventListener('DOMContentLoaded', function () {
		initHeader();
		initMobileMenu();
		initSmoothScroll();
		initScrollAnimations();
		initSliders();
		initContactForm();
	});

	/* ============================================================
	   STICKY HEADER
	   ============================================================ */
	function initHeader() {
		var header = document.getElementById('site-header');
		if (!header) return;

		var scrollThreshold = 50;

		function updateHeader() {
			if (window.scrollY > scrollThreshold) {
				header.classList.add('is-scrolled');
			} else {
				header.classList.remove('is-scrolled');
			}
		}

		window.addEventListener('scroll', throttle(updateHeader, 16), { passive: true });
		updateHeader();
	}

	/* ============================================================
	   MOBILE MENU
	   ============================================================ */
	function initMobileMenu() {
		var toggle = document.getElementById('menu-toggle');
		var nav = document.getElementById('site-nav');
		if (!toggle || !nav) return;

		toggle.addEventListener('click', function () {
			var isExpanded = toggle.getAttribute('aria-expanded') === 'true';
			toggle.setAttribute('aria-expanded', !isExpanded);
			nav.classList.toggle('is-open');
			document.body.style.overflow = nav.classList.contains('is-open') ? 'hidden' : '';
		});

		// Close on overlay click
		nav.addEventListener('click', function (e) {
			if (e.target === nav) {
				closeMobileMenu(toggle, nav);
			}
		});

		// Close on nav link click
		var navLinks = nav.querySelectorAll('.nav__link, .nav__cta');
		navLinks.forEach(function (link) {
			link.addEventListener('click', function () {
				closeMobileMenu(toggle, nav);
			});
		});

		// Close on Escape
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape' && nav.classList.contains('is-open')) {
				closeMobileMenu(toggle, nav);
			}
		});
	}

	function closeMobileMenu(toggle, nav) {
		toggle.setAttribute('aria-expanded', 'false');
		nav.classList.remove('is-open');
		document.body.style.overflow = '';
	}

	/* ============================================================
	   SMOOTH SCROLL
	   ============================================================ */
	function initSmoothScroll() {
		document.querySelectorAll('a[href^="#"], [data-scroll]').forEach(function (link) {
			link.addEventListener('click', function (e) {
				var href = this.getAttribute('href');
				if (!href || href === '#') return;

				var target = document.querySelector(href);
				if (!target) return;

				e.preventDefault();

				var headerHeight = document.getElementById('site-header')
					? document.getElementById('site-header').offsetHeight
					: 80;

				var targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;

				window.scrollTo({
					top: targetPosition,
					behavior: 'smooth'
				});

				// Update URL hash without scrolling
				if (history.pushState) {
					history.pushState(null, null, href);
				}
			});
		});
	}

	/* ============================================================
	   SCROLL ANIMATIONS
	   ============================================================ */
	function initScrollAnimations() {
		var animatedElements = document.querySelectorAll('[data-animate]');
		if (!animatedElements.length) return;

		// Hero always visible
		var hero = document.querySelector('.hero');
		if (hero) {
			hero.classList.add('is-visible');
		}

		if ('IntersectionObserver' in window) {
			var observer = new IntersectionObserver(
				function (entries) {
					entries.forEach(function (entry) {
						if (entry.isIntersecting) {
							var delay = entry.target.getAttribute('data-delay') || 0;
							setTimeout(function () {
								entry.target.classList.add('is-visible');
							}, parseInt(delay, 10));
							observer.unobserve(entry.target);
						}
					});
				},
				{
					threshold: 0.1,
					rootMargin: '0px 0px -50px 0px'
				}
			);

			animatedElements.forEach(function (el) {
				observer.observe(el);
			});
		} else {
			// Fallback: show all immediately
			animatedElements.forEach(function (el) {
				el.classList.add('is-visible');
			});
		}
	}

	/* ============================================================
	   IMAGE SLIDERS
	   ============================================================ */
	function initSliders() {
		var sliders = document.querySelectorAll('.gallery-slider');
		sliders.forEach(function (slider) {
			setupSlider(slider);
		});
	}

	function setupSlider(sliderEl) {
		var slides = sliderEl.querySelectorAll('.gallery-slider__slide');
		if (slides.length === 0) return;

		var sliderId = sliderEl.id;
		var dotsContainer = document.getElementById(sliderId + '-dots');
		var currentIndex = 0;

		// Show first slide
		slides[0].classList.add('is-active');

		// Create dots
		if (dotsContainer) {
			slides.forEach(function (_, idx) {
				var dot = document.createElement('button');
				dot.className = 'gallery-slider__dot' + (idx === 0 ? ' is-active' : '');
				dot.setAttribute('aria-label', 'Vai alla foto ' + (idx + 1));
				dot.addEventListener('click', function () {
					goToSlide(idx);
				});
				dotsContainer.appendChild(dot);
			});
		}

		// Navigation buttons
		var prevBtns = document.querySelectorAll('[data-slider="' + sliderId + '"][data-dir="prev"]');
		var nextBtns = document.querySelectorAll('[data-slider="' + sliderId + '"][data-dir="next"]');

		prevBtns.forEach(function (btn) {
			btn.addEventListener('click', function () {
				goToSlide(currentIndex - 1);
			});
		});

		nextBtns.forEach(function (btn) {
			btn.addEventListener('click', function () {
				goToSlide(currentIndex + 1);
			});
		});

		// Auto-advance
		var autoTimer = setInterval(function () {
			goToSlide(currentIndex + 1);
		}, 5000);

		// Pause on hover
		sliderEl.addEventListener('mouseenter', function () {
			clearInterval(autoTimer);
		});

		sliderEl.addEventListener('mouseleave', function () {
			autoTimer = setInterval(function () {
				goToSlide(currentIndex + 1);
			}, 5000);
		});

		// Touch support
		var touchStartX = 0;
		var touchEndX = 0;

		sliderEl.addEventListener('touchstart', function (e) {
			touchStartX = e.changedTouches[0].screenX;
		}, { passive: true });

		sliderEl.addEventListener('touchend', function (e) {
			touchEndX = e.changedTouches[0].screenX;
			var diff = touchStartX - touchEndX;
			if (Math.abs(diff) > 50) {
				if (diff > 0) {
					goToSlide(currentIndex + 1);
				} else {
					goToSlide(currentIndex - 1);
				}
			}
		}, { passive: true });

		function goToSlide(index) {
			slides[currentIndex].classList.remove('is-active');
			currentIndex = (index + slides.length) % slides.length;
			slides[currentIndex].classList.add('is-active');

			// Update dots
			if (dotsContainer) {
				var dots = dotsContainer.querySelectorAll('.gallery-slider__dot');
				dots.forEach(function (dot, i) {
					dot.classList.toggle('is-active', i === currentIndex);
				});
			}
		}
	}

	/* ============================================================
	   CONTACT FORM
	   ============================================================ */
	function initContactForm() {
		var form = document.getElementById('contact-form');
		if (!form) return;

		form.addEventListener('submit', function (e) {
			e.preventDefault();

			var submitBtn = document.getElementById('submit-btn');
			var btnText = submitBtn.querySelector('.btn__text');
			var btnLoading = submitBtn.querySelector('.btn__loading');
			var messageEl = document.getElementById('form-message');

			// Show loading state
			btnText.hidden = true;
			btnLoading.hidden = false;
			submitBtn.disabled = true;

			// Collect form data
			var formData = new FormData(form);

			// Send AJAX request
			var xhr = new XMLHttpRequest();
			xhr.open('POST', (typeof hotelSorriso !== 'undefined' ? hotelSorriso.ajaxUrl : '/wp-admin/admin-ajax.php'), true);
			xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

			xhr.onload = function () {
				btnText.hidden = false;
				btnLoading.hidden = true;
				submitBtn.disabled = false;

				try {
					var response = JSON.parse(xhr.responseText);
					messageEl.hidden = false;

					if (response.success) {
						messageEl.className = 'form-message form-message--success';
						messageEl.textContent = response.data.message;
						form.reset();

						// Redirect after delay if URL provided
						if (response.data.redirect) {
							setTimeout(function () {
								window.location.href = response.data.redirect;
							}, 2000);
						}
					} else {
						messageEl.className = 'form-message form-message--error';
						messageEl.textContent = response.data.message || 'Errore nell\'invio. Riprova.';
					}
				} catch (parseError) {
					messageEl.hidden = false;
					messageEl.className = 'form-message form-message--error';
					messageEl.textContent = 'Errore nell\'invio. Riprova o contattaci telefonicamente.';
				}

				// Hide message after a delay
				setTimeout(function () {
					messageEl.hidden = true;
				}, 8000);
			};

			xhr.onerror = function () {
				btnText.hidden = false;
				btnLoading.hidden = true;
				submitBtn.disabled = false;

				messageEl.hidden = false;
				messageEl.className = 'form-message form-message--error';
				messageEl.textContent = 'Errore di connessione. Riprova.';
			};

			xhr.send(formData);
		});
	}

	/* ============================================================
	   UTILITIES
	   ============================================================ */
	function throttle(fn, wait) {
		var lastTime = 0;
		return function () {
			var now = Date.now();
			if (now - lastTime >= wait) {
				lastTime = now;
				fn.apply(this, arguments);
			}
		};
	}
})();
