@extends('layouts.visitor')

@section('content')
<div x-data="{ selectedBook: null, modalOpen: false }">
    @include('visitor.components.hero')
    @include('visitor.components.stats')
    @include('visitor.components.categories')
    @include('visitor.components.book-list')
    @include('visitor.components.testimonials')
    @include('visitor.components.book-modal')
</div>
@endsection
