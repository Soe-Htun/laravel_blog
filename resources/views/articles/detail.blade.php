<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Detail</title>
</head>

<body>
  <div class="card mb-2" style="margin: 20px ;">
    <div class="card-body">
      <h5 class="card-title">{{ $article->title }}</h5>
      <div class="card-subtitle mb-2 text-muted small">
        {{ $article->created_at->diffForHumans() }}
      </div>
      <p class="card-text">{{ $article->body }}</p>
      <a class="btn btn-danger"
        onclick="return confirm(Confirm)"
        href="{{ url('/articles/delete/' .$article->id) }}">
        Delete
      </a>
    </div>
  </div>

</body>

</html>