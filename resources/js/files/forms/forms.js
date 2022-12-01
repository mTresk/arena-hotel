export function formFieldsInit(options = { viewPass: false, autoHeight: false }) {
	const formFields = document.querySelectorAll('input[placeholder],textarea[placeholder]')
	if (formFields.length) {
		formFields.forEach((formField) => {
			if (!formField.hasAttribute('data-placeholder-nohide')) {
				formField.dataset.placeholder = formField.placeholder
			}
		})
	}
	document.body.addEventListener('focusin', function (e) {
		const targetElement = e.target
		if (targetElement.tagName === 'INPUT' || targetElement.tagName === 'TEXTAREA') {
			if (targetElement.dataset.placeholder) {
				targetElement.placeholder = ''
			}
			if (!targetElement.hasAttribute('data-no-focus-classes')) {
				targetElement.classList.add('_form-focus')
				targetElement.parentElement.classList.add('_form-focus')
			}
		}
	})
	document.body.addEventListener('focusout', function (e) {
		const targetElement = e.target
		if (targetElement.tagName === 'INPUT' || targetElement.tagName === 'TEXTAREA') {
			if (targetElement.dataset.placeholder) {
				targetElement.placeholder = targetElement.dataset.placeholder
			}
			if (!targetElement.hasAttribute('data-no-focus-classes')) {
				targetElement.classList.remove('_form-focus')
				targetElement.parentElement.classList.remove('_form-focus')
			}
		}
	})
}

/* Модуь звездного рейтинга */
export function formRating() {
	const ratings = document.querySelectorAll('.rating')
	if (ratings.length > 0) {
		initRatings()
	}
	// Основная функция
	function initRatings() {
		let ratingActive, ratingValue
		// "Бегаем" по всем рейтингам на странице
		for (let index = 0; index < ratings.length; index++) {
			const rating = ratings[index]
			initRating(rating)
		}
		// Инициализируем конкретный рейтинг
		function initRating(rating) {
			initRatingVars(rating)

			setRatingActiveWidth()

			if (rating.classList.contains('rating_set')) {
				setRating(rating)
			}
		}
		// Инициализайция переменных
		function initRatingVars(rating) {
			ratingActive = rating.querySelector('.rating__active')
			ratingValue = rating.querySelector('.rating__value')
		}
		// Изменяем ширину активных звезд
		function setRatingActiveWidth(index = ratingValue.innerHTML) {
			const ratingActiveWidth = index / 0.05
			ratingActive.style.width = `${ratingActiveWidth}%`
		}
		// Возможность указать оценку
		function setRating(rating) {
			const ratingItems = rating.querySelectorAll('.rating__item')
			for (let index = 0; index < ratingItems.length; index++) {
				const ratingItem = ratingItems[index]
				ratingItem.addEventListener('mouseenter', function (e) {
					// Обновление переменных
					initRatingVars(rating)
					// Обновление активных звезд
					setRatingActiveWidth(ratingItem.value)
				})
				ratingItem.addEventListener('mouseleave', function (e) {
					// Обновление активных звезд
					setRatingActiveWidth()
				})
				ratingItem.addEventListener('click', function (e) {
					// Обновление переменных
					initRatingVars(rating)

					if (rating.dataset.ajax) {
						// "Отправить" на сервер
						setRatingValue(ratingItem.value, rating)
					} else {
						// Отобразить указанную оцнку
						ratingValue.innerHTML = index + 1
						setRatingActiveWidth()
					}
				})
			}
		}
	}
}
