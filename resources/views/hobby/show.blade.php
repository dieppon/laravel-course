@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Hobby details') }}</div>

                    <div class="card-body">
                        <h2>{{ $hobby->name }}</h2>
                        <p>{{ $hobby->description }}</p>
                    </div>
                </div>
                <div class="mt-2">
                    <a class="btn btn-primary btn-sm" href="{{ URL::previous() }}"><i class="fas fa-arrow-circle-up"></i> {{ __('Back to overview') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
