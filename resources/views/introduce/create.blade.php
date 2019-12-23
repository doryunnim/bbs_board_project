@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<div class="container">
    
    <div class="row mb-4">
        <div class="col-md-4 offset-md-4">
            <form action="{{ route('introduces.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" name="image" class="form-control-file"><br><br>
                    <input type="text" name="name" placeholder="name"><br><br>
                    <input type="text" name="comment" placeholder="comment"><br><br>
                    <input type="submit" class="btn btn-primary btn-block">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection