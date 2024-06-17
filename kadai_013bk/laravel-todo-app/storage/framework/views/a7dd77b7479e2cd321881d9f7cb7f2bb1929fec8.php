<div class="modal fade" id="deleteGoalModal<?php echo e($goal->id); ?>" tabindex="-1"
  aria-labelledby="deleteGoalModalLabel<?php echo e($goal->id); ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteGoalModalLabel<?php echo e($goal->id); ?>">「<?php echo e($goal->title); ?>」を削除してもよろしいですか？</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>
      <div class="modal-footer">
        <form action="<?php echo e(route('goals.destroy', $goal)); ?>" method="post">
          <?php echo csrf_field(); ?>
          <?php echo method_field('delete'); ?>
          <button type="submit" class="btn btn-danger">削除</button>
        </form>
      </div>
    </div>
  </div>
</div><?php /**PATH C:\xampp\htdocs\laravel-todo-app\resources\views/modals/delete_goal.blade.php ENDPATH**/ ?>