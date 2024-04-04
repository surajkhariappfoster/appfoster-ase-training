<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">User Details</a>
    
  </div>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 mt-4">
            <div class="card p-4">
                <p> ID : <b><?php echo e($users->id); ?></b></p>
                <p> Name : <b><?php echo e($users->name); ?></b></p>
                <p> Email : <b><?php echo e($users->email); ?></b></p>
                <p> Gender : <b><?php echo e($users->gender); ?></b></p>
                <p> Status : <b><?php echo e($users->status); ?></b></p>

            </div>
         </div>
       </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html><?php /**PATH D:\LaravelCRUD\laravelCRUD\resources\views/users/show.blade.php ENDPATH**/ ?>