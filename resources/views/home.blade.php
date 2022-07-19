@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <a href="{{route('user.details',Crypt::encryptString('4'))}}" class="btn btn-primary">Sky Details</a>
                    <br>
                    <br>
                    <form method="POST" action="{{route('user.password')}}">
                        @csrf
                        <input type="password" class="form-control" name="password" id="">
                    
                        <br>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
