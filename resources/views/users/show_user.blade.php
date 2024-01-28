@extends('layouts.app')

@section('content')
    <div class="prose ml-4">
        <!--ユーザー名表示-->
           <h2>{{ $user->name }}</h2>
    </div>

    
    
    <div>
        {{-- 商品一覧 --}}
        @include('products.products')
    </div>
@endsection