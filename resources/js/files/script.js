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
    stickyHeader()
}

const header = document.querySelector('.bottom-header')
const wrapper = document.querySelector('.wrapper')
const sticky = header.offsetTop

function stickyHeader() {
    if (window.scrollY > sticky) {
        wrapper.classList.add('sticky')
    } else {
        wrapper.classList.remove('sticky')
    }
}

// Прелоадер
document.body.classList.add('loaded_hiding');
window.setTimeout(function () {
    document.body.classList.add('loaded');
    document.body.classList.remove('loaded_hiding');
}, 500);

// Кнопка наверх
function topButton() {
    let footer = document.querySelector('footer');
    if (footer) {
        footer.innerHTML += '<div class="top-button"><i class="_icon-up"><span></span></i>';

        function trackScroll() {
            let scrolled = window.scrollY;
            let coords = document.documentElement.clientHeight;

            if (scrolled > coords) {
                goTopBtn.classList.add('_active');
            }
            if (scrolled < coords) {
                goTopBtn.classList.remove('_active');
            }
        }

        function backToTop() {
            if (window.scrollY > 0) {
                window.scrollBy(0, -80);
                setTimeout(backToTop, 6);
            }
        }

        let goTopBtn = document.querySelector('.top-button');

        window.addEventListener('scroll', trackScroll);
        goTopBtn.addEventListener('click', backToTop);
    }
}

topButton();

