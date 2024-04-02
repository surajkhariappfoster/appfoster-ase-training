<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Project Details</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid d-flex justify-content-center">
      <a class="navbar-brand" href="{{ route('users.index') }}">Project Details</a>
    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-8 mt-4">
        <div class="card p-4">
          @foreach($projects as $project)
          <p> Project ID : <b>{{$project->id}}</b></p>
          <p> User ID : <b>{{$project->user_id}}</b></p>
          <p> Project Name : <b>{{$project->project_name}}</b></p>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>