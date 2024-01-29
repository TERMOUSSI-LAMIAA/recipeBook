<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe-Book-Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <a href="{{ url('/addRecipeForm') }}" class="btn btn-success">add</a>
        @foreach($recettes as $r)
        <div class="card">
            <img src="{{ asset('imgs/'.$r->img) }}" class="card-img-top" alt="Recipe Image" style="height: 200px; width: 300px;" >
            <div class="card-body">
                <h5 class="card-title">{{$r->titre}}</h5>

                <div class="mt-3">
                    <a href="#" class="btn btn-primary mr-2">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
  

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>