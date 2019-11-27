@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-4 offset-md-4">
            <form action="{{ route('introduces.update', $introduce->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <br><br><br><br>
                    <button type="submit" class="btn btn-primary">수정</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection