@extends('layouts.app')

@section('content')

　　<div class="prose ml-4">
        <h2>お気に入り商品</h2>
    </div>
    
    <div class="sm:grid sm:grid-cols-3 sm:gap-10">
            
        <div class="mt-4">
    　　　　@if (isset($favorites))
        　　　　<ul class="list-none">
            　　　　@foreach ($favorites as $favorite)
                　　　　<li class="flex items-start gap-x-2 mb-4">
                    　　　　<div>
                        　　　　<div>
                            　　　　{{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                            　　　　<p><a class="link link-hover text-info" href="{{ route('products.show', $favorite->id) }}">{{ $favorite->product_name }}</a></p>
                            　　　　<p>{{ $favorite->roast_level }}</p>
                            　　　　<p>{{ $favorite->price }}円</p>
                            　　　　<p><a class="link link-hover text-info" href="{{ route('users.show', $favorite->user->id) }}">{{ $favorite->store_name }}</a></p>
                            
                        　　　　</div>
                        　　　　<div>
                        　　　　{{-- お気に入りボタン --}}
                        　　　　
                        　　          @if (Auth::user()->is_liking($favorite->id))
                                        <!--お気に入りから削除ボタンのフォーム-->
                                        <form method="POST" action="{{ route('favorites.unfavorite', $favorite->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline btn-warning btn-sm normal-case" 
                                                onclick="return confirm('この商品をお気に入りから削除します。よろしいですか？')">お気に入りから削除</button>
                                        </form>
                                    @else
                                        <!--お気に入り追加ボタンのフォーム-->
                                        <form method="POST" action="{{ route('favorites.favorite', $favorite->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-outline btn-success btn-sm normal-case">お気に入り追加</button>
                                        </form>
                                    @endif
                        　　　　</div>
                        
                    　　　　</div>
                　　　　</li>
            　　　　@endforeach
        　　　　</ul>
        　　　
       
    　　　　@endif
　　　　</div>
                
                
　　</div>
@endsection