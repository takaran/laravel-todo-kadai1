@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-2">
    @component('components.sidebar', ['categories' => $categories, 'major_categories' => $major_categories])
    @endcomponent
  </div>
  <div class="col-9">
    <h1>おすすめ商品</h1>
    <div class="row">
      @foreach ($recommend_products as $recommend_product)
      <div class="col-4">
      <a href="{{ route('products.show', $recommend_product) }}">
        @if ($recommend_product->image !== "")
      <img src="{{ asset($recommend_product->image) }}" class="img-thumbnail">
    @else
    <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
  @endif
      </a>
      <div class="row">
        <div class="col-12">
        <p class="samuraimart-product-label mt-2">
          {{ $recommend_product->name }}<br>
          <label>￥{{ $recommend_product->price }}</label>
        </p>
        </div>
      </div>
      </div>
    @endforeach
    </div>

    <h1>新着商品</h1>
    <div class="row">

      <h1>新着商品</h1>
      <div class="row">
        <div class="col-3">
          <a href="#">
            <img src="{{ asset('img/robot-vacuum-cleaner.jpg') }}" class="img-thumbnail">
          </a>
          <div class="row">
            <div class="col-12">
              <p class="samuraimart-product-label mt-2">
                ロボット掃除機<br>
                <label>￥55000</label>
              </p>
            </div>
          </div>
        </div>

        <div class="col-3">
          <a href="#">
            <img src="{{ asset('img/sofa.jpg') }}" class="img-thumbnail">
          </a>
          <div class="row">
            <div class="col-12">
              <p class="samuraimart-product-label mt-2">
                3人掛けソファー<br>
                <label>￥35000</label>
              </p>
            </div>
          </div>
        </div>

        <div class="col-3">
          <a href="#">
            <img src="{{ asset('img/cup.jpg') }}" class="img-thumbnail">
          </a>
          <div class="row">
            <div class="col-12">
              <p class="samuraimart-product-label mt-2">
                コーヒーカップ<br>
                <label>￥1000</labiel>
              </p>
            </div>
          </div>
        </div>

        <div class="col-3">
          <a href="#">
            <img src="{{ asset('img/cutlery.jpg') }}" class="img-thumbnail">
          </a>
          <div class="row">
            <div class="col-12">
              <p class="samuraimart-product-label mt-2">
                食器 カトラリーセット1組<br>
                <label>￥2000</label>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection