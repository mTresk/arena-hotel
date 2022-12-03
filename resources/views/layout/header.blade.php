<header class="header">
    <div class="header__top top-header">
        <div class="top-header__container">
            <div class="top-header__body">
                <div class="top-header__left">
                    <div id="date-time" class="top-header__date">Сб, 26 Ноя 01:50:53</div>
                    <div class="top-header__address">
                        <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.9 0.5C2.191 0.5 0 2.691 0 5.4C0 9.075 4.9 14.5 4.9 14.5C4.9 14.5 9.8 9.075 9.8 5.4C9.8 2.691 7.609 0.5 4.9 0.5ZM4.9 7.15C4.43587 7.15 3.99075 6.96563 3.66256 6.63744C3.33437 6.30925 3.15 5.86413 3.15 5.4C3.15 4.93587 3.33437 4.49075 3.66256 4.16256C3.99075 3.83437 4.43587 3.65 4.9 3.65C5.36413 3.65 5.80925 3.83437 6.13744 4.16256C6.46563 4.49075 6.65 4.93587 6.65 5.4C6.65 5.86413 6.46563 6.30925 6.13744 6.63744C5.80925 6.96563 5.36413 7.15 4.9 7.15V7.15Z"
                                fill="white"/>
                        </svg>
                        <span>{{ $address }}</span>
                    </div>
                </div>
                <div data-da=".menu__body,850,3" class="top-header__right">
                    <a href="tel:{{ str_replace(['(', ')', ' ', '-'], '', $phone) }}" class="top-header__phone">
                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.2667 8.9C9.33333 9.83333 9.33333 10.7667 8.4 10.7667C7.46667 10.7667 6.53333 9.83333 5.6 8.9C4.66667 7.96667 3.73333 7.03333 3.73333 6.1C3.73333 5.16667 4.66667 5.16667 5.6 4.23333C6.53333 3.3 3.73333 0.5 2.8 0.5C1.86667 0.5 0 3.3 0 3.3C0 5.16667 1.918 8.95133 3.73333 10.7667C5.54867 12.582 9.33333 14.5 11.2 14.5C11.2 14.5 14 12.6333 14 11.7C14 10.7667 11.2 7.96667 10.2667 8.9Z"
                                fill="white"/>
                        </svg>
                        <span>{{ $phone }}</span>
                    </a>
                    <button data-popup="#callback" type="button" class="top-header__callback">
                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 8.2C7.41881 8.19998 7.82807 8.32519 8.17518 8.55954C8.52229 8.79389 8.79139 9.12668 8.94792 9.51514C9.10445 9.9036 9.14125 10.33 9.05359 10.7395C8.96594 11.1491 8.75782 11.523 8.456 11.8134L7.119 13.1H9.1V14.5H4.9V13.2932L7.4851 10.8047C7.56851 10.7245 7.63075 10.6249 7.66624 10.5148C7.70174 10.4047 7.70939 10.2875 7.6885 10.1737C7.66761 10.0599 7.61885 9.95304 7.54656 9.8627C7.47427 9.77236 7.38072 9.70135 7.27427 9.65602C7.16782 9.61068 7.0518 9.59244 6.93658 9.60292C6.82135 9.61341 6.71053 9.65229 6.61401 9.71609C6.51749 9.77988 6.43829 9.86661 6.38349 9.96851C6.32869 10.0704 6.30001 10.1843 6.3 10.3H4.9C4.9 9.74305 5.12125 9.2089 5.51508 8.81508C5.9089 8.42125 6.44304 8.2 7 8.2V8.2ZM11.2 8.2V11H12.6V8.2H14V14.5H12.6V12.4H9.8V8.2H11.2ZM1.4 7.5C1.39914 8.33971 1.58748 9.16883 1.95104 9.92576C2.3146 10.6827 2.84403 11.348 3.5 11.8722V13.5634C2.43545 12.9492 1.55147 12.0654 0.937048 11.001C0.322623 9.93654 -0.000568893 8.72904 7.5172e-07 7.5H1.4ZM7 0.500003C10.6295 0.500003 13.6143 3.2629 13.965 6.8H12.5566C12.4202 5.71853 11.9712 4.70035 11.2646 3.87033C10.5581 3.0403 9.62462 2.43451 8.57879 2.12721C7.53296 1.81992 6.42019 1.8245 5.37692 2.14037C4.33365 2.45625 3.40523 3.0697 2.7055 3.9055L4.2 5.4H7.5172e-07V1.2L1.7129 2.9122C2.36942 2.15423 3.18142 1.54648 4.09372 1.13025C5.00602 0.714019 5.99723 0.499068 7 0.500003V0.500003Z"
                                fill="white"/>
                        </svg>
                        <span>Заказать звонок</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="header__bottom bottom-header">
        <div class="bottom-header__container">
            <div class="bottom-header__body">
                <div class="bottom-header__left">
                    <a href="{{ route('home') }}" class="bottom-header__logo">
                        <img src="{{ asset('img/logo.svg') }}" alt="Логотип гостиницы"/>
                    </a>
                    <div class="bottom-header__menu menu">
                        <nav class="menu__body">
                            <a href="{{ route('home') }}" class="menu__main">Главная</a>
                            <ul class="menu__list">
                                <li class="menu__item"><a href="{{ route('rooms') }}" class="menu__link">Номера и цены</a></li>
                                <li class="menu__item"><a href="{{ route('service.show', 'cafe') }}" class="menu__link">Кафе</a></li>
                                <li class="menu__item"><a href="{{ route('service.show', 'spa') }}" class="menu__link">Сауна и бассейн</a></li>
                                <li class="menu__item"><a href="{{ route('service.show', 'parking') }}" class="menu__link">Парковка</a></li>
                                <li class="menu__item"><a href="{{ route('service.show', 'fitness') }}" class="menu__link">Фитнес зал</a></li>
                                <li class="menu__item"><a href="{{ route('contacts') }}" class="menu__link">Контакты</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="bottom-header__socials">
                    <a href="{{ $whatsapp }}" target="_blank" class="bottom-header__social">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_150_3145)">
                                <path
                                    d="M17.0513 2.90625C15.18 1.03125 12.6913 0 10.04 0C4.57877 0 0.13377 4.445 0.13377 9.91C0.13377 11.6562 0.591269 13.3637 1.45752 14.8637L0.0512695 20L5.30502 18.6213C6.75377 19.41 8.38377 19.8287 10.0388 19.8287H10.0425C15.5038 19.8287 19.9525 15.3838 19.9525 9.91875C19.9525 7.27 18.9213 4.7825 17.05 2.9075L17.0513 2.90625ZM10.0425 18.1562C8.56252 18.1562 7.11252 17.7575 5.84752 17.0075L5.54627 16.8275L2.42877 17.6437L3.26127 14.605L3.06627 14.2925C2.23752 12.9837 1.80502 11.4687 1.80502 9.91C1.80502 5.3675 5.50002 1.67125 10.0475 1.67125C12.2463 1.67125 14.3175 2.53125 15.8713 4.085C17.4263 5.64375 18.2813 7.71 18.2813 9.9125C18.2775 14.4587 14.5825 18.155 10.0425 18.155V18.1562ZM14.5588 11.985C14.3125 11.86 13.0938 11.2625 12.8675 11.18C12.6413 11.0975 12.4763 11.055 12.3088 11.305C12.145 11.5512 11.6688 12.11 11.5238 12.2775C11.3788 12.4412 11.235 12.465 10.9888 12.34C10.7425 12.215 9.94127 11.9537 8.99627 11.11C8.26127 10.4537 7.76252 9.64125 7.61752 9.395C7.47252 9.14875 7.60127 9.0125 7.72752 8.89125C7.84127 8.78125 7.97377 8.6025 8.09877 8.4575C8.22377 8.3125 8.26252 8.21125 8.34502 8.04375C8.42752 7.88 8.38752 7.735 8.32502 7.61C8.26252 7.485 7.76627 6.26625 7.56377 5.77C7.36502 5.285 7.15752 5.3525 7.00502 5.34375C6.86002 5.33625 6.69627 5.33625 6.53252 5.33625C6.36877 5.33625 6.09877 5.39875 5.87252 5.645C5.64627 5.89125 5.00502 6.4925 5.00502 7.71125C5.00502 8.93 5.89127 10.1062 6.01627 10.2737C6.14127 10.4375 7.76252 12.9413 10.2463 14.0125C10.8363 14.2663 11.2975 14.4187 11.6563 14.5362C12.25 14.7237 12.7888 14.6962 13.215 14.6337C13.6913 14.5637 14.68 14.0362 14.8875 13.4575C15.095 12.8787 15.095 12.3837 15.0325 12.2812C14.9738 12.1712 14.81 12.11 14.56 11.9837L14.5588 11.985Z"
                                    fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_150_3145">
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                    <a href="{{ $telegram }}" target="_blank" class="bottom-header__social">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_150_3147)">
                                <path d="M14.9998 6.66675L4.1665 10.4167L7.9165 11.6667M14.9998 6.66675L7.9165 11.6667M14.9998 6.66675L11.6665 15.4167L7.9165 11.6667"
                                      stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path
                                    d="M9.99984 18.3334C14.6023 18.3334 18.3332 14.6026 18.3332 10.0001C18.3332 5.39758 14.6023 1.66675 9.99984 1.66675C5.39734 1.66675 1.6665 5.39758 1.6665 10.0001C1.6665 14.6026 5.39734 18.3334 9.99984 18.3334Z"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_150_3147">
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                    <a href="{{ $viber }}" target="_blank" class="bottom-header__social">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18V18ZM10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20Z"
                                fill="white"/>
                            <path
                                d="M13.6439 9.40397C13.6559 7.91197 12.4249 6.54396 10.8999 6.35496L10.7999 6.33996C10.7235 6.32478 10.6458 6.31608 10.5679 6.31396C10.2549 6.31396 10.1719 6.53996 10.1499 6.67496C10.1374 6.73103 10.1363 6.78903 10.1466 6.84554C10.1569 6.90204 10.1785 6.95591 10.2099 7.00396C10.3139 7.14896 10.4959 7.17396 10.6419 7.19596C10.6849 7.20196 10.7259 7.20696 10.7589 7.21596C12.1299 7.53096 12.5919 8.02796 12.8169 9.43096C12.8229 9.46596 12.8249 9.50797 12.8269 9.55297C12.8369 9.71997 12.8579 10.069 13.2219 10.069C13.2519 10.069 13.2839 10.067 13.3179 10.061C13.6569 10.008 13.6459 9.68897 13.6409 9.53597C13.6384 9.49901 13.6384 9.46192 13.6409 9.42497C13.642 9.41835 13.6427 9.41167 13.6429 9.40496L13.6439 9.40397Z"
                                fill="white"/>
                            <path
                                d="M10.4799 5.80689C10.5199 5.80989 10.5599 5.81289 10.5909 5.81789C12.8409 6.17589 13.8769 7.27589 14.1639 9.61789C14.1689 9.65789 14.1689 9.70589 14.1699 9.75789C14.1729 9.94089 14.1789 10.3209 14.5749 10.3289H14.5869C14.6413 10.3318 14.6956 10.323 14.7463 10.3032C14.797 10.2833 14.8429 10.2529 14.8809 10.2139C15.0039 10.0809 14.9959 9.88389 14.9889 9.72389C14.9869 9.68589 14.9849 9.64889 14.9859 9.61689C15.0139 7.22189 13.0059 5.04989 10.6879 4.96989L10.6599 4.97089C10.6509 4.97221 10.6419 4.97287 10.6329 4.97289C10.6099 4.97289 10.5809 4.97089 10.5509 4.96889C10.511 4.96524 10.4709 4.96324 10.4309 4.96289C10.0619 4.96289 9.99188 5.23289 9.98288 5.39489C9.96288 5.76789 10.3119 5.79489 10.4799 5.80689V5.80689ZM14.0549 12.6439C14.0067 12.6062 13.9591 12.5678 13.9119 12.5289C13.6659 12.3249 13.4039 12.1369 13.1519 11.9549C13.0992 11.917 13.0465 11.879 12.9939 11.8409C12.6699 11.6069 12.3789 11.4919 12.1039 11.4919C11.7339 11.4919 11.4109 11.7039 11.1439 12.1209C11.0259 12.3049 10.8819 12.3949 10.7059 12.3949C10.583 12.3905 10.4626 12.3595 10.3529 12.3039C9.30788 11.8139 8.56088 11.0639 8.13388 10.0739C7.92788 9.59389 7.99388 9.28189 8.35788 9.02689C8.56388 8.88289 8.94788 8.61389 8.92088 8.09889C8.89088 7.51389 7.63988 5.75389 7.11288 5.55389C6.88808 5.46905 6.64017 5.46834 6.41488 5.55189C5.80988 5.76189 5.37488 6.13189 5.15788 6.61889C4.94788 7.09089 4.95788 7.64389 5.18588 8.21989C5.84288 9.88589 6.76588 11.3379 7.93188 12.5359C9.07188 13.7089 10.4739 14.6689 12.0979 15.3909C12.2439 15.4559 12.3979 15.4909 12.5099 15.5169L12.6049 15.5409C12.6179 15.5446 12.6313 15.5466 12.6449 15.5469H12.6579C13.4219 15.5469 14.3389 14.8269 14.6209 14.0049C14.8679 13.2849 14.4169 12.9299 14.0549 12.6449V12.6439ZM10.8179 7.70989C10.6879 7.71289 10.4149 7.71989 10.3189 8.00589C10.2749 8.13989 10.2799 8.25589 10.3349 8.35089C10.4159 8.49089 10.5719 8.53389 10.7129 8.55689C11.2249 8.64189 11.4889 8.93489 11.5409 9.47689C11.5659 9.73089 11.7309 9.90689 11.9429 9.90689C11.9589 9.90723 11.9749 9.90656 11.9909 9.90489C12.2459 9.87289 12.3689 9.67989 12.3579 9.32989C12.3619 8.96389 12.1769 8.54989 11.8619 8.21989C11.5459 7.88789 11.1649 7.70089 10.8179 7.70989V7.70989Z"
                                fill="white"/>
                        </svg>
                    </a>
                </div>
                <button type="button" class="icon-menu"><span></span></button>
            </div>
        </div>
    </div>
</header>
