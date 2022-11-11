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
                        @if($hobby->tags->count() > 0)
                            <p>Use tags: (Click to remove)</p>
                            <p>
                                @foreach($hobby->tags as $tag)
                                    <a href="/hobby/{{ $hobby->id }}/tag/{{ $tag->id }}/detach"><span class="badge bg-{{ $tag->style }} me-1">{{ $tag->name }}</span></a>
                                @endforeach
                            </p>
                        @endif
                        @if($availableTags->count() > 0)
                            <p>Available tags: (Click to add)</p>
                            <p>
                                @foreach($availableTags as $tag)
                                    <a href="/hobby/{{ $hobby->id }}/tag/{{ $tag->id }}/attach"><span class="badge bg-{{ $tag->style }} me-1">{{ $tag->name }}</span></a>
                                @endforeach
                            </p>
                        @endif
                    </div>
                </div>
                <!--
                <div class="mt-2">
                    <a class="btn btn-primary btn-sm" href="{{ URL::previous() }}"><i class="fas fa-arrow-circle-up"></i> {{ __('Back to overview') }}</a>
                </div>
                -->
            </div>
        </div>
    </div>
@endsection
