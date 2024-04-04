<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    
    <title>Laravel CRUD</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Users</a>
    
  </div>
</nav>
<div class="container">
        <div class="text-right">
            <a href="users/create" class="btn btn-dark mt-2">Add User</a>
        </div>
        <table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($users->id); ?></td>
        <td><?php echo e($users->name); ?></td>
        <td><?php echo e($users->email); ?></td>
        <td>
          <a href="users/<?php echo e($users->id); ?>/edit" class="btn btn-dark ">Edit</a>
          
        <form method="POST" class="d-inline" action="users/<?php echo e($users->id); ?>/delete">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" class="btn btn-danger ">Delete</button>
        </form>

        <a href="users/<?php echo e($users->id); ?>/show" class="btn btn-primary ">Details</a>

        <a href="users/<?php echo e($users->id); ?>/show" class="btn btn-secondary ">Project</a>

        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html><?php /**PATH D:\LaravelCRUD\laravelCRUD\resources\views/users/index.blade.php ENDPATH**/ ?>