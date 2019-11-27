@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="form-group">
            {{ $nabeIntroduce->url }}
        </div>
    </div>

    <div class="row mb-4">
        <div class="form-group">
            {{ $nabeIntroduce->name }}
        </div>
    </div>
</div>
@endsection