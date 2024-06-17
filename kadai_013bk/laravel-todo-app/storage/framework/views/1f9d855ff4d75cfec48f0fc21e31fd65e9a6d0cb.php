<div class="modal fade" id="deleteTodoModal<?php echo e($todo->id); ?>" tabindex="-1"
  aria-labelledby="deleteTodoModalLabel<?php echo e($todo->id); ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteTodoModalLabel<?php echo e($todo->id); ?>">「<?php echo e($todo->content); ?>」を削除してもよろしいですか？</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>
      <div class="modal-footer">
        <form action="<?php echo e(route('goals.todos.destroy', [$goal, $todo])); ?>" method="post">
          <?php echo csrf_field(); ?>
          <?php echo method_field('delete'); ?>
          <button type="submit" class="btn btn-danger">削除</button>
        </form>
      </div>
    </div>
  </div>
</div><?php /**PATH C:\xampp\htdocs\kadai_013\laravel-todo-app\resources\views/modals/delete_todo.blade.php ENDPATH**/ ?>