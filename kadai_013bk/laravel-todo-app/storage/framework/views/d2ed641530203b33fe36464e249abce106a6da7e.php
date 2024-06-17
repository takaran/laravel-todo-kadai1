<div class="modal fade" id="addTodoModal<?php echo e($goal->id); ?>" tabindex="-1"
  aria-labelledby="addTodoModalLabel<?php echo e($goal->id); ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTodoModalLabel<?php echo e($goal->id); ?>">ToDoの追加</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>
      <form action="<?php echo e(route('goals.todos.store', $goal)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
          <input type="text" class="form-control" name="content">
          <div class="d-flex flex-wrap">
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                            
        <label>
          <div class="d-flex align-items-center mt-3 me-3">
          <input type="checkbox" name="tag_ids[]" value="<?php echo e($tag->id); ?>">
          <span class="badge bg-secondary ms-1"><?php echo e($tag->name); ?></span>
          </div>
        </label>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">登録</button>
        </div>
      </form>
    </div>
  </div>
</div><?php /**PATH C:\xampp\htdocs\laravel-todo-app\resources\views/modals/add_todo.blade.php ENDPATH**/ ?>