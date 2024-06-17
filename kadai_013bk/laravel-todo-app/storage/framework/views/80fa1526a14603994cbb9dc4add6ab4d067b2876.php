<div class="modal fade" id="editTodoModal<?php echo e($todo->id); ?>" tabindex="-1"
  aria-labelledby="editTodoModalLabel<?php echo e($todo->id); ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTodoModalLabel<?php echo e($todo->id); ?>">ToDoの編集</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>
      <form action="<?php echo e(route('goals.todos.update', [$goal, $todo])); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('patch'); ?>
        <div class="modal-body">
          <input type="text" class="form-control" name="content" value="<?php echo e($todo->content); ?>">
          <div class="d-flex flex-wrap">
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                            
        <label>
          <div class="d-flex align-items-center mt-3 me-3">
          <?php if($todo->tags()->where('tag_id', $tag->id)->exists()): ?>
        <input type="checkbox" name="tag_ids[]" value="<?php echo e($tag->id); ?>" checked>
      <?php else: ?>
      <input type="checkbox" name="tag_ids[]" value="<?php echo e($tag->id); ?>">
    <?php endif; ?>                  <span class="badge bg-secondary ms-1 fw-light"><?php echo e($tag->name); ?></span>
          </div>
        </label>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">更新</button>
        </div>
      </form>
    </div>
  </div>
</div><?php /**PATH C:\xampp\htdocs\laravel-todo-app\resources\views/modals/edit_todo.blade.php ENDPATH**/ ?>