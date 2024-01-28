<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class UsersController extends Controller
{
    
    
    
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        $products = $user->products()->orderBy('created_at', 'desc')->paginate(3);

        return view('users.show_user', [
            'user' => $user,
            'products' => $products,
        ]);
    }
    
    // お気に入り取得
    public function favorites($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // ユーザのお気に入り一覧を取得
        $favorites = $user->favorites()->orderBy('created_at', 'desc')->get();

        // フォロー一覧ビューでそれらを表示
        return view('favorites.favorites', [
            'user' => $user,
            'favorites' => $favorites,
        ]);
    }
}
