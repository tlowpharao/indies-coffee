@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>商品編集ページ</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('products.update', $product->id) }}" class="w-1/2">
            @csrf
            @method('PUT')

                <div class="form-control my-4">
                    <label for="product_name" class="label">
                        <span class="label-text">商品名:</span>
                    </label>
                    <input type="text" name="product_name" value="{{ $product->product_name }}" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="roast_level" class="label">
                        <span class="label-text">焙煎度:</span>
                    </label>
                    <input type="text" name="roast_level" value="{{ $product->roast_level }}" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="price" class="label">
                        <span class="label-text">価格:</span>
                    </label>
                    <input type="text" name="price" value="{{ $product->price }}" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="store_name" class="label">
                        <span class="label-text">屋号:</span>
                    </label>
                    <input type="text" name="store_name" value="{{ $product->store_name }}" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="description" class="label">
                        <span class="label-text">メッセージ:</span>
                    </label>
                    <input type="text" name="description" value="{{ $product->description }}" class="input input-bordered w-full">
                </div>

            <button type="submit" class="btn btn-primary btn-outline">更新</button>
        </form>
    </div>

@endsection