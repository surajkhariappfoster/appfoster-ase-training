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
  <div class="container-fluid d-flex justify-content-center">
    <a class="navbar-brand" href="/">All Users</a>
  </div>
</nav>

<div class="container">
  
<div class="row">
        <div class="mt-2">
            <a href="users/create" class="btn btn-dark">Add User</a>
        </div>
    </div>
    <table class="table table-hover mt-2 ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($user->id); ?></td>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->email); ?></td>
                
                <td>
                    
                    <form method="POST" class="d-inline" action="users/<?php echo e($user->id); ?>/delete">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="users/<?php echo e($user->id); ?>/edit" class="btn btn-dark">Edit</a>
                    
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal<?php echo e($user->id); ?>">
                        Details
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="userModal<?php echo e($user->id); ?>" tabindex="-1" aria-labelledby="userModal<?php echo e($user->id); ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="userModal<?php echo e($user->id); ?>Label">User Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>ID: <b><?php echo e($user->id); ?></b></p>
                                    <p>Name: <b><?php echo e($user->name); ?></b></p>
                                    <p>Email: <b><?php echo e($user->email); ?></b></p>
                                    <p>Gender: <b><?php echo e($user->gender); ?></b></p>
                                    <p>status: <b><?php echo e($user->status); ?></b></p>
                                    <!-- Add more details here if needed -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="users/<?php echo e($user->id); ?>/projects" class="btn btn-secondary">Project</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH D:\LaravelCRUD\laravelCRUD - Copy - Copy\resources\views/users/index.blade.php ENDPATH**/ ?>