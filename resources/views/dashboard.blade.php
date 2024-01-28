@extends('layouts.app')

@section('content')

　　<div class="prose ml-4">
        <h2>商品一覧</h2>
    </div>

    @if (Auth::check())
        <div class="sm:grid sm:grid-cols-3 sm:gap-10">
            
                
                {{-- 商品一覧 --}}
                @include('products.products')
                
                
        </div>
    @else
        <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
            <div class="hero-content text-center my-10">
                <div class="max-w-md mb-10">
                    <h2>Welcome to the indies coffee</h2>
                    {{-- ユーザ登録ページへのリンク --}}
                    <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">Sign up now!</a>
                </div>
            </div>
        </div>
    @endif
@endsection