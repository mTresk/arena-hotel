<div data-prlx-parent class="hero">
    <picture>
        <source srcset="{{ $homeData->getMedia('hero_image')[0]->getUrl('heroImageMobileWebp') }}" media="(max-width: 560px)" type="image/webp">
        <source srcset="{{ $homeData->getMedia('hero_image')[0]->getUrl('heroImageMobile') }}" media="(max-width: 560px)">
        <source srcset="{{ $homeData->getMedia('hero_image')[0]->getUrl('heroImageWebp') }} 1x, {{ $homeData->getMedia('hero_image')[0]->getUrl('heroImageWebp@2') }} 2x"
                type="image/webp">
        <img data-prlx data-direction="0" src="{{ $homeData->getMedia('hero_image')[0]->getUrl('heroImage') }}"
             srcset="{{ $homeData->getMedia('hero_image')[0]->getUrl('heroImage') }} 1x, {{ $homeData->getMedia('hero_image')[0]->getUrl('heroImage@2') }} 2x"
             alt="Фоновое изображение" class="hero__background"/></picture>
    <div class="hero__container">
        <div class="hero__body">
            @include('blocks.widget-horizontal')
        </div>
    </div>
</div>
