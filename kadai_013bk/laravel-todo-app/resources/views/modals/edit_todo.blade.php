<div class="modal fade" id="editTodoModal{{ $todo->id }}" tabindex="-1"
  aria-labelledby="editTodoModalLabel{{ $todo->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTodoModalLabel{{ $todo->id }}">ToDoの編集</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>
      <form action="{{ route('goals.todos.update', [$goal, $todo]) }}" method="post">
        @csrf
        @method('patch')
        <div class="modal-body">
          <div class="mb-3">
            <label for="content{{ $todo->id }}" class="form-label">Todo</label>
            <input type="text" class="form-control" name="content" id="content{{ $todo->id }}"
              value="{{ $todo->content }}">
          </div>
          <div class="mb-3">
            <label for="description{{ $todo->id }}" class="form-label">詳細</label>
            <textarea class="form-control" name="description"
              id="description{{ $todo->id }}">{{ $todo->description }}</textarea>
          </div>
          <div class="d-flex flex-wrap">
            @foreach ($tags as $tag)                    <label class="me-3">
          <div class="d-flex align-items-center mt-3">
          @if ($todo->tags()->where('tag_id', $tag->id)->exists())
        <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}" checked>
      @else
      <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}">
    @endif
          <span class="badge bg-secondary ms-1 fw-light">{{ $tag->name }}</span>
          </div>
        </label>
      @endforeach    
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">更新</button>
        </div>
      </form>
    </div>
  </div>
</div>