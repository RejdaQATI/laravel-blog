<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Posts</title>
</head>
<body>
<x-app-layout>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
          <a class="navbar-brand h1" href={{ route('users.index') }}>USERS</a>
          <div class="justify-end ">
            
          </div>
        </div>
      </nav>
      <div class="container mt-5">
        <div class="row">
          @foreach ($user as $users)
            <div class="col-sm">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">{{ $users->name }}</h5>
                </div>
                <div class="card-body">
                  <p class="card-text">{{ $users->email }}</p>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $users->role }}</p>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm">
                      <a href="{{ route('users.edit', $users->id) }}"
    
                class="btn btn-primary btn-sm">Edit</a>
                    </div>
                    <div class="col-sm">
                        <form action="{{ route('users.destroy', $users->id) }}" method="post">
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
      </div>
 
    
</x-app-layout>
