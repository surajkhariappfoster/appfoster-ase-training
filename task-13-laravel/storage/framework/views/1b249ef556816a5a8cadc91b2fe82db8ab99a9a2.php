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
    <a class="navbar-brand" href="/">Users</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    </div>
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
                <h2>User edit  #<?php echo e($users->name); ?></h2>
                <form method="POST" action="/users/<?php echo e($users->id); ?>/update">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="form-group">
                        <label>ID</label>
                        <input type="number" name="id" 
                        class="form-control" value="<?php echo e(old('id',$users->id)); ?>"/>
                        <?php if($errors->has('id')): ?>
                            <span class="text-danger"><?php echo e($errors->first('id')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div  class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo e(old('name',$users->name)); ?>"/>
                        <?php if($errors->has('name')): ?>
                            <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div  class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo e(old('email',$users->email)); ?>"/>
                        <?php if($errors->has('email')): ?>
                            <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div  class="form-group">
                        <label>Gender</label>
                        <input type="text" name="gender" class="form-control" value="<?php echo e(old('gender',$users->gender)); ?>"/>
                        <?php if($errors->has('gender')): ?>
                            <span class="text-danger"><?php echo e($errors->first('gender')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div  class="form-group">
                        
                        <label>Status</label>
                        <input type="text" name="status" class="form-control" value="<?php echo e(old('status',$users->status)); ?>"/>
                        <?php if($errors->has('status')): ?>
                            <span class="text-danger"><?php echo e($errors->first('status')); ?></span>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-dark">Submit
                    </button>
                </form>
              </div>
            </div>
        </div>
    </div>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</body>
</html><?php /**PATH D:\LaravelCRUD\laravelCRUD\resources\views/users/edit.blade.php ENDPATH**/ ?>