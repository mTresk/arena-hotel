<div class="map-block">
    <div class="map-block__container">
        <div id="map" class="map-block__map map">
            <picture>
                <source srcset="{{ asset('/img/map.webp') }} 1x, {{ asset('/img/map@2.webp') }} 2x" type="image/webp">
                <img src="{{ asset('/img/map.jpg') }}"
                     srcset="{{ asset('/img/map.jpg') }} 1x, {{ asset('/img/map@2.jpg') }} 2x"
                     alt="Фоновое изображение" class="map__background"/>
            </picture>
        </div>
    </div>
</div>
<script id="ymap_lazy" data-src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=b1bae07c-a343-4699-89f6-bcca848765f3&_v=20220614214118"></script>
