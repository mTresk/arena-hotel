@extends('layout.app')

@section('content')
    <main class="page">
        <section data-prlx-parent class="page-header">
            <picture>
                <source srcset="img/rooms-header.webp" type="image/webp">
                <img data-prlx data-direction="0" src="img/rooms-header.jpg" alt="Фоновое изображение" class="page-header__background"/></picture>
            <div class="page-header__container">
                <div class="page-header__body">
                    <h1 class="page-header__title">Все номера</h1>
                </div>
            </div>
        </section>
        <div class="page-panel">
            <div class="page-panel__container">
                <div class="page-panel__body">
                    <div class="page-panel__panel panel" id="panel"></div>
                </div>
            </div>
        </div>
        <section class="rooms">
            <div class="rooms__container">
                <div class="rooms__body">
                    @foreach($rooms as $room)
                        <a href="{{ route('room', $room->id ) }}" class="rooms-block__card swiper-slide room-card">
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
            </div>
        </section>
        @include('layout.map')
    </main>
@endsection
