@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <h2>{{ __('Hello :name', ['name' => auth()->user()->name ]) }}</h2>
                            <h5>{{ __('Your Motto') }}</h5>
                            <p>{{ auth()->user()->motto ?? '' }}</p>
                            <h5>{{ __('Your "About Me" -Text') }}</h5>
                            <p>{{ auth()->user()->about_me ?? '' }}</p>
                        </div>
                        <div class="col-md-3">
                            <img class="img-thumbnail" src="/img/300x400.jpg" alt="{{ auth()->user()->name }}">
                        </div>
                    </div>

                    <ul class="list-group">
                        @isset($hobbies)
                            @if($hobbies->count() > 0)
                                <h4>Your Hobbies:</h4>
                            @endif
                            @foreach($hobbies as $hobby)
                                <li class="list-group-item">
                                    <a title="{{ __('Show details') }}" href="/hobby/{{ $hobby->id }}">
                                        <img src="/img/thumb_landscape.jpg" alt="thumb">
                                        {{ $hobby->name }}
                                    </a>
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
                        @endisset
                    </ul>


                    <a class="btn btn-success btn-sm mt-3" href="/hobby/create"><i class="fas fa-plus-circle"></i> {{ __('Create new Hobby') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
