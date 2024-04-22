
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
    <div class="mt-8 p-4 bg-white rounded-lg shadow-md">
        <form action="{{ route('welcome.pages') }}" method="GET" id="categoryFilter">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Filtrer par catégorie</h2>

                <div class="flex flex-row flex-wrap">
                    @foreach($categories as $category)
                        <div class="flex-none mb-2 mr-4">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}" id="category{{ $category->id }}" class="mr-2">
                            <label for="category{{ $category->id }}" class="text-gray-700">{{ $category->title }}</label>
                        </div>
                    @endforeach
                </div>
        
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mt-4">Filtrer</button>
        </form>
    </div>
    
    
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
                  
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @endforeach
    </div>
  </div>




@include('layouts.front.footer')

<div class="flex justify-between mt-6 px-4">
<a href="legals" class="text-blue-500">Mentions légales</a>
<a href="about" class="text-blue-500">À Propos</a>
</div>
</body>
</html>