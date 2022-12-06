<section class="rooms-block">
    <div class="rooms-block__container">
        <div class="rooms-block__body">
            <div class="rooms-block__content">
                <h2 class="rooms-block__title">{{ $homeData['slider1_title'] }}</h2>
                <div class="rooms-block__slider rooms-block__slider--top swiper">
                    <div class="rooms-block__wrapper swiper-wrapper">
                        @foreach($standardRooms as $room)
                            <a href="{{ route('room.show', $room->id ) }}" class="rooms-block__card swiper-slide room-card">
                                @isset($room->thumb[0])
                                    <picture>
                                        <source srcset="{{ $room->thumb[0]['thumbWebp'] }} 1x, {{ $room->thumb[0]['thumbBigWebp'] }} 2x"
                                                type="image/webp">
                                        <img src="{{ $room->thumb[0]['thumb'] }}"
                                             srcset="{{ $room->thumb[0]['thumb'] }} 1x, {{ $room->thumb[0]['thumbBig'] }} 2x"
                                             alt="{{ $room->name }}" class="room-card__image room-card__image--front"/>
                                    </picture>
                                @endisset
                                @isset($room->thumb[1])
                                    <picture>
                                        <source srcset="{{ $room->thumb[1]['thumbWebp'] }} 1x, {{ $room->thumb[1]['thumbBigWebp'] }} 2x"
                                                type="image/webp">
                                        <img src="{{ $room->thumb[1]['thumb'] }}"
                                             srcset="{{ $room->thumb[1]['thumb'] }} 1x, {{ $room->thumb[1]['thumbBig'] }} 2x"
                                             alt="{{ $room->name }}" class="room-card__image room-card__image--back"/>
                                    </picture>
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
                        <button role="button" aria-label="previous" type="button" class="rooms-block__button rooms-block__button--prev slider-button">
                            <svg width="9" height="8" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.646447 3.64645C0.451184 3.84171 0.451184 4.15829 0.646447 4.35355L3.82843 7.53553C4.02369 7.7308 4.34027 7.7308 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.976311 4.7308 0.659728 4.53553 0.464466C4.34027 0.269204 4.02369 0.269204 3.82843 0.464466L0.646447 3.64645ZM9 3.5L1 3.5V4.5L9 4.5V3.5Z"
                                    fill="#2C3640"/>
                            </svg>
                        </button>
                        <button role="button" aria-label="next" type="button" class="rooms-block__button rooms-block__button--next slider-button">
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
                @isset($homeData->getMedia('banner')[0])
                    <picture>
                        <source srcset="{{ $homeData->getMedia('banner')[0]->getUrl('bannerWebp') }}" type="image/webp">
                        <img src="{{ $homeData->getMedia('banner')[0]->getUrl('banner') }}" alt="" class="banner__background"/></picture>
                @endisset
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
                @isset($homeData->getMedia('banner1')[0])
                    <picture>
                        <source srcset="{{ $homeData->getMedia('banner1')[0]->getUrl('bannerWebp') }}" type="image/webp">
                        <img src="{{ $homeData->getMedia('banner1')[0]->getUrl('banner') }}" alt="" class="banner__background"/></picture>
                @endisset
                <img src="{{ asset('img/logo.svg') }}" alt="Логотип" class="banner__logo"/>
            </div>
            <div class="rooms-block__content">
                <h2 class="rooms-block__title">{{ $homeData['slider2_title'] }}</h2>
                <div class="rooms-block__slider rooms-block__slider--bottom swiper">
                    <div class="rooms-block__wrapper swiper-wrapper">
                        @foreach($luxuryRooms as $room)
                            <a href="{{ route('room.show', $room->id ) }}" class="rooms-block__card swiper-slide room-card">
                                @isset($room->thumb[0])
                                    <picture>
                                        <source srcset="{{ $room->thumb[0]['thumbWebp'] }} 1x, {{ $room->thumb[0]['thumbBigWebp'] }} 2x"
                                                type="image/webp">
                                        <img src="{{ $room->thumb[0]['thumb'] }}"
                                             srcset="{{ $room->thumb[0]['thumb'] }} 1x, {{ $room->thumb[0]['thumbBig'] }} 2x"
                                             alt="{{ $room->name }}" class="room-card__image room-card__image--front"/>
                                    </picture>
                                @endisset
                                @isset($room->thumb[1])
                                    <picture>
                                        <source srcset="{{ $room->thumb[1]['thumbWebp'] }} 1x, {{ $room->thumb[1]['thumbBigWebp'] }} 2x"
                                                type="image/webp">
                                        <img src="{{ $room->thumb[1]['thumb'] }}"
                                             srcset="{{ $room->thumb[1]['thumb'] }} 1x, {{ $room->thumb[1]['thumbBig'] }} 2x"
                                             alt="{{ $room->name }}" class="room-card__image room-card__image--back"/>
                                    </picture>
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
                        <button role="button" aria-label="previous" type="button" class="rooms-block__button rooms-block__button--prev-bottom slider-button">
                            <svg width="9" height="8" viewBox="0 0 9 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.646447 3.64645C0.451184 3.84171 0.451184 4.15829 0.646447 4.35355L3.82843 7.53553C4.02369 7.7308 4.34027 7.7308 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.976311 4.7308 0.659728 4.53553 0.464466C4.34027 0.269204 4.02369 0.269204 3.82843 0.464466L0.646447 3.64645ZM9 3.5L1 3.5V4.5L9 4.5V3.5Z"
                                    fill="#2C3640"/>
                            </svg>
                        </button>
                        <button role="button" aria-label="next" type="button" class="rooms-block__button rooms-block__button--next-bottom slider-button">
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
