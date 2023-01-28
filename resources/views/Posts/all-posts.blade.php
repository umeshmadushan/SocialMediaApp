@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            <div class="row mb-2">

        @foreach ($posts as $post)

        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col  p-4 d-flex flex-column position-static">
                <img src="{{asset('thumbnails/' . $post->thumbnail)}}" class="img-thumbnail w-100 p-10" alt="Thumbnail">
                <h3 class="mb-0">{{$post->title}}</h3>
                <div class="mb-1 text-muted">{{Date('Y-m-d',strtotime($post->created_at))}}</div>
                <p class="card-text mb-auto">{{$post->description}}</p>
                <div>

                    <a href="{{ route('posts.toggleLike', $post->id) }}">
                        @if (! auth()->user()->hasLiked($post))
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 30px; cursor: pointer">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width: 30px; cursor: pointer">
                            <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                        </svg>

                        @endif
                    </a>
                    <div>{{ $post->likers()->count() }} likes</div>

                </div>
              </div>
              <div class="col-auto d-none d-lg-block">
                {{-- {{< placeholder width="200" height="250" background="#55595c" color="#eceeef" text="Thumbnail" >}} --}}
              </div>
            </div>
        </div>

        @endforeach



    </div>

        </div>
    </div>
</div>


@endsection



