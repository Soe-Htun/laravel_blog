<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Add</title>
</head>
<body>

  <div class="card" style="margin: 20px;">
    <div class="card-header">
      Create New Data
    </div>
    <div class="card-body">

      @if($errors->any())
        <div class="alert alert-warning">
          <ol>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ol>
        </div>
      @endif

      <form action="" method="post">
        @csrf
        <!-- <label> Title </label><br>
        <input type="text" id="title" name="title" class="form-control"> <br>

        <label> Body </label><br>
        <input type="text" id="body" name="body" class="form-control"> <br> -->

        <div class="mb-3">
          <label for="">Title</label>
          <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
          <label for="">Body</label>
          <textarea name="body" class="form-control"></textarea>
        </div>
        <div class="mb-3">
          <label for="">Category</label>
          <select name="category_id" class="form-select">
            @foreach($categories as $category)
              <option value="{{ $category['id'] }}">
                {{ $category['name'] }}
              </option>
            @endforeach
          </select>
        </div>

        <input type="submit" value="Add Article" class="btn btn-primary">
      </form>
    </div>
  </div>
</body>
</html>