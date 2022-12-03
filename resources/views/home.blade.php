@extends('layout.app')

@if($homeData['seo_title'])
    @section('title', $homeData['seo_title'])
@else
    @section('title', $homeData['site_name'])
@endif

@isset($homeData['seo_description'])
    @section('description', $homeData['seo_description'])
@endisset


@isset($homeData->getMedia('seo')[0])
    @section('image', $homeData->getMedia('seo')[0]->getUrl('ogImage'))
@endisset

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
                        <h2 class="rooms-block__title">{{ $homeData['slider1_title'] }}</h2>
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
                            <h2 class="banner__title">{{ $homeData['banner1_title'] }}</h2>
                            <p class="banner__text">{{ $homeData['banner1_description'] }}</p>
                        </div>
                        <picture>
                            <source srcset="{{ $homeData->getMedia('banner')[0]->getUrl('bannerWebp') }}" type="image/webp">
                            <img src="{{ $homeData->getMedia('banner')[0]->getUrl('banner') }}" alt="" class="banner__background"/></picture>
                        <img src="{{ asset('img/logo.svg') }}" alt="Логотип" class="banner__logo"/>
                    </div>
                </div>
            </div>
        </section>
        <section class="rooms-block rooms-block--bottom">
            <div class="rooms-block__container">
                <div class="rooms-block__body">
                    <div class="rooms-block__banner banner">
                        <div class="banner__content">
                            <h2 class="banner__title">{{ $homeData['banner2_title'] }}</h2>
                            <p class="banner__text">{{ $homeData['banner2_description'] }}</p>
                        </div>

                        <picture>
                            <source srcset="{{ $homeData->getMedia('banner1')[0]->getUrl('bannerWebp') }}" type="image/webp">
                            <img src="{{ $homeData->getMedia('banner1')[0]->getUrl('banner') }}" alt="" class="banner__background"/></picture>
                        <img src="{{ asset('img/logo.svg') }}" alt="Логотип" class="banner__logo"/>
                    </div>
                    <div class="rooms-block__content">
                        <h2 class="rooms-block__title">{{ $homeData['slider2_title'] }}</h2>
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
                    @foreach($homeData['features'] as $feature)
                        <div class="features__item feature">
                            <div class="feature__icon">
                                <img src="{{ url($feature['icon']) }}" alt="Иконка">
                            </div>
                            <h3 class="feature__title">{{ $feature['title'] }}</h3>
                            <p class="feature__text">
                                {{ $feature['description'] }}
                            </p>
                        </div>
                    @endforeach
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
