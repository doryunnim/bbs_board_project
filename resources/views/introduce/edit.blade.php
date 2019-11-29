@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('introduces.update', $introduce->id)}}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        @include('introduce.partial.form')
    </form>
</div>
@stop
