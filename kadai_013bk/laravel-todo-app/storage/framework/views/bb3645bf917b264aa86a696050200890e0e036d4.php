<!-- タグの編集用モーダル -->
<?php echo $__env->make('modals.edit_tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- タグの削除用モーダル -->
<?php echo $__env->make('modals.delete_tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="modal fade" id="addTagModal" tabindex="-1" aria-labelledby="addTagModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTagModalLabel">タグの追加</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>
      <form action="<?php echo e(route('tags.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
          <input type="text" class="form-control" name="name">
          <div class="d-flex flex-wrap">
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="d-flex align-items-center mt-3 me-3">
          <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editTagModal"
          data-bs-dismiss="modal" data-tag-id="<?php echo e($tag->id); ?>"
          data-tag-name="<?php echo e($tag->name); ?>"><?php echo e($tag->name); ?></button>
          <button type="button" class="btn-close ms-1" aria-label="削除" data-bs-toggle="modal"
          data-bs-target="#deleteTagModal" data-bs-dismiss="modal" data-tag-id="<?php echo e($tag->id); ?>"
          data-tag-name="<?php echo e($tag->name); ?>"></button>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">登録</button>
        </div>
      </form>
    </div>
  </div>
</div><?php /**PATH C:\xampp\htdocs\kadai_013\laravel-todo-app\resources\views/modals/add_tag.blade.php ENDPATH**/ ?>