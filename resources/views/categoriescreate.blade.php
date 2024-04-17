<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>
    <h1>Add a new category</h1>
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <div class="form-group">
                <label for="title">Créer une categorie</label>
                <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Create Category</button>
                </form>
            </div>
        </div>
    </div>
</body>