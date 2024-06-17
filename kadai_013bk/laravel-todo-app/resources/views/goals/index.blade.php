@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endpush

@push('scripts')
  <script src="{{ asset('/js/script.js') }}"></script>
@endpush

@section('content')
<div class="container h-100">
  @if ($errors->any())
    <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
  @endif

  {{-- 目標の追加用モーダル --}}
  @include('modals.add_goal')

  {{-- タグの追加用モーダル --}}
  @include('modals.add_tag')

  <div class="d-flex mb-3">
    <a href="#" class="link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addGoalModal">
      <div class="d-flex align-items-center">
        <span class="fs-5 fw-bold">+</span> 目標の追加
      </div>
    </a>
    <a href="#" class="ms-4 link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addTagModal">
      <div class="d-flex align-items-center">
        <span class="fs-5 fw-bold">＋</span> タグの追加
      </div>
    </a>
  </div>

  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach ($goals as $goal)
    {{-- 目標の編集用モーダル --}}
    @include('modals.edit_goal')

    {{-- 目標の削除用モーダル --}}
    @include('modals.delete_goal')

    {{-- ToDoの追加用モーダル --}}
    @include('modals.add_todo')

    <div class="col">
      <div class="card bg-light">
      <div class="card-body d-flex justify-content-between align-items-center">
        <h4 class="card-title ms-1 mb-0">{{ $goal->title }}</h4>
        <div class="d-flex align-items-center">
        <a href="#" class="px-2 fs-5 fw-bold link-dark text-decoration-none" data-bs-toggle="modal"
          data-bs-target="#addTodoModal{{ $goal->id }}">＋</a>
        <div class="dropdown">
          <a href="#" class="dropdown-toggle px-1 fs-5 fw-bold link-dark text-decoration-none menu-icon"
          id="dropdownGoalMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">︙</a>
          <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="dropdownGoalMenuLink">
          <li><a href="#" class="dropdown-item" data-bs-toggle="modal"
            data-bs-target="#editGoalModal{{ $goal->id }}">編集</a></li>
          <div class="dropdown-divider"></div>
          <li><a href="#" class="dropdown-item" data-bs-toggle="modal"
            data-bs-target="#deleteGoalModal{{ $goal->id }}">削除</a></li>
          </ul>
        </div>
        </div>
      </div>

      @foreach ($goal->todos()->orderBy('done', 'asc')->get() as $todo)
      {{-- ToDoの編集用モーダル --}}
      @include('modals.edit_todo')

      {{-- ToDoの削除用モーダル --}}
      @include('modals.delete_todo')

      <div class="card mx-2 mb-2">
      <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h5 class="card-title ms-1 mb-0">
        @if ($todo->done)
      <s>{{ $todo->content }}</s>
    @else
    {{ $todo->content }}
  @endif
        </h5>
        <div class="dropdown">
        <a href="#" class="dropdown-toggle px-1 fs-5 fw-bold link-dark text-decoration-none menu-icon"
        id="dropdownTodoMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">︙</a>
        <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="dropdownTodoMenuLink">
        <li>
        <form action="{{ route('goals.todos.update', [$goal, $todo]) }}" method="post">
          @csrf
          @method('patch')
          <input type="hidden" name="content" value="{{ $todo->content }}">
          @if ($todo->done)
        <input type="hidden" name="done" value="false">
        <button type="submit" class="dropdown-item btn btn-link">未完了</button>
      @else
      <input type="hidden" name="done" value="true">
      <button type="submit" class="dropdown-item btn btn-link">完了</button>
    @endif
        </form>
        </li>
        <li><a href="#" class="dropdown-item" data-bs-toggle="modal"
          data-bs-target="#editTodoModal{{ $todo->id }}">編集</a></li>
        <div class="dropdown-divider"></div>
        <li><a href="#" class="dropdown-item" data-bs-toggle="modal"
          data-bs-target="#deleteTodoModal{{ $todo->id }}">削除</a></li>
        </ul>
        </div>
      </div>
      <p class="card-text">{{ $todo->description }}</p> {{-- 詳細を表示 --}}
      <h6 class="card-subtitle ms-1 mb-1 text-muted">{{ $todo->created_at->format('Y-m-d H:i') }}</h6>
      <div class="d-flex flex-wrap mx-1 mb-1">
        @foreach ($todo->tags()->orderBy('id', 'asc')->get() as $tag)
      <span class="badge bg-secondary mt-2 me-2 fw-light">{{ $tag->name }}</span>
    @endforeach
      </div>
      </div>
      </div>
    @endforeach
      </div>
    </div>
  @endforeach
  </div>
</div>
@endsection