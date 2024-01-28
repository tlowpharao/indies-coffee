<!--<div>-->
    @if (Auth::user()->is_liking($product->id))
        <!--お気に入りから削除ボタンのフォーム-->
        <form method="POST" action="{{ route('favorites.unfavorite', $product->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline btn-warning btn-sm normal-case" 
                onclick="return confirm('この商品をお気に入りから削除します。よろしいですか？')">お気に入りから削除</button>
        </form>
    @else
        <!--お気に入り追加ボタンのフォーム-->
        <form method="POST" action="{{ route('favorites.favorite', $product->id) }}">
            @csrf
            <button type="submit" class="btn btn-outline btn-success btn-sm normal-case">お気に入り追加</button>
        </form>
    @endif

<!--</div>-->