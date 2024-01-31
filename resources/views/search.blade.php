<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Results</title>
</head>

<body>
    <h2>Search Results for "{{ $search_text }}"</h2>

    @if($recettes && count($recettes) > 0)
        <ul>
            @foreach($recettes as $r)
                <div class="card">
                    <img src="{{ asset('storage/'.$r->img) }}" class="card-img-top" alt="Recipe Image"
                        style="height: 200px; width: 300px;">
                    <div class="card-body">
                        <h5 class="card-title">{{$r->titre}}</h5>

                        <div class="mt-3">
                            <a href="{{url('updtForm/'.$r->idr)}}" class="btn btn-primary mr-2">Edit</a>
                            <a href="{{route('delete', ['id' => $r->idr])}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    @else
        <p>No results found.</p>
    @endif

</body>

</html>
