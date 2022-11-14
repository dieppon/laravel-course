@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Edit Hobby') }}</div>
                    <div class="card-body">
                        <form autocomplete="off" action="/hobby/{{ $hobby->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label class="form-label{{ $errors->has('name') ? ' text-danger' : '' }}" for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' border-danger' : '' }}" id="name" name="name" value="{{ old('name') ?? $hobby->name }}">
                                <small class="form-text{{ $errors->has('name') ? ' text-danger' : '' }}">{!! $errors->first('name') !!}</small>
                            </div>
                            <div class="mb-3">
                                @if( file_exists('img/hobbies/' . $hobby->id . '_large.jpg') )
                                    <img style="max-width: 400px; max-height: 300px" src="/img/hobbies/{{ $hobby->id }}_large.jpg" alt="{{ __('Hobby large image') }}">
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label{{ $errors->has('image') ? ' text-danger' : '' }}" for="image">{{ __('Image') }}</label>
                                <input type="file" class="form-control{{ $errors->has('image') ? ' border-danger' : '' }}" id="image" name="image" value="">
                                <small class="form-text{{ $errors->has('image') ? ' text-danger' : '' }}">{!! $errors->first('image') !!}</small>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label{{ $errors->has('description') ? ' text-danger' : '' }}" for="description">{{ __('Description') }}</label>
                                <textarea class="form-control{{ $errors->has('description') ? ' border-danger' : '' }}" id="description" name="description" rows="5" value="{{ old('description') ?? $hobby->description }}"></textarea>
                                <small class="form-text{{ $errors->has('description') ? ' text-danger' : '' }}">{!! $errors->first('description') !!}</small>
                            </div>
                            <input class="btn btn-primary" type="submit" value="{{ __('Update Hobby') }}">
                        </form>
                        <a class="btn btn-primary float-end" href="/hobby"><i class="fas fa-arrow-circle-up"></i> {{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
