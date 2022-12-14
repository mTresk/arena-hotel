@extends('layout.app')

@if($pageData->seo_title)
    @section('title', $pageData->seo_title)
@else
    @section('title', $pageData->page_title)
@endif

@if($pageData->seo_description)
    @section('description', $pageData->seo_description)
@else
    @section('description', $pageData->page_title)
@endif

@isset($pageData->getMedia('seo')[0])
    @section('image', $pageData->getMedia('seo')[0]->getUrl('ogImage'))
@endisset

@section('content')
    <main class="page">
        <section data-prlx-parent class="page-header">
            @isset($pageData->getMedia('headers')[0])
                <picture>
                    <source srcset="{{ $pageData->getMedia('headers')[0]->getUrl('headerMobileWebp') }}" type="image/webp" media="(max-width: 560px)">
                    <source srcset="{{ $pageData->getMedia('headers')[0]->getUrl('headerMobile') }}" media="(max-width: 560px)">
                    <source srcset="{{ $pageData->getMedia('headers')[0]->getUrl('headerWebp') }} 1x, {{ $pageData->getMedia('headers')[0]->getUrl('headerWebp@2') }} 2x,"
                            type="image/webp">
                    <img data-prlx data-direction="0" src="{{ $pageData->getMedia('headers')[0]->getUrl('header') }}"
                         srcset="{{ $pageData->getMedia('headers')[0]->getUrl('header') }} 1x, {{ $pageData->getMedia('headers')[0]->getUrl('header@2') }} 2x,"
                         alt="Фоновое изображение" class="page-header__background"/>
                </picture>
            @endisset
            <div class="page-header__container">
                <div class="page-header__body">
                    <h1 class="page-header__title">{{ $pageData->page_title }}</h1>
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
        <section class="rooms">
            <div class="rooms__container">
                <div class="rooms__body">
                    @foreach($rooms as $room)
                        <a href="{{ route('room.show', $room->id ) }}" class="rooms-block__card swiper-slide room-card room-card--page">
                            @isset($room->thumb[0])
                                <picture>
                                    <source srcset="{{ $room->thumb[0]['thumbWebp'] }} 1x, {{ $room->thumb[0]['thumbBigWebp'] }} 2x"
                                            type="image/webp">
                                    <img src="{{ $room->thumb[0]['thumb'] }}"
                                         srcset="{{ $room->thumb[0]['thumb'] }} 1x, {{ $room->thumb[0]['thumbBig']}} 2x"
                                         alt="{{ $room->name }}" class="room-card__image room-card__image--front"/>
                                </picture>
                            @endisset
                            @isset($room->thumb[1])
                                <picture>
                                    <source srcset="{{ $room->thumb[1]['thumbWebp'] }} 1x, {{ $room->thumb[1]['thumbBigWebp'] }} 2x"
                                            type="image/webp">
                                    <img src="{{ $room->thumb[1]['thumb'] }}"
                                         srcset="{{ $room->thumb[1]['thumb'] }} 1x, {{ $room->thumb[1]['thumbBig']}} 2x"
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
            </div>
        </section>
        @include('layout.map')
    </main>
@endsection
