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
          {{ $article->created_at->diffForHumans() }},
          Category: <b>{{ $article->category->name }}</b>
        </div>
        <p class="card-text">{{ $article->body }}</p>
        <a class="btn btn-danger"
          onclick="return confirm(Confirm)"
          href="{{ url('/articles/delete/' .$article->id) }}">
          Delete
        </a>
      </div>
    </div>

    <div style="margin: 20px;">
      <ul class="list-group">
        <li class="list-group-item active">
          <b>Comments ({{ count($article->comments) }})</b>
        </li>

        @foreach($article->comments as $comment)
        <li class="list-group-item">
          <a href="{{ url('/comments/delete/$comment->id') }}" class="btn-close float-end"></a>
          {{ $comment->content }}
          <div class="small mt-2">
            By <b> {{ $comment->user->name }} </b>,
            {{ $comment->created_at->diffForHumans() }}
          </div>
        </li><br>
        @endforeach
      </ul>

      @auth
      <form action="{{ url('/comments/add') }}" method="post">
        @csrf
        <input type="hidden" name="article_id"
        value="{{ $article->id }}">

        <!-- <textarea name="content" class="from-control mb-2" placeholder="New Comment"></textarea> -->
        <label>Comment </label>
        <input type="text" name="content" class="form-control"><br>

        <input type="submit" value="Add Comment" class="btn btn-secondary"> <br>
      </form>
      @endauth
  </div>

</body>

</html>