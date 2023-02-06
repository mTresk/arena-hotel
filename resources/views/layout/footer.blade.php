<footer class="footer">
    <div class="footer__container">
        <div class="footer__body">
            <a href="{{ route('home') }}" class="footer__logo">
                <img src="{{ asset('img/logo.svg') }}" alt="Логотип сайта"/>
            </a>
            <div class="footer__column footer__column--menu">
                <h3 class="footer__title">Меню</h3>
                <div class="footer__menu footer-menu">
                    <nav class="footer-menu__body">
                        <ul class="footer-menu__list">
                            <li class="footer-menu__item">
                                <a href="{{ route('rooms') }}" class="footer-menu__link">Номера и цены</a>
                            </li>
                            <li class="footer-menu__item"><a href="{{ route('service.show', 'cafe') }}" class="footer-menu__link">Кафе</a></li>
                            {{--                            <li class="footer-menu__item">--}}
                            {{--                                <a href="{{ route('service.show', 'spa') }}" class="footer-menu__link">Сауна и бассейн</a>--}}
                            {{--                            </li>--}}
                            {{--                            <li class="footer-menu__item">--}}
                            {{--                                <a href="{{ route('service.show', 'parking') }}" class="footer-menu__link">Парковка</a>--}}
                            {{--                            </li>--}}
                            <li class="footer-menu__item">
                                <a href="{{ route('service.show', 'fitness') }}" class="footer-menu__link">Фитнес зал и зона отдыха</a>
                            </li>
                            <li class="footer-menu__item">
                                <a href="{{ route('contacts') }}" class="footer-menu__link">Контакты</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="footer__column footer__column--contacts">
                <h3 class="footer__title">Контакты</h3>
                <ul class="footer__list">
                    <li class="footer__item">
                        <a href="tel:{{ str_replace(['(', ')', ' ', '-'], '', $phone) }}" class="footer__phone">
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_150_3423)">
                                    <path
                                        d="M7.5625 6.875C6.875 7.5625 6.875 8.25 6.1875 8.25C5.5 8.25 4.8125 7.5625 4.125 6.875C3.4375 6.1875 2.75 5.5 2.75 4.8125C2.75 4.125 3.4375 4.125 4.125 3.4375C4.8125 2.75 2.75 0.6875 2.0625 0.6875C1.375 0.6875 0 2.75 0 2.75C0 4.125 1.41281 6.91281 2.75 8.25C4.08719 9.58719 6.875 11 8.25 11C8.25 11 10.3125 9.625 10.3125 8.9375C10.3125 8.25 8.25 6.1875 7.5625 6.875Z"
                                        fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_150_3423">
                                        <rect width="11" height="11" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <span>{{ $phone }}</span></a>
                    </li>
                    <li class="footer__item">
                        <div class="footer__address">
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.5 0C3.60181 0 2.0625 1.53931 2.0625 3.4375C2.0625 6.875 5.5 11 5.5 11C5.5 11 8.9375 6.875 8.9375 3.4375C8.9375 1.53931 7.39819 0 5.5 0ZM5.5 5.5C4.36081 5.5 3.4375 4.57669 3.4375 3.4375C3.4375 2.29831 4.36081 1.375 5.5 1.375C6.63919 1.375 7.5625 2.29831 7.5625 3.4375C7.5625 4.57669 6.63919 5.5 5.5 5.5Z"
                                    fill="white"/>
                            </svg>
                            <span>{{ $address_full }}</span>
                        </div>
                    </li>
                    <li class="footer__item">
                        <a href="mailto:{{ $email }}" class="footer__email">
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_150_3431)">
                                    <path
                                        d="M9.16644 0H1.83356C0.825 0 0 0.825 0 1.83356V9.16644C0 10.1757 0.825 11 1.83356 11H9.16644C10.175 11 11 10.1757 11 9.16644V1.83356C11 0.825 10.175 0 9.16644 0ZM9.16644 1.375C9.25238 1.375 9.3335 1.39975 9.40294 1.44306L5.49931 4.67019L1.59638 1.44306C1.66581 1.39975 1.74694 1.375 1.83287 1.375H9.16575H9.16644ZM1.83356 9.625C1.81294 9.625 1.79231 9.62363 1.77238 9.62088L4.19581 6.259L3.88162 5.94481L1.375 8.45144V1.8865L5.5 6.875L9.625 1.8865V8.45144L7.11838 5.94481L6.80419 6.259L9.22762 9.62088C9.20769 9.62363 9.18706 9.625 9.16712 9.625H1.83425H1.83356Z"
                                        fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_150_3431">
                                        <rect width="11" height="11" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <span>{{ $email }}</span></a>
                    </li>
                    <li class="footer__item">
                        <div class="footer__schedule">
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_150_3435)">
                                    <path
                                        d="M7.07644 8.04856L4.8125 5.78462V2.75H6.1875V5.21537L8.04856 7.07644L7.07644 8.04856ZM5.5 0C2.46262 0 0 2.46262 0 5.5C0 8.53738 2.46262 11 5.5 11C8.53738 11 11 8.53738 11 5.5C11 2.46262 8.53738 0 5.5 0ZM5.5 9.625C3.22163 9.625 1.375 7.77837 1.375 5.5C1.375 3.22163 3.22163 1.375 5.5 1.375C7.77837 1.375 9.625 3.22163 9.625 5.5C9.625 7.77837 7.77837 9.625 5.5 9.625Z"
                                        fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_150_3435">
                                        <rect width="11" height="11" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <span>{{ $schedule }}</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="footer__column">
                <h3 class="footer__title">Реквизиты</h3>
                <ul class="footer__list">
                    @foreach($requisites as $item)
                        <li class="footer__item">{{ $item['item'] }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="footer__column">
                <h3 class="footer__title">При поддержке</h3>
                <div class="footer__partner-logo">
                    <picture>
                        <source srcset="{{ asset('img/government.webp') }}" type="image/webp">
                        <img src="{{ asset('img/government.png') }}" alt=""/></picture>
                </div>
                <div class="footer__partner-text">Правительство Тюменской области</div>
            </div>
        </div>
        <div class="footer__bottom">
            <a href="/policy" class="footer__policy">Политика конфиденциальности</a>
            <div class="footer__copyright">© @php echo date( 'Y' ) @endphp. {{ $site_name }}</div>
            <div class="footer__developer">Разработка сайта: <a href="https://t.me/tresk">Maxim Tresk</a></div>
        </div>
    </div>
</footer>
