@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div style="font-size: 150%;" class="card-header">{{ $user->name }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <p><b>{{ __( 'My Motto') }}:</b><br/>{{ $user->motto }}</p>
                                <p class="mt-2"><b>{{ __( 'About me') }}:</b><br/>{{ $user->about_me }}</p>
                                <p><b>{{ __( 'Hobbies of :name', ['name' => $user->name ]) }}:</b></p>
                                @if($user->hobbies->count() > 0)
                                    <ul class="list-group">
                                        @foreach($user->hobbies as $hobby)
                                            <li class="list-group-item">
                                                @if( file_exists('img/hobbies/' . $hobby->id . '_thumb.jpg') )
                                                    <a title="{{ __('Show details') }}" href="/hobby/{{ $hobby->id }}">
                                                        <img src="/img/hobbies/{{ $hobby->id }}_thumb.jpg" alt="{{ __('Hobby thumb') }}">
                                                    </a>
                                                    &nbsp;
                                                @endif
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
                                @else
                                    <p>
                                        {{ __(':name has not created any hobbies yet', ['name' => $user->name ]) }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <img class="img-thumbnail" src="/img/300x400.jpg" alt="{{ $user->name }}">
                            </div>

                        </div>

                    </div>
                </div>
                <div class="mt-4">
                    <a class="btn btn-primary btn-sm" href="{{ URL::previous() }}"><i class="fas fa-arrow-circle-up"></i> {{ __('Back to overview') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
