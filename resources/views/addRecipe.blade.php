<!-- resources/views/addRecipe.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recipe</title>
    <!-- Add your CSS styles or include Bootstrap if needed -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Add Recipe</h2>
    <form action="{{ route('addRecipe') }}" method="post" enctype="multipart/form-data">
      

        <div class="form-group">
            <label for="titre">Title:</label>
            <input type="text" name="titre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="ingredients">Ingredients:</label>
            <textarea name="ingredients" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="instructions">Instructions:</label>
            <textarea name="instructions" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control-file" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Add Recipe</button>
    </form>
</div>

<!-- Add your scripts or include Bootstrap if needed -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
