<div class="container">
  @foreach ($major_categories as $major_category)
    <h2>{{ $major_category->name }}</h2>
    @foreach ($categories as $category)
    @if ($category->major_category_name === $major_category_name)
    <label class="samuraimart-sidebar-category-label"><a
      href="{{ route('products.index', ['category' => $category->id]) }}">{{ $category->name }}</a></label>
  @endif
  @endforeach
  @endforeach
</div>