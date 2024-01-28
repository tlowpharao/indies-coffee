@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>詳細</h2>
    </div>
    
    <div>
        <p>{{ $product->product_name }}</p>
        <p>{{ $product->roast_level }}</p>
        <p>{{ $product->price }}円</p>
        <p><a class="link link-hover text-info" href="{{ route('users.show', $product->user->id) }}">{{ $product->store_name }}</a></p>

    </div>
    <div>
        {!! nl2br(e($product->description)) !!}
    </div>

    <!--投稿削除-->　　
    <div>
        @if (Auth::id() == $product->user_id)
            <div class ='flex'>
                {{-- メッセージ編集ページへのリンク --}}
                <a class="btn btn-sm btn-outline" href="{{ route('products.edit', $product->id) }}">商品を編集</a>
                {{-- 投稿削除ボタンのフォーム --}}
                <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                         @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-error btn-sm normal-case" 
                        onclick="return confirm('Delete id = {{ $product->id }} ?')">削除</button>
                </form>
            
            </div>
        @endif
    </div>
    
    <div>
        @include('favorites.favorite_button')
    </div>


@endsection