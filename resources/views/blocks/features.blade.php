<section class="features">
    <div class="features__container">
        <div class="features__body">
            @foreach($homeData['features'] as $feature)
                <div class="features__item feature">
                    <div class="feature__icon">
                        <img src="{{ url('storage/' . $feature['icon']) }}" alt="Иконка">
                    </div>
                    <h3 class="feature__title">{{ $feature['title'] }}</h3>
                    <p class="feature__text">
                        {{ $feature['description'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
