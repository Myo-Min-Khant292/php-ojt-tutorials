
<?php $__env->startSection('content'); ?>

    <div class="btn-div clearfix">
        <a href="<?php echo e(route('student#create')); ?>" class="btn btn-primary">Create</a>
        <div class="csv-file clearfix">
            <a href="<?php echo e(route('student#export')); ?>" class="btn btn-primary csv-export">Export</a>
            <button id="show-form-btn" class="btn btn-primary csv-import">Import</button>
            <form action="<?php echo e(route('student#import')); ?>" id="import-form" class="clearfix" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="file" name="import_file" id="file" class="form-control import-file">
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
    <div class="info">
        <div class="index-search clearfix">
            <h1>Students Lists</h1>
            <form action="<?php echo e(route('student#search')); ?>" method="GET" class="search">
                <?php echo csrf_field(); ?>
                <div class="mb-3 clearfix"> 
                    <input type="search" name="search_text" class="form-control search-box left" placeholder="Search">
                    <button type="submit" class="btn btn-primary right">Search</button>
                </div>
            </form>
        </div>
        <table id="table" class="table table-secondary table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Major</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($student->id); ?></th>
                    <td><?php echo e($student->name); ?></td>
                    <td><?php echo e($student->major->major); ?></td>
                    <td><?php echo e($student->phone); ?></td>
                    <td><?php echo e($student->email); ?></td>
                    <td><?php echo e($student->address); ?></td>
                    <td>
                        <form action="<?php echo e(route('student#destroy' , $student->id)); ?>" id="form" method="POST">
                            <?php echo csrf_field(); ?>
                            <a href="<?php echo e(route('student#edit' , $student->id)); ?>" class="btn btn-success">Edit</a>
                            <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                        </form>
                    </td>          
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
       <div class="center"><?php echo e($students->links()); ?></div> 
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\php-ojt-tutorials\Assignment_05\resources\views/student/index.blade.php ENDPATH**/ ?>