@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('posts.update',$post->id)}}">
                        @csrf
                        <div class="mb-3">
                          <label>Post Title</label>
                          <input type="text" name="title" class="form-control" placeholder="Enter Post Title" value="{{$post->title}}" >
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Description</label>
                          <textarea class="form-control" name="description" placeholder="Enter Podt Description..." rows="7" >{{$post->description}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
