@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('All the tags') }}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($tags as $tag)
                                <li class="list-group-item">
                                    <span style="font-size: 130%;" class="ms-2 badge bg-{{ $tag->style }}">{{ $tag->name }}</span>
                                    @can('update', $tag)
                                        <a class="btn btn-sm btn-outline-primary ms-2" href="/tag/{{ $tag->id }}/edit"><i class="fas fa-edit"></i> {{ __('Edit tag') }}</a>
                                    @endcan
                                    @can('delete', $tag)
                                        <form style="display: inline;" action="/tag/{{ $tag->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-sm btn-outline-danger" type="submit" value="{{ __('Delete') }}">
                                        </form>
                                    @endcan
                                    <a class="float-end" href="/hobby/tag/{{ $tag->id }}"></i> {{ __('Used :num times', ['num' => $tag->hobbies->count() ]) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @can('create', $tag)
                    <div class="mt-2">
                        <a class="btn btn-success btn-sm" href="/tag/create"><i class="fas fa-plus-circle"></i> {{ __('Create new tag') }}</a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
@endsection
