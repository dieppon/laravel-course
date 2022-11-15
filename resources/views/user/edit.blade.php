@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Edit User') }}</div>
                    <div class="card-body">
                        <form autocomplete="off" action="/user/{{ $user->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label class="form-label{{ $errors->has('name') ? ' text-danger' : '' }}" for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' border-danger' : '' }}" id="name" name="name" value="{{ old('name') ?? $user->name }}">
                                <small class="form-text{{ $errors->has('name') ? ' text-danger' : '' }}">{!! $errors->first('name') !!}</small>
                            </div>
                            @if( file_exists('img/users/' . $user->id . '_large.jpg') )
                                <div class="mb-3">
                                    <img style="max-width: 400px; max-height: 300px" src="/img/users/{{ $user->id }}_large.jpg" alt="{{ __('Hobby large image') }}">
                                    <a class="btn btn-sm btn-outline-danger float-end" href="/delete-images/user/{{ $user->id }}">{{ __('Delete image') }}</a>
                                </div>
                            @else
                            <div class="form-group mb-3">
                                <label class="form-label{{ $errors->has('image') ? ' text-danger' : '' }}" for="image">{{ __('Image') }}</label>
                                <input type="file" class="form-control{{ $errors->has('image') ? ' border-danger' : '' }}" id="image" name="image" value="">
                                <small class="form-text{{ $errors->has('image') ? ' text-danger' : '' }}">{!! $errors->first('image') !!}</small>
                            </div>
                            @endif
                            <div class="form-group mb-3">
                                <label class="form-label{{ $errors->has('motto') ? ' text-danger' : '' }}" for="motto">{{ __('Motto') }}</label>
                                <input type="text" class="form-control{{ $errors->has('motto') ? ' border-danger' : '' }}" id="motto" name="motto" value="{{ old('motto') ?? $user->motto }}">
                                <small class="form-text{{ $errors->has('motto') ? ' text-danger' : '' }}">{!! $errors->first('motto') !!}</small>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label{{ $errors->has('about_me') ? ' text-danger' : '' }}" for="about_me">{{ __('About me') }}</label>
                                <textarea class="form-control{{ $errors->has('about_me') ? ' border-danger' : '' }}" id="about_me" name="about_me" rows="5" value="{{ old('about_me') ?? $user->about_me }}"></textarea>
                                <small class="form-text{{ $errors->has('about_me') ? ' text-danger' : '' }}">{!! $errors->first('about_me') !!}</small>
                            </div>
                            <input class="btn btn-primary" type="submit" value="{{ __('Update User') }}">
                        </form>
                        <a class="btn btn-primary float-end" href="/user"><i class="fas fa-arrow-circle-up"></i> {{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
