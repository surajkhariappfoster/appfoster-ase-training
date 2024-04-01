<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Laravel CRUD</title>
</head>
<body class="body">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid d-flex justify-content-center">
    <a class="navbar-brand" href="<?php echo e(route('users.index')); ?>">All Users</a>
  </div>
</nav>

<div class="container">
  
<div class="row">
        <div class="mt-2">
            <a href="<?php echo e(route('users.create')); ?>" class="btn btn-dark">Add User</a>
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
                    <button type="submit" class="btn btn-danger" onclick="deleteUser(<?php echo e($user->id); ?>)">Delete</button>
                    <a href="<?php echo e(route('users.edit', ['id' => $user->id])); ?>" class="btn btn-dark">Edit</a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal<?php echo e($user->id); ?>">
                        Details
                    </button>
                    <!-- Modal for User Details -->
<div class="modal fade" id="userModal<?php echo e($user->id); ?>" tabindex="-1" aria-labelledby="userModalLabel<?php echo e($user->id); ?>" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel<?php echo e($user->id); ?>">User Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Add the user details content here -->
        <p><strong>ID : </strong> <?php echo e($user->id); ?></p>
        <p><strong>Name : </strong><?php echo e($user->name); ?></p>
        <p><strong>Email : </strong><?php echo e($user->email); ?></p>
        <p><strong>Gender : </strong><?php echo e($user->gender); ?></p>
        <p><strong>Status : </strong><?php echo e($user->status); ?></p>
        <!-- Add other user details as needed -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                    <a href="<?php echo e(route('users.projects', ['id' => $user->id])); ?>" class="btn btn-secondary">Project</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    function deleteUser(userId) {
        fetch(`/api/users/${userId}/delete`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
        })
        .then(response => {
            if (response.ok) {
                // User deleted successfully, now reload the table
                reloadTable();
                console.log('User deleted successfully');
            } else {
                console.error('Error deleting user');
            }
        })
        .catch(error => {
            console.error('Error deleting user:', error);
        });
    }

    function reloadTable() {
        fetch('<?php echo e(route('users.index')); ?>')
            .then(response => response.text())
            .then(html => {
                document.querySelector('.body').innerHTML = html;
            })
            .catch(error => console.error('Error reloading table:', error));
    }
</script>

</body>
</html>
<?php /**PATH C:\Users\suraj\Desktop\Testing\laravelCRUD - Copy - Copy\resources\views/users/index.blade.php ENDPATH**/ ?>