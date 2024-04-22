<x-app-layout>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Posts</title>
    <style>
      .custom-card {
        width: 600px; 
        height: 500px;
        overflow: hidden;
        margin-bottom: 3rem;
        box-shadow: 10px;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
      <div class="container-fluid">
        <a class="navbar-brand h1" href="{{ route('posts.index') }}">Tous les posts</a>
        <div class="justify-end">
          <div class="col">
            <a class="btn btn-sm btn-success" href="{{ route('posts.create') }}">Add Post</a>
          </div>
        </div>
      </div>
    </nav>
  
    <div class="container mt-5 justify-content-center">
      <div class="row">
        @foreach ($posts->chunk(2) as $chunk) 
          <div class="row">
            @foreach ($chunk as $post)
              <div class="col-sm">
                <div class="card custom-card"> 
                  <div class="card-header">
                    <h5 class="card-title">{{ $post->title }}</h5>
                  </div>
                  <div class="card-body d-flex">
                    @if($post->image)
                      <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" style="width: 200px; height: 200px;">
                    @endif
                    <div class="card-body" style="max-height: 200px;>
                      <p class="card-text">{{ $post->content }}</p>
                      <p class="card-text">{{ $post->description }}</p>
                    </div>
                  </div>
                  @foreach($post->categories as $category)
                    <div class="card-body">
                      <p class="card-text">Category : {{ $category->title }}</p>
                    </div>
                  @endforeach
                  <div class="card-body">
                    <p> Auteur : {{ $post->author->name }}</p>
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-sm">
                        <a href="{{ route('posts.show', $post->title) }}" class="btn btn-info btn-sm">Show</a>
                      </div>
                      <div class="col-sm">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                      </div>
                      <div class="col-sm">
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endforeach
      </div>
    </div>
  </body>
  </html>
  </x-app-layout>
  