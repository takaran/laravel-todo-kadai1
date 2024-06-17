<div class="modal fade" id="editGoalModal<?php echo e($goal->id); ?>" tabindex="-1"
  aria-labelledby="editGoalModalLabel<?php echo e($goal->id); ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editGoalModalLabel<?php echo e($goal->id); ?>">目標の編集</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>
      <form action="<?php echo e(route('goals.update', $goal)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('patch'); ?>
        <div class="modal-body">
          <input type="text" class="form-control" name="title" value="<?php echo e($goal->title); ?>">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">更新</button>
        </div>
      </form>
    </div>
  </div>
</div><?php /**PATH C:\xampp\htdocs\laravel-todo-app\resources\views/modals/edit_goal.blade.php ENDPATH**/ ?>