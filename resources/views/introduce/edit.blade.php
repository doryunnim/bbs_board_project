@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h3>ê¸€ ìˆ˜ì •</h3>
    </div>

    <form action="{{route('introduces.update', $introduce->id)}}" method="POST">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        @include('qnaArticles.partial.form')
    </form>
</div>
@stop