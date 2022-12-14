@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Create New Hobby') }}</div>
                    <div class="card-body">
                        <form autocomplete="off" action="/hobby" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label{{ $errors->has('name') ? ' text-danger' : '' }}" for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' border-danger' : '' }}" id="name" name="name" value="{{ old('name') }}">
                                <small class="form-text{{ $errors->has('name') ? ' text-danger' : '' }}">{!! $errors->first('name') !!}</small>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label{{ $errors->has('image') ? ' text-danger' : '' }}" for="image">{{ __('Image') }}</label>
                                <input type="file" class="form-control{{ $errors->has('image') ? ' border-danger' : '' }}" id="image" name="image" value="">
                                <small class="form-text{{ $errors->has('image') ? ' text-danger' : '' }}">{!! $errors->first('image') !!}</small>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label{{ $errors->has('description') ? ' text-danger' : '' }}" for="description">{{ __('Description') }}</label>
                                <textarea class="form-control{{ $errors->has('description') ? ' border-danger' : '' }}" id="description" name="description" rows="5" value="{{ old('description') }}"></textarea>
                                <small class="form-text{{ $errors->has('description') ? ' text-danger' : '' }}">{!! $errors->first('description') !!}</small>
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
