

<?php $__env->startPush('styles'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('/css/style.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
  <script src="<?php echo e(asset('/js/script.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container h-100">
  <?php if($errors->any()): ?>
    <div class="alert alert-danger">
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    </div>
  <?php endif; ?>

  <!-- 目標の追加用モーダル -->
  <?php echo $__env->make('modals.add_goal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  

  <!-- タグの追加用モーダル -->
  <?php echo $__env->make('modals.add_tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 

  <div class="d-flex mb-3">
    <a href="#" class="link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addGoalModal">
      <div class="d-flex align-items-center">
        <span class="fs-5 fw-bold">+</span>&nbsp;目標の追加
      </div>
    </a>
    <a href="#" class="ms-4 link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addTagModal">
      <div class="d-flex align-items-center">
        <span class="fs-5 fw-bold">＋</span>&nbsp;タグの追加
      </div>
    </a>
  </div>

  <div class="row row-cols-1 row row-cols-md-2 row-cols-lg-3 g-4">
    <?php $__currentLoopData = $goals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $goal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

    <!-- 目標の編集用モーダル -->
    <?php echo $__env->make('modals.edit_goal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 

    <!-- 目標の削除用モーダル -->
    <?php echo $__env->make('modals.delete_goal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  

    <!-- ToDoの追加用モーダル -->
    <?php echo $__env->make('modals.add_todo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   

    <div class="col">
      <div class="card bg-light">
      <div class="card-body d-flex justify-content-between align-items-center">
        <h4 class="card-title ms-1 mb-0"><?php echo e($goal->title); ?></h4>
        <div class="d-flex align-items-center">
        <a href="#" class="px-2 fs-5 fw-bold link-dark text-decoration-none" data-bs-toggle="modal"
          data-bs-target="#addTodoModal<?php echo e($goal->id); ?>">＋</a>
        <div class="dropdown">
          <a href="#" class="dropdown-toggle px-1 fs-5 fw-bold link-dark text-decoration-none menu-icon"
          id="dropdownGoalMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">︙</a>
          <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="dropdownGoalMenuLink">
          <li><a href="#" class="dropdown-item" data-bs-toggle="modal"
            data-bs-target="#editGoalModal<?php echo e($goal->id); ?>">編集</a></li>
          <div class="dropdown-divider"></div>
          <li><a href="#" class="dropdown-item" data-bs-toggle="modal"
            data-bs-target="#deleteGoalModal<?php echo e($goal->id); ?>">削除</a></li>
          </ul>
        </div>
        </div>
      </div>


      <?php $__currentLoopData = $goal->todos()->orderBy('done', 'asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
      <!-- ToDoの編集用モーダル -->
      <?php echo $__env->make('modals.edit_todo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <!-- ToDoの削除用モーダル -->
      <?php echo $__env->make('modals.delete_todo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <div class="card mx-2 mb-2">
      <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h5 class="card-title ms-1 mb-0">
        <?php if($todo->done): ?>
      <s><?php echo e($todo->content); ?></s>
    <?php else: ?>
    <?php echo e($todo->content); ?>

  <?php endif; ?>
        </h5>
        <div class="dropdown">
        <a href="#" class="dropdown-toggle px-1 fs-5 fw-bold link-dark text-decoration-none menu-icon"
        id="dropdownTodoMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">︙</a>
        <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="dropdownTodoMenuLink">
        <li>
        <form action="<?php echo e(route('goals.todos.update', [$goal, $todo])); ?>" method="post">
          <?php echo csrf_field(); ?>
          <?php echo method_field('patch'); ?>
          <input type="hidden" name="content" value="<?php echo e($todo->content); ?>">
          <?php if($todo->done): ?>
        <input type="hidden" name="done" value="false">
        <button type="submit" class="dropdown-item btn btn-link">未完了</button>
      <?php else: ?>
      <input type="hidden" name="done" value="true">
      <button type="submit" class="dropdown-item btn btn-link">完了</button>
    <?php endif; ?>
        </form>
        </li>
        <li><a href="#" class="dropdown-item" data-bs-toggle="modal"
          data-bs-target="#editTodoModal<?php echo e($todo->id); ?>">編集</a></li>
        <div class="dropdown-divider"></div>
        <li><a href="#" class="dropdown-item" data-bs-toggle="modal"
          data-bs-target="#deleteTodoModal<?php echo e($todo->id); ?>">削除</a></li>
        </ul>
        </div>
      </div>
      <h6 class="card-subtitle ms-1 mb-1 text-muted"><?php echo e($todo->created_at); ?></h6>
      <div class="d-flex flex-wrap mx-1 mb-1">
        <?php $__currentLoopData = $todo->tags()->orderBy('id', 'asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                    
      <span class="badge bg-secondary mt-2 me-2 fw-light"><?php echo e($tag->name); ?></span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
      </div>
      </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                       
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-todo-app\resources\views/goals/index.blade.php ENDPATH**/ ?>