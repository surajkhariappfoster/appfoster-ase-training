<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Users</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid d-flex justify-content-center">
    <a class="navbar-brand" href="<?php echo e(route('users.index')); ?>">Edit Users</a>
  </div>
</nav>

<?php if($message = Session::get('success')): ?>
    <div class="alert alert-success alert-block">
        <strong><?php echo e($message); ?></strong>
    </div>
<?php endif; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card mt-3 p-3">
                
    <form method="POST" action="<?php echo e(isset($users) ? route('users.update', ['id' => $users->id]) : '#'); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="form-group">
        <label>ID</label>
        <input type="number" name="id" class="form-control" value="<?php echo e(isset($users) ? $users->id : old('id')); ?>"/>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo e(isset($users) ? $users->name : old('name')); ?>"/>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?php echo e(isset($users) ? $users->email : old('email')); ?>"/>
    </div>
    <div class="form-group">
        <label>Gender</label>
        <input type="text" name="gender" class="form-control" value="<?php echo e(isset($users) ? $users->gender : old('gender')); ?>"/>
    </div>
    <div class="form-group">
        <label>Status</label>
        <input type="text" name="status" class="form-control" value="<?php echo e(isset($users) ? $users->status : old('status')); ?>"/>
    </div>
    <br>
    <button type="submit" class="btn btn-dark">Submit</button>
</form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH C:\Users\suraj\Desktop\Testing\laravelCRUD - Copy\resources\views/users/edit.blade.php ENDPATH**/ ?>