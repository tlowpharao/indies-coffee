@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>商品作成ページ</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('products.store') }}" class="w-1/2">
            @csrf

                <div class="form-control my-4">
                    <label for="product_name" class="label">
                        <span class="label-text">商品名:</span>
                    </label>
                    <input type="text" name="product_name" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="roast_level" class="label">
                        <span class="label-text">焙煎度:</span>
                    </label>
                    <input type="text" name="roast_level" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="price" class="label">
                        <span class="label-text">価格:</span>
                    </label>
                    <input type="text" name="price" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="store_name" class="label">
                        <span class="label-text">ストア名:</span>
                    </label>
                    <input type="text" name="store_name" class="input input-bordered w-full">
                </div>
                
                <div class="form-control my-4">
                    <label for="description" class="label">
                        <span class="label-text">商品説明:</span>
                    </label>
                    <input type="text" name="description" class="input input-bordered w-full">
                </div>

            <button type="submit" class="btn btn-primary btn-outline">出品</button>
        </form>
    </div>
@endsection