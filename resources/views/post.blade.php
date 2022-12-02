@extends('layout.app')

@section('title', $post->title)

@section('description', $post->excerpt)

@isset($post->getMedia('news')[0])
    @section('image', $post->getMedia('news')[0]->getUrl('news'))
@endisset

@section('content')
    <main class="page">
        <section data-prlx-parent class="page-header">
            <picture>
                <source srcset="{{ asset('img/news-header.webp') }}" type="image/webp">
                <img data-prlx data-direction="0" src="{{ asset('img/news-header.jpg') }}" alt="Фоновое изображение" class="page-header__background"/></picture>
            <div class="page-header__container">
                <div class="page-header__body">
                    <h2 class="page-header__title">Новости</h2>
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
        <section class="news">
            <div class="news__body">
                <h1 class="news__title">{{ $post->title }}</h1>
                @isset($post->getMedia('news')[0])
                    <div class="news__image news__image--ibg">
                        <picture>
                            <source srcset="{{ $post->getMedia('news')[0]->getUrl('newsWebp') }}" type="image/webp">
                            <img src="{{ $post->getMedia('news')[0]->getUrl('news') }}" alt="{{ $post->title }}"/></picture>
                    </div>
                @endisset
                <div class="news__content content">
                    {!! $post->content !!}
                </div>
            </div>
        </section>
        @include('layout.map')
    </main>
@endsection
