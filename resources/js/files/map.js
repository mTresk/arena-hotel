const map = document.querySelector('#map')

if (map) {
	function mapInit() {
		ymaps.ready(init)
		function init() {
			// Создание карты.
			var myMap = new ymaps.Map('map', {
				// Координаты центра карты.
				// Порядок по умолчанию: «широта, долгота».
				// Чтобы не определять координаты центра карты вручную,
				// воспользуйтесь инструментом Определение координат.
				controls: [],
				center: [57.161968520537066, 65.515336338623],
				// Уровень масштабирования. Допустимые значения:
				// от 0 (весь мир) до 19.
				zoom: 16,
			})

			let myPlacemark = new ymaps.Placemark(
				[57.161968520537066, 65.515336338623],
				{},
				{
					hasBalloon: false,
					hideIconOnBalloonOpen: false,
					// Необходимо указать данный тип макета.
					iconLayout: 'default#imageWithContent',
					// Своё изображение иконки метки.
					iconImageHref: 'img/map.svg',
					// Размеры метки.
					iconImageSize: [46, 32],
					// Смещение левого верхнего угла иконки относительно
					// её "ножки" (точки привязки).
					iconImageOffset: [-20, -15],
					// Смещение слоя с содержимым относительно слоя с картинкой.
					iconContentOffset: [0, 0],
				}
			)
			myMap.geoObjects.add(myPlacemark)

			// myMap.behaviors.disable('drag');
			myMap.controls.remove('geolocationControl') // удаляем геолокацию
			myMap.controls.remove('searchControl') // удаляем поиск
			myMap.controls.remove('trafficControl') // удаляем контроль трафика
			myMap.controls.remove('typeSelector') // удаляем тип
			myMap.controls.remove('fullscreenControl') // удаляем кнопку перехода в полноэкранный режим
			myMap.controls.remove('rulerControl') // удаляем контрол правил
			myMap.behaviors.disable(['scrollZoom']) // отключаем скролл карты (опционально)
		}
	}

	mapInit()
}
