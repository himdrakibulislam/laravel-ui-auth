@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Passsword') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(session()->has('success'))
                    <strong class="text-success">{{session()->get('success')}}</strong>
                    @endif
                    @if(session()->has('error'))
                    <strong class="text-danger">{{session()->get('error')}}</strong>
                    @endif
                    <form action="{{route('password.change')}}" method="POST">
                    @csrf
                    <input type="password" class="form-control" name="current_password" placeholder="Current Password" id="">
                    <br>
                    @error('current_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <input type="password" class="form-control" name="new_password" placeholder="New Password" id="">
                    <br>
                    @error('new_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" id="">
                    <br>
                    @error('confirm_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    
                    <button class="btn btn-primary">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
