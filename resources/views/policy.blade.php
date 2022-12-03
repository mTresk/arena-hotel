@extends('layout.app')

@section('content')
    <main class="page">
        <section class="policy">
            <div class="policy__container">
                <div class="policy__body">
                    <div class="policy__content content">
                        {!! $content->content !!}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
