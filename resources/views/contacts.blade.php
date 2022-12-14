@extends('layout.app')

@section('title', 'Контакты')

@section('content')
    <main class="page">
        <section data-prlx-parent class="page-header">
            <picture>
                <source srcset="{{ asset('img/contacts-header.webp') }}" type="image/webp">
                <img data-prlx data-direction="0" src="{{ asset('img/contacts-header.jpg') }}" alt="Фоновое изображение" class="page-header__background"/></picture>
            <div class="page-header__container">
                <div class="page-header__body">
                    <h2 class="page-header__title">Контакты</h2>
                </div>
            </div>
        </section>
        <div class="page-panel">
            <div class="page-panel__container">
                <div class="page-panel__body">
                    @include('blocks.widget-horizontal')
                </div>
            </div>
        </div>
        <section id="contacts" class="contacts">
            <div class="contacts__container">
                <div class="contacts__body">
                    <div class="contacts__items">
                        <div class="contacts__item contacts-item">
                            <div class="contacts-item__icon">
                                <svg width="21" height="30" viewBox="0 0 21 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.5 0C4.695 0 0 4.695 0 10.5C0 18.375 10.5 30 10.5 30C10.5 30 21 18.375 21 10.5C21 4.695 16.305 0 10.5 0ZM10.5 14.25C9.50544 14.25 8.55161 13.8549 7.84835 13.1517C7.14509 12.4484 6.75 11.4946 6.75 10.5C6.75 9.50544 7.14509 8.55161 7.84835 7.84835C8.55161 7.14509 9.50544 6.75 10.5 6.75C11.4946 6.75 12.4484 7.14509 13.1517 7.84835C13.8549 8.55161 14.25 9.50544 14.25 10.5C14.25 11.4946 13.8549 12.4484 13.1517 13.1517C12.4484 13.8549 11.4946 14.25 10.5 14.25Z"
                                        fill="white"/>
                                </svg>
                            </div>
                            <div class="contacts-item__content">
                                <h3 class="contacts-item__title">Адрес</h3>
                                <div class="contacts-item__data">
                                    {{ $address_full }}
                                </div>
                            </div>
                        </div>
                        <div class="contacts__item contacts-item">
                            <div class="contacts-item__icon">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M22 18C20 20 20 22 18 22C16 22 14 20 12 18C10 16 8 14 8 12C8 10 10 10 12 8C14 6 8 0 6 0C4 0 0 6 0 6C0 10 4.11 18.11 8 22C11.89 25.89 20 30 24 30C24 30 30 26 30 24C30 22 24 16 22 18Z"
                                        fill="white"/>
                                </svg>
                            </div>
                            <div class="contacts-item__content">
                                <h3 class="contacts-item__title">Телефоны</h3>
                                <a href="tel:{{ str_replace(['(', ')', ' ', '-'], '', $phone) }}" class="contacts-item__data">{{ $phone }}</a>
                                <a href="tel:{{ str_replace(['(', ')', ' ', '-'], '', $phone_mobile) }}" class="contacts-item__data">{{ $phone_mobile }}</a>
                                <a href="tel:{{ str_replace(['(', ')', ' ', '-'], '', $phone_local) }}" class="contacts-item__data">{{ $phone_local }}</a>
                            </div>
                        </div>
                        <div class="contacts__item contacts-item">
                            <div class="contacts-item__icon">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M24.9994 0H5.00063C2.25 0 0 2.25 0 5.00063V24.9994C0 27.7519 2.25 30 5.00063 30H24.9994C27.75 30 30 27.7519 30 24.9994V5.00063C30 2.25 27.75 0 24.9994 0ZM24.9994 3.75C25.2337 3.75 25.455 3.8175 25.6444 3.93563L14.9981 12.7369L4.35375 3.93563C4.54313 3.8175 4.76437 3.75 4.99875 3.75H24.9975H24.9994ZM5.00063 26.25C4.94438 26.25 4.88812 26.2463 4.83375 26.2388L11.4431 17.07L10.5863 16.2131L3.75 23.0494V5.145L15 18.75L26.25 5.145V23.0494L19.4137 16.2131L18.5569 17.07L25.1663 26.2388C25.1119 26.2463 25.0556 26.25 25.0012 26.25H5.0025H5.00063Z"
                                        fill="white"/>
                                </svg>
                            </div>
                            <div class="contacts-item__content">
                                <h3 class="contacts-item__title">Почта</h3>
                                <a href="mailto:{{ $email }}" class="contacts-item__data">{{ $email }}</a>
                            </div>
                        </div>
                        <div class="contacts__item contacts-item">
                            <div class="contacts-item__icon">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.2994 21.9506L13.125 15.7762V7.5H16.875V14.2238L21.9506 19.2994L19.2994 21.9506ZM15 0C6.71625 0 0 6.71625 0 15C0 23.2838 6.71625 30 15 30C23.2838 30 30 23.2838 30 15C30 6.71625 23.2838 0 15 0ZM15 26.25C8.78625 26.25 3.75 21.2137 3.75 15C3.75 8.78625 8.78625 3.75 15 3.75C21.2137 3.75 26.25 8.78625 26.25 15C26.25 21.2137 21.2137 26.25 15 26.25Z"
                                        fill="white"/>
                                </svg>
                            </div>
                            <div class="contacts-item__content">
                                <h3 class="contacts-item__title">Время работы</h3>
                                <div class="contacts-item__data">{{ $schedule }}</div>
                            </div>
                        </div>
                        <div class="contacts__item contacts-item">
                            <div class="contacts-item__icon">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.33333 0C1.48333 0 0 1.48333 0 3.33333V26.6667C0 28.5167 1.48333 30 3.33333 30H26.6667C28.5167 30 30 28.5167 30 26.6667V3.33333C30 1.48333 28.5167 0 26.6667 0H3.33333ZM3.33333 3.33333H26.6667V26.6667H3.33333V3.33333ZM6.66667 6.66667V10H23.3333V6.66667H6.66667ZM6.66667 13.3333V16.6667H23.3333V13.3333H6.66667ZM6.66667 20V23.3333H18.3333V20H6.66667Z"
                                        fill="white"/>
                                </svg>
                            </div>
                            <div class="contacts-item__content">
                                <h3 class="contacts-item__title">Реквизиты</h3>
                                @foreach($requisites as $item)
                                    <div class="contacts-item__data">{{ $item['item'] }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <component-contact-form/>
                </div>
            </div>
        </section>
        @include('layout.map')
    </main>
@endsection
