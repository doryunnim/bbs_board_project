@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<<<<<<< HEAD

=======
>>>>>>> 5e84c602b91eef59df37bda2a935108b4d583f55
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
