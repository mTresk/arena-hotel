<section class="news-block">
    <div class="news-block__container">
        <h2 class="news-block__title">#Новости</h2>
        <div class="news-block__body">
            @foreach($news as $item)
                <div class="news-block__item news-item">
                    <a href="{{ route('post.show', $item->slug) }}" class="news-item__image news-item__image--ibg">
                        @isset($item->thumb)
                            <picture>
                                <source srcset="{{ $item->thumb['newsThumbWebp'] }} 1x, {{ $item->thumb['newsThumbBigWebp'] }} 2x"
                                        type="image/webp">
                                <img
                                    src="{{ $item->thumb['newsThumb'] }}"
                                    srcset="{{ $item->thumb['newsThumb'] }} 1x, {{ $item->thumb['newsThumbBig'] }} 2x"
                                    alt="{{ $item->title }}"/>
                            </picture>
                        @endisset
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
