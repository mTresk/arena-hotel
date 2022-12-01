import dayjs from 'dayjs'
import 'dayjs/locale/ru.js'
import updateLocale from 'dayjs/plugin/updateLocale.js'

// Дата и время
const interval = setInterval(() => {
	const now = new Date()

	dayjs.extend(updateLocale)

	dayjs.updateLocale('ru', {
		monthsShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
	})
	const dateTime = dayjs(now).locale('ru').format('dd, DD MMM HH:mm:ss')

	const element = document.getElementById('date-time')

	if (element) {
		element.innerHTML = dateTime
	}
}, 1000)

// Прилипающий хедер

window.onscroll = function () {
	stckyHeader()
}

const header = document.querySelector('.bottom-header')
const wrapper = document.querySelector('.wrapper')
const sticky = header.offsetTop

function stckyHeader() {
	if (window.pageYOffset > sticky) {
		wrapper.classList.add('sticky')
	} else {
		wrapper.classList.remove('sticky')
	}
}
