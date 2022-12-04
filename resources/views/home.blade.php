@extends('layout.app')

@if($homeData['seo_title'])
    @section('title', $homeData['seo_title'])
@else
    @section('title', $homeData['site_name'])
@endif

@isset($homeData['seo_description'])
    @section('description', $homeData['seo_description'])
@endisset


@isset($homeData->getMedia('seo')[0])
    @section('image', $homeData->getMedia('seo')[0]->getUrl('ogImage'))
@endisset

@section('content')
    <main class="page">
        @include('blocks.hero')

        @include('blocks.advantages')

        @include('blocks.sliders')

        @include('blocks.features')

        @include('blocks.news')

        @include('layout.map')

    </main>
@endsection
