@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a Post') }}</div>

                <form action="{{route('create.post')}}" method="POST" class="card-body">
                    @csrf
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Post Title</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" >
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Post Body</label>
                        <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                      <div>
                        <button type="submit" class="btn btn-primary">Send Post</button>
                      </div>
                </form>
            </div>
        </div>
        <div class="flex mx-4">
            <div><a href="/posts" class="btn btn-secondary">View Posts</a></div>
        <!-- Button trigger modal -->
            <div class="mt-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Comment
                </button>
            </div>
        </div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form method="POST" action="{{route('add.comment')}}" class="modal-content">
        @csrf
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Comment on a post</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Post Id</label>
                <select class="form-select" name="post_id" aria-label="Default select example">
                    <option selected>Select the post id</option>
                    @foreach($posts as $post)
                        <option value="{{ $post->id }}">{{ $post->id }}</option>
                    @endforeach
                 
                  </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControl" class="form-label">Comment</label>
                <input type="text" name="content" class="form-control" id="exampleFormControl" >
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
    </div>
</div>
@endsection
