@extends('layout.app')

@section('content')
    <main class="page">
        <div data-prlx-parent class="hero">
            <picture>
                <source srcset="{{ asset('img/hero-bg.webp') }}" type="image/webp">
                <img data-prlx data-direction="0" src="{{ asset('img/hero-bg.jpg') }}" alt="Стадион геолог" class="hero__background"/></picture>
            <div class="hero__container">
                <div class="hero__body">
                    <div class="hero__panel panel" id="panel"></div>
                </div>
            </div>
        </div>
        <section class="advantages advantages--main">
            <div class="advantages__container">
                <div class="advantages__body">
                    <div class="advantages__item item-advantages">
                        <div class="item-advantages__image">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.5625 1.875C6.81113 1.875 7.04959 1.97377 7.22542 2.14959C7.40122 2.3254 7.5 2.56386 7.5 2.8125V8.4375C7.4997 9.01935 7.67985 9.58699 8.01566 10.0622C8.35147 10.5374 8.82641 10.8967 9.375 11.0906V2.8125C9.375 2.56386 9.47378 2.3254 9.64958 2.14959C9.82541 1.97377 10.0639 1.875 10.3125 1.875C10.5611 1.875 10.7996 1.97377 10.9754 2.14959C11.1512 2.3254 11.25 2.56386 11.25 2.8125V11.0906C11.7986 10.8967 12.2735 10.5374 12.6093 10.0622C12.9452 9.58699 13.1253 9.01935 13.125 8.4375V2.8125C13.125 2.56386 13.2238 2.3254 13.3996 2.14959C13.5754 1.97377 13.8139 1.875 14.0625 1.875C14.3111 1.875 14.5496 1.97377 14.7254 2.14959C14.9012 2.3254 15 2.56386 15 2.8125V8.4375C15.0002 9.5181 14.6271 10.5656 13.9437 11.4027C13.2604 12.2398 12.3088 12.8151 11.25 13.0312V27.1875C11.25 27.4361 11.1512 27.6746 10.9754 27.8504C10.7996 28.0262 10.5611 28.125 10.3125 28.125C10.0639 28.125 9.82541 28.0262 9.64958 27.8504C9.47378 27.6746 9.375 27.4361 9.375 27.1875V13.0312C8.31622 12.8151 7.36463 12.2398 6.68126 11.4027C5.99794 10.5656 5.62478 9.5181 5.625 8.4375V2.8125C5.625 2.56386 5.72377 2.3254 5.89957 2.14959C6.07541 1.97377 6.31388 1.875 6.5625 1.875ZM19.6481 4.64813C19.9463 4.34813 20.2819 4.1175 20.625 3.96562V13.125H18.75V6.5625C18.75 5.93063 19.0763 5.21813 19.6481 4.64813ZM20.625 15V27.1875C20.625 27.4361 20.7238 27.6746 20.8996 27.8504C21.0754 28.0262 21.3139 28.125 21.5625 28.125C21.8111 28.125 22.0496 28.0262 22.2254 27.8504C22.4012 27.6746 22.5 27.4361 22.5 27.1875V2.8125C22.5 2.56386 22.4012 2.3254 22.2254 2.14959C22.0496 1.97377 21.8111 1.875 21.5625 1.875C20.3194 1.875 19.1569 2.48625 18.3206 3.32062C17.4862 4.15687 16.875 5.31937 16.875 6.5625V14.0625C16.875 14.3111 16.9738 14.5496 17.1496 14.7254C17.3254 14.9012 17.5639 15 17.8125 15H20.625Z"
                                    fill="white"/>
                            </svg>
                        </div>
                        <div class="item-advantages__info">
                            <h3 class="item-advantages__title">Кафе</h3>
                            <p class="item-advantages__text">Вкусно и быстро поесть</p>
                        </div>
                    </div>
                    <div class="advantages__item item-advantages">
                        <div class="item-advantages__image">
                            <svg width="30" height="27" viewBox="0 0 30 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M30 27.0002C28.335 27.0002 27.405 26.4452 26.73 26.0402C26.175 25.7103 25.83 25.5002 25.005 25.5002C24.165 25.5002 23.835 25.6952 23.28 26.0402C22.59 26.4452 21.675 27.0002 20.01 27.0002C18.345 27.0002 17.415 26.4452 16.74 26.0402C16.185 25.7103 15.84 25.5002 15.015 25.5002C14.175 25.5002 13.845 25.6952 13.29 26.0402C12.6 26.4452 11.67 27.0002 10.005 27.0002C8.34002 27.0002 7.41001 26.4452 6.73501 26.0402C6.17998 25.6952 5.835 25.5002 5.00998 25.5002C4.18499 25.5002 3.83998 25.6952 3.28499 26.0402C2.59501 26.4452 1.66499 27.0002 0 27.0002V24.0003C0.839997 24.0003 1.17 23.8052 1.72498 23.4603C2.41501 23.0553 3.34498 22.5002 5.00998 22.5002C6.67502 22.5002 7.60499 23.0553 8.27999 23.4603C8.83497 23.8052 9.16501 24.0003 10.005 24.0003C10.845 24.0003 11.175 23.8052 11.73 23.4603C12.42 23.0553 13.35 22.5002 15.015 22.5002C16.68 22.5002 17.61 23.0553 18.285 23.4603C18.84 23.7902 19.185 24.0003 20.01 24.0003C20.835 24.0003 21.18 23.8052 21.735 23.4603C22.41 23.0553 23.34 22.5002 25.005 22.5002C26.67 22.5002 27.6 23.0553 28.275 23.4603C28.83 23.8052 29.16 24.0003 30 24.0003V27.0002ZM30 20.2502C28.335 20.2502 27.405 19.6952 26.73 19.2902C26.175 18.9603 25.83 18.7502 25.005 18.7502C24.165 18.7502 23.835 18.9452 23.28 19.2902C22.605 19.6952 21.675 20.2502 20.01 20.2502C18.345 20.2502 17.415 19.6952 16.74 19.2902C16.185 18.9603 15.84 18.7502 15.015 18.7502C14.175 18.7502 13.845 18.9452 13.29 19.2902C12.615 19.6952 11.685 20.2502 10.02 20.2502C8.355 20.2502 7.42499 19.6952 6.74999 19.2902C6.19501 18.9603 5.84999 18.7502 5.02501 18.7502C4.19998 18.7502 3.85501 18.9452 3.29998 19.2902C2.59501 19.6952 1.66499 20.2502 0 20.2502V17.2503C0.839997 17.2503 1.17 17.0552 1.72498 16.7103C2.39998 16.3053 3.32999 15.7502 4.99499 15.7502C6.65999 15.7502 7.59 16.3053 8.265 16.7103C8.81999 17.0402 9.165 17.2503 9.98999 17.2503C10.83 17.2503 11.16 17.0552 11.715 16.7103C12.39 16.3053 13.32 15.7502 14.985 15.7502C16.65 15.7502 17.58 16.3053 18.255 16.7103C18.81 17.0402 19.155 17.2503 19.98 17.2503C20.805 17.2503 21.15 17.0552 21.705 16.7103C22.38 16.3053 23.31 15.7502 24.975 15.7502C26.64 15.7502 27.57 16.3053 28.245 16.7103C28.8 17.0402 29.145 17.2503 29.97 17.2503V20.2502H30ZM10.005 13.5002C10.845 13.5002 11.175 13.3052 11.73 12.9602C12.42 12.5552 13.35 12.0002 15.015 12.0002C16.68 12.0002 17.61 12.5552 18.285 12.9602C18.84 13.2903 19.185 13.5002 20.01 13.5002C20.835 13.5002 21.18 13.3052 21.735 12.9602C21.915 12.8552 22.125 12.7352 22.35 12.6153L12.72 3.00025C10.395 0.675238 8.24997 -0.0147428 4.49999 0.000237649V3.75027C7.23001 3.73524 8.83497 4.33527 10.5 6.00027L12 7.50025L7.12498 12.3752C7.59001 12.5552 7.96499 12.7802 8.27999 12.9602C8.83497 13.3052 9.16501 13.5002 10.005 13.5002Z"
                                    fill="white"/>
                                <path
                                    d="M21.75 7.50026C23.8211 7.50026 25.5 5.82131 25.5 3.75023C25.5 1.67919 23.8211 0.000244141 21.75 0.000244141C19.679 0.000244141 18 1.67919 18 3.75023C18 5.82131 19.679 7.50026 21.75 7.50026Z"
                                    fill="white"/>
                            </svg>
                        </div>
                        <div class="item-advantages__info">
                            <h3 class="item-advantages__title">Бассейн и сауна</h3>
                            <p class="item-advantages__text">Хамам, сауна и бассейн</p>
                        </div>
                    </div>
                    <div class="advantages__item item-advantages">
                        <div class="item-advantages__image">
                            <svg width="30" height="20" viewBox="0 0 30 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M27.8705 7.07467L22.5811 6.25972L19.3577 0.993931C19.1885 0.718306 18.951 0.491018 18.6682 0.334043C18.3855 0.177106 18.0669 0.0957679 17.7435 0.0979429L4.23427 0.205606C3.8445 0.208906 3.4654 0.333519 3.1497 0.562156C2.834 0.790793 2.59736 1.11209 2.47266 1.48143L0.9375 6.03363V16.4999H4.16051C4.41105 17.3144 4.91614 18.027 5.60152 18.5333C6.28695 19.0396 7.11664 19.3128 7.96875 19.3128C8.82086 19.3128 9.65055 19.0396 10.336 18.5333C11.0214 18.027 11.5265 17.3144 11.777 16.4999H17.7543C18.0048 17.3144 18.5099 18.027 19.1953 18.5333C19.8807 19.0396 20.7104 19.3128 21.5625 19.3128C22.4146 19.3128 23.2443 19.0396 23.9297 18.5333C24.6151 18.027 25.1202 17.3144 25.3707 16.4999H29.0625V8.46449C29.064 8.12823 28.9444 7.80269 28.7255 7.54743C28.5066 7.2922 28.203 7.12435 27.8705 7.07467ZM13.125 2.00969L17.7585 1.97279L20.3425 6.19428L13.125 6.19177V2.00969ZM4.24927 2.08049L11.25 2.02469V6.19113L2.86412 6.18813L4.24927 2.08049ZM7.96875 17.4374C7.55156 17.4374 7.14371 17.3137 6.79684 17.0819C6.44996 16.8502 6.17959 16.5207 6.01995 16.1353C5.86027 15.7498 5.8185 15.3257 5.89991 14.9166C5.98129 14.5074 6.18221 14.1315 6.47719 13.8365C6.7722 13.5415 7.14806 13.3406 7.55722 13.2592C7.96642 13.1778 8.39055 13.2196 8.77597 13.3792C9.1614 13.5389 9.49084 13.8093 9.72263 14.1562C9.95441 14.503 10.0781 14.9109 10.0781 15.328C10.0775 15.8873 9.85507 16.4235 9.4596 16.8189C9.06416 17.2144 8.52799 17.4368 7.96875 17.4374ZM21.5625 17.4374C21.1453 17.4374 20.7375 17.3137 20.3906 17.0819C20.0437 16.8502 19.7733 16.5207 19.6137 16.1353C19.454 15.7498 19.4123 15.3257 19.4937 14.9166C19.575 14.5074 19.776 14.1315 20.0709 13.8365C20.3659 13.5415 20.7418 13.3406 21.151 13.2592C21.5602 13.1778 21.9843 13.2196 22.3697 13.3792C22.7551 13.5389 23.0846 13.8093 23.3164 14.1562C23.5482 14.503 23.6719 14.9109 23.6719 15.328C23.6712 15.8873 23.4488 16.4235 23.0534 16.8189C22.6579 17.2144 22.1217 17.4368 21.5625 17.4374ZM27.1875 14.6249H25.4835C25.3188 13.7049 24.8357 12.872 24.1189 12.2722C23.4021 11.6723 22.4972 11.3436 21.5625 11.3436C20.6278 11.3436 19.7229 11.6723 19.0061 12.2722C18.2893 12.872 17.8062 13.7049 17.6415 14.6249H11.8897C11.725 13.7049 11.242 12.872 10.5252 12.2722C9.80839 11.6723 8.90344 11.3436 7.96875 11.3436C7.03406 11.3436 6.12911 11.6723 5.41234 12.2722C4.69553 12.872 4.21249 13.7049 4.04779 14.6249H2.8125V8.06396L22.1793 8.09497L27.1875 8.86657V14.6249Z"
                                    fill="white"/>
                            </svg>
                        </div>
                        <div class="item-advantages__info">
                            <h3 class="item-advantages__title">Парковка</h3>
                            <p class="item-advantages__text">Бесплатная парковка 24/7</p>
                        </div>
                    </div>
                    <div class="advantages__item item-advantages">
                        <div class="item-advantages__image">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M27.855 19.29L30 17.145L27.855 15L22.5 20.355L9.64502 7.5L15 2.145L12.855 0L10.71 2.145L8.56502 0L5.35499 3.21002L3.20998 1.065L1.065 3.21002L3.20998 5.35499L0 8.56502L2.14501 10.71L0 12.855L2.14501 15L7.50001 9.64502L20.355 22.5L15 27.855L17.145 30L19.29 27.855L21.435 30L24.645 26.79L26.79 28.935L28.935 26.79L26.79 24.645L30 21.435L27.855 19.29Z"
                                    fill="white"/>
                            </svg>
                        </div>
                        <div class="item-advantages__info">
                            <h3 class="item-advantages__title">Фитнес зал</h3>
                            <p class="item-advantages__text">Современный спортивный зал</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="rooms-block">
            <div class="rooms-block__container">
                <div class="rooms-block__body">
                    <div class="rooms-block__content">
                        <h2 class="rooms-block__title">Номера класса стандарт</h2>
                        <div class="rooms-block__slider rooms-block__slider--top swiper">
                            <div class="rooms-block__wrapper swiper-wrapper">
                                @foreach($standardRooms as $room)
                                    <a href="{{ route('room.show', $room->id ) }}" class="rooms-block__card swiper-slide room-card">
                                        <picture>
                                            @isset($room->getMedia('thumbs')[0])
                                                <source srcset="{{ $room->getMedia('thumbs')[0]->getUrl('thumbWebp') }}" type="image/webp">
                                                <img src="{{ $room->getMedia('thumbs')[0]->getUrl('thumb') }}" alt="" class="room-card__image room-card__image--front"/></picture>
                                        @endisset
                                        <picture>
                                            @isset($room->getMedia('thumbs')[1])
                                                <source srcset="{{ $room->getMedia('thumbs')[1]->getUrl('thumbWebp') }}" type="image/webp">
                                                <img src="{{ $room->getMedia('thumbs')[1]->getUrl('thumb') }}" alt="" class="room-card__image room-card__image--back"/></picture>
                                        @endisset
                                        <div class="room-card__content">
                                            <h3 class="room-card__title">{{ $room->name }}</h3>
                                            <div class="room-card__offer">
                                                <div class="room-card__price">{{ $room->price }}</div>
                                                <div class="room-card__conditions">{{ $room->description }}</div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <nav class="rooms-block__navigation">
                                <button type="button" class="rooms-block__button rooms-block__button--prev slider-button">
                                    <svg width="9" height="8" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.646447 3.64645C0.451184 3.84171 0.451184 4.15829 0.646447 4.35355L3.82843 7.53553C4.02369 7.7308 4.34027 7.7308 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.976311 4.7308 0.659728 4.53553 0.464466C4.34027 0.269204 4.02369 0.269204 3.82843 0.464466L0.646447 3.64645ZM9 3.5L1 3.5V4.5L9 4.5V3.5Z"
                                            fill="#2C3640"/>
                                    </svg>
                                </button>
                                <button type="button" class="rooms-block__button rooms-block__button--next slider-button">
                                    <svg width="9" height="8" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.35355 4.35343C8.54882 4.15817 8.54882 3.84159 8.35355 3.64632L5.17157 0.464344C4.97631 0.269081 4.65973 0.269081 4.46447 0.464344C4.2692 0.659606 4.2692 0.976188 4.46447 1.17145L7.29289 3.99988L4.46447 6.82831C4.2692 7.02357 4.2692 7.34015 4.46447 7.53541C4.65973 7.73067 4.97631 7.73067 5.17157 7.53541L8.35355 4.35343ZM0 4.49988H8V3.49988H0L0 4.49988Z"
                                            fill="#2C3640"/>
                                    </svg>
                                </button>
                            </nav>
                        </div>
                    </div>
                    <div class="rooms-block__banner banner">
                        <div class="banner__content">
                            <h2 class="banner__title">#Гостиница</h2>
                            <p class="banner__text">Наши номера класса стандарт</p>
                        </div>
                        <picture>
                            <source srcset="img/rooms-slider/bg.webp" type="image/webp">
                            <img src="img/rooms-slider/bg.jpg" alt="" class="banner__background"/></picture>
                        <img src="img/logo.svg" alt="Логотип" class="banner__logo"/>
                    </div>
                </div>
            </div>
        </section>
        <section class="rooms-block rooms-block--bottom">
            <div class="rooms-block__container">
                <div class="rooms-block__body">
                    <div class="rooms-block__banner banner">
                        <div class="banner__content">
                            <h2 class="banner__title">#Гостиница</h2>
                            <p class="banner__text">Наши номера класса полу-люкс и люкс</p>
                        </div>

                        <picture>
                            <source srcset="img/rooms-slider/bg-2.webp" type="image/webp">
                            <img src="img/rooms-slider/bg-2.jpg" alt="" class="banner__background"/></picture>
                        <img src="img/logo.svg" alt="Логотип" class="banner__logo"/>
                    </div>
                    <div class="rooms-block__content">
                        <h2 class="rooms-block__title">Номера класса Полу-люкс и люкс</h2>
                        <div class="rooms-block__slider rooms-block__slider--bottom swiper">
                            <div class="rooms-block__wrapper swiper-wrapper">
                                @foreach($luxuryRooms as $room)
                                    <a href="{{ route('room.show', $room->id ) }}" class="rooms-block__card swiper-slide room-card">
                                        <picture>
                                            @isset($room->getMedia('thumbs')[0])
                                                <source srcset="{{ $room->getMedia('thumbs')[0]->getUrl('thumbWebp') }}" type="image/webp">
                                                <img src="{{ $room->getMedia('thumbs')[0]->getUrl('thumb') }}" alt="" class="room-card__image room-card__image--front"/></picture>
                                        @endisset
                                        <picture>
                                            @isset($room->getMedia('thumbs')[1])
                                                <source srcset="{{ $room->getMedia('thumbs')[1]->getUrl('thumbWebp') }}" type="image/webp">
                                                <img src="{{ $room->getMedia('thumbs')[1]->getUrl('thumb') }}" alt="" class="room-card__image room-card__image--back"/></picture>
                                        @endisset
                                        <div class="room-card__content">
                                            <h3 class="room-card__title">{{ $room->name }}</h3>
                                            <div class="room-card__offer">
                                                <div class="room-card__price">{{ $room->price }}</div>
                                                <div class="room-card__conditions">{{ $room->description }}</div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <nav class="rooms-block__navigation">
                                <button type="button" class="rooms-block__button rooms-block__button--prev-bottom slider-button">
                                    <svg width="9" height="8" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.646447 3.64645C0.451184 3.84171 0.451184 4.15829 0.646447 4.35355L3.82843 7.53553C4.02369 7.7308 4.34027 7.7308 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.976311 4.7308 0.659728 4.53553 0.464466C4.34027 0.269204 4.02369 0.269204 3.82843 0.464466L0.646447 3.64645ZM9 3.5L1 3.5V4.5L9 4.5V3.5Z"
                                            fill="#2C3640"/>
                                    </svg>
                                </button>
                                <button type="button" class="rooms-block__button rooms-block__button--next-bottom slider-button">
                                    <svg width="9" height="8" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.35355 4.35343C8.54882 4.15817 8.54882 3.84159 8.35355 3.64632L5.17157 0.464344C4.97631 0.269081 4.65973 0.269081 4.46447 0.464344C4.2692 0.659606 4.2692 0.976188 4.46447 1.17145L7.29289 3.99988L4.46447 6.82831C4.2692 7.02357 4.2692 7.34015 4.46447 7.53541C4.65973 7.73067 4.97631 7.73067 5.17157 7.53541L8.35355 4.35343ZM0 4.49988H8V3.49988H0L0 4.49988Z"
                                            fill="#2C3640"/>
                                    </svg>
                                </button>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="features">
            <div class="features__container">
                <div class="features__body">
                    <div class="features__item feature">
                        <div class="feature__icon">
                            <svg width="46" height="41" viewBox="0 0 46 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_150_2236)">
                                    <path
                                        d="M44.9712 15.7333H31.8754C31.6503 15.7333 31.4662 15.9166 31.4662 16.1405V18.5837C31.4662 18.8076 31.6503 18.9909 31.8754 18.9909H44.9712C45.1963 18.9909 45.3805 18.8076 45.3805 18.5837V16.1405C45.3805 15.9166 45.1963 15.7333 44.9712 15.7333ZM38.1164 22.6557H31.8754C31.6503 22.6557 31.4662 22.8389 31.4662 23.0629V25.5061C31.4662 25.73 31.6503 25.9133 31.8754 25.9133H38.1164C38.3415 25.9133 38.5256 25.73 38.5256 25.5061V23.0629C38.5256 22.8389 38.3415 22.6557 38.1164 22.6557ZM21.0458 11.1778H18.8308C18.5136 11.1778 18.2578 11.4323 18.2578 11.7479V24.371C18.2578 24.5543 18.3448 24.7222 18.4932 24.8291L26.1102 30.3568C26.366 30.54 26.7241 30.4891 26.9082 30.2347L28.2229 28.448V28.443C28.4071 28.1885 28.3508 27.8322 28.095 27.649L21.6136 22.9865V11.7479C21.6188 11.4323 21.3579 11.1778 21.0458 11.1778Z"
                                        fill="#A63D4D"/>
                                    <path
                                        d="M37.7993 29.0639H34.8424C34.556 29.0639 34.2849 29.2115 34.1314 29.4558C33.4817 30.4789 32.7246 31.4256 31.855 32.2909C30.3561 33.7823 28.6117 34.953 26.673 35.7674C24.6626 36.6123 22.5294 37.0399 20.3297 37.0399C18.1249 37.0399 15.9917 36.6123 13.9864 35.7674C12.0476 34.953 10.3032 33.7823 8.80435 32.2909C7.3055 30.7996 6.1289 29.0639 5.3104 27.1348C4.46124 25.1395 4.03154 23.017 4.03154 20.8232C4.03154 18.6294 4.46124 16.512 5.3104 14.5117C6.1289 12.5826 7.3055 10.8469 8.80435 9.35554C10.3032 7.86418 12.0476 6.69347 13.9864 5.87909C15.9917 5.03416 18.13 4.6066 20.3297 4.6066C22.5345 4.6066 24.6677 5.03416 26.673 5.87909C28.6117 6.69347 30.3561 7.86418 31.855 9.35554C32.7246 10.2208 33.4817 11.1676 34.1314 12.1906C34.2849 12.435 34.556 12.5826 34.8424 12.5826H37.7993C38.1522 12.5826 38.3773 12.2161 38.2187 11.9056C34.8834 5.30393 28.1207 1.01308 20.5701 0.926556C9.5154 0.789126 0.332997 9.79329 0.312535 20.7825C0.292073 31.7921 9.2596 40.725 20.3246 40.725C27.9723 40.725 34.8476 36.4189 38.2187 29.7408C38.3773 29.4304 38.1471 29.0639 37.7993 29.0639Z"
                                        fill="#A63D4D"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_150_2236">
                                        <rect width="45.5" height="39.8" fill="white" transform="translate(0 0.925003)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <h3 class="feature__title">Открыты 24/7</h3>
                        <p class="feature__text">
                            Мы открыты ежедневно и 24 часа в сутки, наш высококлассный персонал всегда готов
                            ответить на любые ваши вопросы.
                        </p>
                    </div>
                    <div class="features__item feature">
                        <div class="feature__icon">
                            <svg width="36" height="40" viewBox="0 0 36 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M6 4H30C30.5304 4 31.0391 4.21071 31.4142 4.58578C31.7893 4.96086 32 5.46955 32 6V12H4V6C4 5.46955 4.21071 4.96086 4.58578 4.58578C4.96086 4.21071 5.46955 4 6 4ZM32 34V16H4V34C4 34.5304 4.21071 35.0391 4.58578 35.4142C4.96086 35.7893 5.46955 36 6 36H30C30.5304 36 31.0391 35.7893 31.4142 35.4142C31.7893 35.0391 32 34.5304 32 34ZM0 6C0 4.4087 0.63214 2.88258 1.75736 1.75736C2.88258 0.63214 4.4087 0 6 0H30C31.5913 0 33.1174 0.63214 34.2426 1.75736C35.3678 2.88258 36 4.4087 36 6V34C36 35.5913 35.3678 37.1174 34.2426 38.2426C33.1174 39.3678 31.5913 40 30 40H6C4.4087 40 2.88258 39.3678 1.75736 38.2426C0.63214 37.1174 0 35.5913 0 34V6ZM8 6C7.46955 6 6.96085 6.2107 6.5858 6.5858C6.2107 6.96085 6 7.46955 6 8C6 8.53045 6.2107 9.03915 6.5858 9.4142C6.96085 9.7893 7.46955 10 8 10H12C12.5304 10 13.0391 9.7893 13.4142 9.4142C13.7893 9.03915 14 8.53045 14 8C14 7.46955 13.7893 6.96085 13.4142 6.5858C13.0391 6.2107 12.5304 6 12 6H8ZM22 10C22.5304 10 23.0391 9.7893 23.4142 9.4142C23.7893 9.03915 24 8.53045 24 8C24 7.46955 23.7893 6.96085 23.4142 6.5858C23.0391 6.2107 22.5304 6 22 6C21.4696 6 20.9609 6.2107 20.5858 6.5858C20.2107 6.96085 20 7.46955 20 8C20 8.53045 20.2107 9.03915 20.5858 9.4142C20.9609 9.7893 21.4696 10 22 10ZM30 8C30 8.53045 29.7893 9.03915 29.4142 9.4142C29.0391 9.7893 28.5304 10 28 10C27.4696 10 26.9609 9.7893 26.5858 9.4142C26.2107 9.03915 26 8.53045 26 8C26 7.46955 26.2107 6.96085 26.5858 6.5858C26.9609 6.2107 27.4696 6 28 6C28.5304 6 29.0391 6.2107 29.4142 6.5858C29.7893 6.96085 30 7.46955 30 8ZM22 26C22 27.0609 21.5785 28.0783 20.8284 28.8284C20.0783 29.5785 19.0609 30 18 30C16.9391 30 15.9217 29.5785 15.1715 28.8284C14.4214 28.0783 14 27.0609 14 26C14 24.9391 14.4214 23.9217 15.1715 23.1716C15.9217 22.4215 16.9391 22 18 22C19.0609 22 20.0783 22.4215 20.8284 23.1716C21.5785 23.9217 22 24.9391 22 26ZM26 26C26 28.1218 25.1572 30.1566 23.6569 31.6569C22.1566 33.1572 20.1218 34 18 34C15.8782 34 13.8435 33.1572 12.3432 31.6569C10.8429 30.1566 10 28.1218 10 26C10 23.8782 10.8429 21.8434 12.3432 20.3431C13.8435 18.8428 15.8782 18 18 18C20.1218 18 22.1566 18.8428 23.6569 20.3431C25.1572 21.8434 26 23.8782 26 26Z"
                                      fill="#A63D4D"/>
                            </svg>
                        </div>
                        <h3 class="feature__title">Прачечная</h3>
                        <p class="feature__text">
                            Наши специалисты выстирают и отгладят деловые, спортивные костюмы, рубашки, сорочки
                            и т. д. Мы строго соблюдаем сроки выполнения заказов!
                        </p>
                    </div>
                    <div class="features__item feature">
                        <div class="feature__icon">
                            <svg width="36" height="40" viewBox="0 0 36 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_150_2265)">
                                    <path
                                        d="M33.6467 0H1.97922C0.89065 0 0 0.89065 0 1.97922V3.95844C0 5.047 0.89065 5.93765 1.97922 5.93765H3.95844V23.7506H15.8337V28.8768L7.50125 37.1895L10.3118 40L15.8337 34.4582V39.5844H19.7922V34.4582L25.3142 40L28.1247 37.1895L19.7922 28.8768V23.7506H31.6675V5.93765H33.6467C34.7353 5.93765 35.6259 5.047 35.6259 3.95844V1.97922C35.6259 0.89065 34.7353 0 33.6467 0ZM27.709 19.7922H7.91685V5.93765H27.709V19.7922Z"
                                        fill="#A63D4D"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_150_2265">
                                        <rect width="36" height="40" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <h3 class="feature__title">Конференц-зал</h3>
                        <p class="feature__text">
                            Удобное место для проведения бизнес-презентаций, форумов и семинаров, оборудованное
                            современной мультимедийной техникой. По заказу клиентов персонал гостиницы
                            обеспечивает coffee-time.
                        </p>
                    </div>
                    <div class="features__item feature">
                        <div class="feature__icon">
                            <svg width="36" height="40" viewBox="0 0 36 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_150_2244)">
                                    <path
                                        d="M24.286 40C22.0257 40 19.8161 39.3297 17.9366 38.0739C16.0572 36.8181 14.5924 35.0332 13.7274 32.9449C12.8624 30.8566 12.6361 28.5587 13.077 26.3418C13.518 24.1249 14.6065 22.0885 16.2048 20.4902C17.8031 18.8919 19.8395 17.8034 22.0564 17.3624C24.2733 16.9215 26.5712 17.1478 28.6595 18.0128C30.7478 18.8778 32.5327 20.3426 33.7885 22.222C35.0443 24.1015 35.7146 26.3111 35.7146 28.5714C35.7146 31.6025 34.5105 34.5094 32.3672 36.6526C30.224 38.7959 27.3171 40 24.286 40ZM24.286 20C22.5908 20 20.9336 20.5027 19.524 21.4445C18.1144 22.3864 17.0158 23.7251 16.3671 25.2913C15.7183 26.8575 15.5486 28.5809 15.8793 30.2436C16.21 31.9063 17.0264 33.4336 18.2251 34.6323C19.4238 35.8311 20.9511 36.6474 22.6138 36.9782C24.2765 37.3089 25.9999 37.1391 27.5662 36.4904C29.1324 35.8416 30.4711 34.743 31.4129 33.3335C32.3547 31.9239 32.8574 30.2667 32.8574 28.5714C32.8574 26.2981 31.9544 24.118 30.3469 22.5105C28.7395 20.9031 26.5593 20 24.286 20Z"
                                        fill="#A63D4D"/>
                                    <path d="M26.5574 32.8572L22.8574 29.1572V22.8572H25.7146V27.9858L28.5717 30.8429L26.5574 32.8572Z" fill="#A63D4D"/>
                                    <path
                                        d="M34.2857 5.7143C34.2857 4.95653 33.9847 4.2298 33.4488 3.69398C32.913 3.15816 32.1864 2.85714 31.4286 2.85714H25.7143V0H22.8571V2.85714H11.4285V0H8.57145V2.85714H2.85714C2.09938 2.85714 1.37265 3.15816 0.83684 3.69398C0.301019 4.2298 0 4.95653 0 5.7143V34.2857C0 35.0435 0.301019 35.7702 0.83684 36.306C1.37265 36.8418 2.09938 37.1428 2.85714 37.1428H8.57145V34.2857H2.85714V5.7143H8.57145V8.57145H11.4285V5.7143H22.8571V8.57145H25.7143V5.7143H31.4286V14.2857H34.2857V5.7143Z"
                                        fill="#A63D4D"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_150_2244">
                                        <rect width="36" height="40" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <h3 class="feature__title">Бронирования номеров</h3>
                        <p class="feature__text">
                            Позвонив по телефону либо заполнив форму, вы сможете зарезервировать любой из 25-и
                            апартаментов гостиницы. В случае отсутствия желаемых номеров наши операторы
                            обязательно предложат компромиссный вариант.
                        </p>
                    </div>
                    <div class="features__item feature">
                        <div class="feature__icon">
                            <svg width="35" height="40" viewBox="0 0 35 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_150_2258)">
                                    <path d="M14.2855 20.8429L10.5855 17.1428L8.57129 19.1571L14.2855 24.8714L25.7141 13.4428L23.6998 11.4286L14.2855 20.8429Z" fill="#A63D4D"/>
                                    <path
                                        d="M17.1429 40L8.32 35.2957C5.80475 33.9576 3.70139 31.9598 2.23561 29.5168C0.76983 27.0737 -0.00301866 24.2776 8.86081e-06 21.4286V2.85715C0.000765255 2.09962 0.302028 1.37332 0.83768 0.837675C1.37334 0.302019 2.09962 0.000756395 2.85715 0H31.4286C32.1861 0.000756395 32.9124 0.302019 33.4481 0.837675C33.9837 1.37332 34.285 2.09962 34.2857 2.85715V21.4286C34.2888 24.2776 33.5159 27.0737 32.0501 29.5168C30.5843 31.9598 28.481 33.9576 25.9657 35.2957L17.1429 40ZM2.85715 2.85715V21.4286C2.85478 23.7597 3.4873 26.0475 4.68681 28.0464C5.88635 30.0452 7.60755 31.6796 9.6657 32.7743L17.1429 36.7615L24.62 32.7757C26.6784 31.681 28.3998 30.0463 29.5993 28.0472C30.7988 26.048 31.4312 23.76 31.4286 21.4286V2.85715H2.85715Z"
                                        fill="#A63D4D"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_150_2258">
                                        <rect width="34.5" height="40" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <h3 class="feature__title">Абсолютная безопасность</h3>
                        <p class="feature__text">
                            Охраной порядка в отеле занимается собственная служба безопасности. О сохранности
                            вашей машины или автобуса также нет смысла беспокоиться – он будет под строгим
                            круглосуточным наблюдением сотрудников автостоянки.
                        </p>
                    </div>
                    <div class="features__item feature">
                        <div class="feature__icon">
                            <svg width="55" height="40" viewBox="0 0 55 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_150_2271)">
                                    <path
                                        d="M39.8822 26.5502C36.4794 23.5894 32.0352 21.7972 27.1671 21.7972C22.2991 21.7972 17.8549 23.5894 14.446 26.5563C14.3519 26.6412 14.2943 26.7591 14.2853 26.8856C14.2763 27.012 14.3165 27.137 14.3976 27.2344L16.5774 29.8319C16.7529 30.0378 17.0617 30.062 17.2676 29.8864C19.9075 27.5614 23.3708 26.1566 27.1671 26.1566C30.9635 26.1566 34.4268 27.5614 37.0667 29.8803C37.2725 30.0559 37.5814 30.0317 37.757 29.8258L39.9367 27.2283C40.1062 27.0285 40.082 26.7258 39.8822 26.5502ZM46.9905 18.0675C41.6199 13.5929 34.7114 10.8986 27.1671 10.8986C19.6229 10.8986 12.7144 13.5929 7.33776 18.0675C7.23939 18.1504 7.17783 18.2689 7.16651 18.3971C7.15512 18.5252 7.19492 18.6527 7.27722 18.7517L9.45695 21.3492C9.62644 21.555 9.93525 21.5793 10.1351 21.4097C14.7548 17.571 20.6946 15.258 27.1671 15.258C33.6397 15.258 39.5795 17.571 44.1932 21.4097C44.3991 21.5793 44.7018 21.555 44.8713 21.3492L47.0511 18.7517C47.2205 18.5458 47.1963 18.237 46.9905 18.0675ZM54.0564 9.65132C46.7059 3.62076 37.2968 0 27.046 0C16.8619 0 7.51336 3.57232 0.181005 9.53024C0.13063 9.57071 0.0888617 9.62081 0.0581603 9.6777C0.0274591 9.73458 0.00844576 9.79702 0.00223935 9.86129C-0.00396705 9.92563 0.00275919 9.99051 0.022022 10.0522C0.0412849 10.1139 0.0726949 10.1711 0.114402 10.2205L2.29412 12.818C2.46365 13.0178 2.76639 13.0481 2.9662 12.8845C9.54773 7.55031 17.9215 4.35944 27.046 4.35944C36.2372 4.35944 44.6654 7.59878 51.2652 12.9996C51.471 13.1692 51.7738 13.1388 51.9433 12.933L54.123 10.3355C54.2986 10.1296 54.2683 9.82088 54.0564 9.65132ZM23.2315 36.0864C23.2315 37.1142 23.6398 38.0999 24.3665 38.8266C25.0932 39.5533 26.0788 39.9616 27.1066 39.9616C28.1343 39.9616 29.1199 39.5533 29.8466 38.8266C30.5734 38.0999 30.9816 37.1142 30.9816 36.0864C30.9816 35.0587 30.5734 34.0731 29.8466 33.3464C29.1199 32.6197 28.1343 32.2114 27.1066 32.2114C26.0788 32.2114 25.0932 32.6197 24.3665 33.3464C23.6398 34.0731 23.2315 35.0587 23.2315 36.0864Z"
                                        fill="#A63D4D"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_150_2271">
                                        <rect width="54.2373" height="40" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <h3 class="feature__title">Бесплатный Wifi</h3>
                        <p class="feature__text">
                            Каждый номер оборудован Wi-Fi зоной, благодаря которой гости могут беспрепятственно
                            и абсолютно бесплатно пользоваться интернетом. Новейшее оборудование обеспечивает
                            устойчивое соединение.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="news-block">
            <div class="news-block__container">
                <h2 class="news-block__title">#Новости</h2>
                <div class="news-block__body">
                    @foreach($news as $item)
                        <div class="news-block__item news-item">
                            <a href="{{ route('post.show', $item->slug) }}" class="news-item__image news-item__image--ibg">
                                <picture>
                                    <source srcset="{{ $item->getMedia('news')[0]->getUrl('newsWebp') }}" type="image/webp">
                                    <img src="{{ $item->getMedia('news')[0]->getUrl('news') }}" alt=""/></picture>
                            </a>
                            <div class="news-item__content">
                                <h3 class="news-item__title">{{ $item->title }}</h3>
                                <p class="news-item__text">
                                    {{ $item->excerpt }}
                                </p>
                                <a href="{{ route('post.show', $item->slug) }}" class="news-item__button">Подробнее</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        @include('layout.map')

    </main>
@endsection