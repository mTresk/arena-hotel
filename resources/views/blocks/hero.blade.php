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
            <div class="hero__panel panel" id="panel"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    (function (k, o, t, e, l) {
        l = document.createElement("script");
        l.type = "text/javascript";
        l.src = "https://bookonline24.ru/widget.js";
        l.async = !0;
        l.onload = l.onreadystatechange = function () {
            e = this.readyState;
            !o && (!e || e === "complete") && (o = 1) && k();
        };
        t = document.getElementsByTagName("script")[0];
        t.parentNode.insertBefore(l, t);
    })(function () {
        HotelWidget.init({
            // ID организации; ID html элемента нужно проставить ниже в поле container
            id: "7d3c3ad8-43ce-4c3c-88d4-4127592fd516",
            type: "horizontalBlock",
            form: {
                // Замените на ID html элемента, в который нужно вставить виджет
                container: "panel",
            }
        }, "https://bookonline24.ru/");
    });
</script>
