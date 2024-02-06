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

    @if ($recettes && count($recettes) > 0)
        <div class="row">
            @foreach ($recettes as $r)
                <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                    <div class="card" onclick="window.location='{{ route('details', ['id' => $r->idr]) }}';"
                        style="cursor: pointer;">
                        <div class="card-img">
                            <img src="{{ asset('storage/' . $r->img) }}" class="card-img-top" alt="Recipe Image"
                                style="height: 400px; width: 500px;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $r->titre }}</h5>
                            <p class="card-text">{{ $r->description }}</p>
                            <p class="card-text">Par: {{ $r->user->email }}</p>
                            <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i>Voir
                                    plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No results found.</p>
    @endif

</body>

</html>
