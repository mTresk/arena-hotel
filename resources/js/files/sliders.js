import Swiper, { Navigation, Autoplay, Thumbs } from 'swiper'
import '../../scss/base/swiper.scss'

function initSliders() {
	if (document.querySelector('.rooms-block__slider--top')) {
		// Создаем слайдер
		new Swiper('.rooms-block__slider--top', {
			modules: [Navigation, Autoplay],
			observer: true,
			observeParents: true,
			slidesPerView: 2,
			spaceBetween: 30,
			autoHeight: false,
			speed: 900,
			loop: true,
			autoplay: {
				delay: 5000,
				disableOnInteraction: false,
			},
			navigation: {
				prevEl: '.rooms-block__button--prev',
				nextEl: '.rooms-block__button--next',
			},
			breakpoints: {
				0: {
					spaceBetween: 0,
					slidesPerView: 1,
				},
				768: {
					slidesPerView: 2,
					spaceBetween: 20,
				},
				1150: {
					slidesPerView: 2,
					spaceBetween: 30,
				},
			},
		})
	}

	if (document.querySelector('.rooms-block__slider--bottom')) {
		// Создаем слайдер
		new Swiper('.rooms-block__slider--bottom', {
			modules: [Navigation, Autoplay],
			observer: true,
			observeParents: true,
			slidesPerView: 2,
			spaceBetween: 30,
			autoHeight: false,
			speed: 900,
			loop: true,
			autoplay: {
				delay: 5000,
				disableOnInteraction: false,
			},
			navigation: {
				prevEl: '.rooms-block__button--prev-bottom',
				nextEl: '.rooms-block__button--next-bottom',
			},
			breakpoints: {
				0: {
					spaceBetween: 0,
					slidesPerView: 1,
				},
				768: {
					slidesPerView: 2,
					spaceBetween: 20,
				},
				1150: {
					slidesPerView: 2,
					spaceBetween: 30,
				},
			},
		})
	}

	if (document.querySelector('.room__slider')) {
		let thumbSlider = new Swiper('.thumbs__slider', {
			modules: [Navigation, Thumbs],
			observer: true,
			observeParents: true,
			slidesPerView: 5,
			spaceBetween: 20,
			autoHeight: false,
			speed: 900,
			loop: false,
			watchSlidesProgress: true,
			breakpoints: {
				0: {
					spaceBetween: 10,
				},
				992: {
					spaceBetween: 20,
				},
			},
		})
		new Swiper('.room__slider', {
			modules: [Navigation, Autoplay, Thumbs],
			observer: true,
			observeParents: true,
			slidesPerView: 1,
			spaceBetween: 0,
			autoHeight: false,
			speed: 900,
			loop: true,
			autoplay: {
				delay: 5000,
				disableOnInteraction: false,
			},
			navigation: {
				prevEl: '.room__button--prev',
				nextEl: '.room__button--next',
			},
			thumbs: {
				swiper: thumbSlider,
			},
		})
	}
}

window.addEventListener('load', function (e) {
	initSliders()
})
