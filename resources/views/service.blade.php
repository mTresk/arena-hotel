@extends('layout.app')

@if($service->seo_title)
    @section('title', $service->seo_title)
@else
    @section('title', $service->title)
@endif

@if($service->seo_description)
    @section('description', $service->seo_description)
@else
    @section('description', $service->description)
@endif

@isset($service->getMedia('seo')[0])
    @section('image', $service->getMedia('seo')[0]->getUrl('ogImage'))
@endisset

@section('content')
    <main class="page">
        <section data-prlx-parent class="page-header">
            @isset($service->getMedia('headers')[0])
                <picture>
                    <source srcset="{{ $service->getMedia('headers')[0]->getUrl('headerWebp') }}" type="image/webp">
                    <img data-prlx data-direction="0" src="{{ $service->getMedia('headers')[0]->getUrl('header') }}" alt="Фоновое изображение" class="page-header__background"/>
                </picture>
            @endisset
            <div class="page-header__container">
                <div class="page-header__body">
                    <h2 class="page-header__title">{{ $service->title }}</h2>
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
        <section class="service">
            <div class="service__body">
                <div class="service__inner">
                    <div class="service__content content">
                        {!! $service->content !!}
                    </div>
                    <div class="service__images">
                        @foreach($service->getMedia('thumbs')->take(2) as $thumb)
                            <picture>
                                <source srcset="{{ $thumb->getUrl('thumbWebp') }}" type="image/webp">
                                <img src="{{ $thumb->getUrl('thumb') }}" alt="{{ $service->title }}" class="service__image"/></picture>
                        @endforeach
                    </div>
                </div>
                <div class="service__banner banner">
                    <div class="banner__content">
                        <h2 class="banner__title">{{ $service->banner_title }}</h2>
                        <p class="banner__text">{{ $service->banner_description }}</p>
                    </div>
                    @isset($service->getMedia('banners')[0])
                        <picture>
                            <source srcset="{{ $service->getMedia('banners')[0]->getUrl('bannerWebp') }}" type="image/webp">
                            <img src="{{ $service->getMedia('banners')[0]->getUrl('banner') }}" alt="Фоновое изображение" class="banner__background"/></picture>
                    @endisset
                    <img src="{{ asset('img/logo.svg') }}" alt="Логотип" class="banner__logo"/>
                </div>
            </div>
        </section>
        @include('layout.map')
    </main>
@endsection
