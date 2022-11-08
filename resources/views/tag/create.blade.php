@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Create New Tag') }}</div>
                    <div class="card-body">
                        <form action="/tag" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label{{ $errors->has('name') ? ' text-danger' : '' }}" for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' border-danger' : '' }}" id="name" name="name" value="{{ old('name') }}">
                                <small class="form-text{{ $errors->has('name') ? ' text-danger' : '' }}">{!! $errors->first('name') !!}</small>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label{{ $errors->has('style') ? ' text-danger' : '' }}" for="style">{{ __('Style') }}</label>
                                <input type="text" class="form-control{{ $errors->has('style') ? ' border-danger' : '' }}" id="style" name="style" value="{{ old('style') }}">
                                <small class="form-text{{ $errors->has('style') ? ' text-danger' : '' }}">{!! $errors->first('style') !!}</small>
                            </div>
                            <input class="btn btn-primary" type="submit" value="{{ __('Save Tag') }}">
                        </form>
                        <a class="btn btn-primary float-end" href="/tag"><i class="fas fa-arrow-circle-up"></i> {{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
