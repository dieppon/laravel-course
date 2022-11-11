@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @isset($filter)
                    <div class="card-header">
                        {{ __('Filtered hobbies by') }}
                        <span style="font-size: 130%;" class="badge bg-{{ $filter->style }} ms-1">{{ $filter->name }}</span>
                        <span class="float-end"><a href="/hobby">{{ __('Show all hobbies') }}</a></span>
                    </div>
                    @else
                        <div class="card-header">{{ __('All the hobbies') }}</div>
                    @endisset
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($hobbies as $hobby)
                                <li class="list-group-item">
                                    <a title="{{ __('Show details') }}" href="/hobby/{{ $hobby->id }}">{{ $hobby->name }}</a>
                                    @auth
                                    <a class="btn btn-sm btm-light ms-2" href="/hobby/{{ $hobby->id }}/edit"><i class="fas fa-edit"></i> {{ __('Edit hobby') }}</a>
                                    @endauth
                                    {{-- Let's improve this with proper translation and singular/plurals --}}
                                    <span class="mx-2">{!! __('Posted by <a href=":link">:author</a>', [ 'link' => '/user/' . $hobby->user->id, 'author' => $hobby->user->name, 'num' => $hobby->user->hobbies->count() ]) !!} ({{$hobby->user->hobbies->count() }} {{ trans_choice('hobby|hobbies', $hobby->user->hobbies->count()) }})</span>
                                    @auth
                                    <form class="float-end" style="display: inline;" action="/hobby/{{ $hobby->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-sm btn-outline-danger" type="submit" value="{{ __('Delete') }}">
                                    </form>
                                    @endauth
                                    {{-- difffForHumans() comes from carbon PHP library: https://carbon.nesbot.com/docs/ --}}
                                    <span class="float-end mx-2">{{ $hobby->created_at->diffForHumans() }}</span>
                                    <br/>
                                    @foreach($hobby->tags as $tag)
                                        <a href="/hobby/tag/{{ $tag->id }}"><span class="badge bg-{{ $tag->style }} me-1">{{ $tag->name }}</span></a>
                                    @endforeach
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="mt-3">
                    {{-- This is a bit different that the course: https://www.itsolutionstuff.com/post/laravel-9-pagination-example-tutorialexample.html --}}
                    {{ $hobbies->withQueryString()->links('pagination::bootstrap-5') }}
                </div>
                @auth
                <div class="mt-2">
                    <a class="btn btn-success btn-sm" href="/hobby/create"><i class="fas fa-plus-circle"></i> {{ __('Create new hobby') }}</a>
                </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
