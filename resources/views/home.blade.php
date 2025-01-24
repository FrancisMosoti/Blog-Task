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
    </div>
</div>
@endsection
