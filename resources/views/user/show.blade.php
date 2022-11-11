@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $user->name }}</div>

                    <div class="card-body">
                        <p><b>My Motto:</b><br/>{{ $user->motto }}</p>
                        <p class="mt-2"><b>About me:</b><br/>{{ $user->about_me }}</p>
                    </div>
                </div>
                <div class="mt-2">
                    <a class="btn btn-primary btn-sm" href="{{ URL::previous() }}"><i class="fas fa-arrow-circle-up"></i> {{ __('Back to overview') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
