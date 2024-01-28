<div class="mt-4">
    @if (isset($products))
        <ul class="list-none">
            @foreach ($products as $product)
                <li class="flex items-start gap-x-2 mb-4">
                    {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                    <div>
                        
                        <div>
                            {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                            <p><a class="link link-hover text-info" href="{{ route('products.show', $product->id) }}">{{ $product->product_name }}</a></p>
                            <p>{{ $product->roast_level }}</p>
                            <p>{{ $product->price }}円</p>
                            <p><a class="link link-hover text-info" href="{{ route('users.show', $product->user->id) }}">{{ $product->store_name }}</a></p>
                            
                        </div>
                        
                        <div class="flex mt-2">
                        {{-- お気に入りボタン --}}
                        　　@include('favorites.favorite_button')
                        </div>
                        
                        
                    </div>
                </li>
            @endforeach
        </ul>
        {{-- ページネーションのリンク --}}
       
    @endif
</div>