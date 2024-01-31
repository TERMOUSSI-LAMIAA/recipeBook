
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recette Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <img src="{{ asset('storage/'.$recette->img) }}" class="card-img-top" alt="recette Image"
                style="height: 200px; width: 300px;">
            <div class="card-body">
                <h5 class="card-title">{{ $recette->titre }}</h5>

                <p>Description: {{ $recette->description }}</p>
                <p>Ingredients: {{ $recette->ingredients }}</p>
                <p>Instructions: {{ $recette->instructions }}</p>

                <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
