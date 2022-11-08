@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Create New Hobby') }}</div>
                    <div class="card-body">
                        <form action="/hobby" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label" for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="description">{{ __('Description') }}</label>
                                <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                            </div>
                            <input class="btn btn-primary" type="submit" value="{{ __('Save Hobby') }}">
                        </form>
                        <a class="btn btn-primary float-end" href="/hobby"><i class="fas fa-arrow-circle-up"></i> {{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
