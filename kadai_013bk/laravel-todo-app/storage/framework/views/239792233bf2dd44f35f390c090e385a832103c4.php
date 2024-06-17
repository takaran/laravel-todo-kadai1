<div class="modal fade" id="editTagModal" tabindex="-1" aria-labelledby="editTagModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTagModalLabel">タグの編集</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>
      <form action="" method="post" name="editTagForm">
        <?php echo csrf_field(); ?>
        <?php echo method_field('patch'); ?>
        <div class="modal-body">
          <input type="text" class="form-control" name="name" value="">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">更新</button>
        </div>
      </form>
    </div>
  </div>
</div><?php /**PATH C:\xampp\htdocs\kadai_013\laravel-todo-app\resources\views/modals/edit_tag.blade.php ENDPATH**/ ?>