@extends('layouts.dashboard')

@section('content')
<div class="w-50">
    <h1>商品登録</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <hr>

    <form method="POST" action="/dashboard/products/{{ $product->id }}" class="mb-5">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-inline mt-4 mb-4 row">
            <label for="product-name" class="col-2 d-flex justify-content-start">商品名</label>
            <input type="text" name="name" id="product-name" class="form-control col-8" value="{{ $product->name }}">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="product-price" class="col-2 d-flex justify-content-start">価格</label>
            <input type="number" name="price" id="product-price" class="form-control col-8" value="{{ $product->price }}">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="product-category" class="col-2 d-flex justify-content-start">カテゴリ</label>
            <select name="category_id" class="form-control col-8" id="product-category">
                @foreach ($categories as $category)
                @if ($category->id == $product->category_id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
       <div class="form-inline mt-4 mb-4 row">
           <label for="product-price" class="col-2 d-flex justify-content-start">オススメ?</label>
           @if ($product->recommend_flag)
           <input type="checkbox" name="recommend" id="product-recommend" class="samazon-check-box" checked>
           @else
           <input type="checkbox" name="recommend" id="product-recommend" class="samazon-check-box">
           @endif
       </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="product-description" class="col-2 d-flex justify-content-start align-self-start">商品説明</label>
            <textarea name="description" id="product-description" class="form-control col-8" rows="10">{{ $product->description }}</textarea>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="w-25 btn samazon-submit-button">更新</button>
        </div>
    </form>

    <div class="d-flex justify-content-end">
        <a href="/dashboard/products">商品一覧に戻る</a>
    </div>
</div>
@endsection