@extends('layout.app')

@section('title', $post->title)

@section('description', $post->excerpt)

@isset($post->image)
    @section('image', $post->image['news'])
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
                    @include('blocks.widget-horizontal')
                </div>
            </div>
        </div>
        <section class="news">
            <div class="news__body">
                <h1 class="news__title">{{ $post->title }}</h1>
                @isset($post->image)
                    <div class="news__image news__image--ibg">
                        <picture>
                            <source srcset="{{ $post->image['newsWebp'] }} 1x, {{ $post->image['newsBigWebp'] }} 2x"
                                    type="image/webp">
                            <img
                                src="{{ $post->image['news'] }}"
                                srcset="{{ $post->image['news'] }} 1x, {{ $post->image['newsBig'] }} 2x"
                                alt="{{ $post->title }}"/>
                        </picture>
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
