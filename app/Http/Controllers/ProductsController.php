<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class ProductsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            // 認証済みユーザを取得
            $user = \Auth::user();
            
            $products = $user->feed_Products()->sortByDesc('created_at');
            // $products = $user->feed_Products()->orderBy('created_at', 'desc')->paginate(3);
            $data = [
                'user' => $user,
                'products' => $products
            ];
        }
        // dashboardビューでそれらを表示
        return view('dashboard', $data);
    }
    
    public function create()
    {
        $product = new Product;
        
        return view('products.create_product', [
            'product' => $product,
        ]);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'product_name' => 'required|max:255',
            'roast_level' => 'required|max:50',
            'price' => 'required|numeric',
            'store_name' => 'required|max:50',
        ]);
       
        
        $request->user()->products()->create([
            'product_name' => $request->product_name,
            'roast_level' => $request->roast_level,
            'price' => $request->price,
            'store_name' => $request->store_name,
            'description' => $request->description,
        ]);

        return redirect('/');
        
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        // メッセージ詳細ビューでそれを表示
        return view('products.show_product', [
            'product' => $product,
        ]);
    }

    // getでmessages/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        
        if (\Auth::id() === $product->user_id) {
            
            // メッセージ編集ビューでそれを表示
            return view('products.edit_product', [
                'product' => $product,
            ]);
            
        }
        return redirect('/');
        
    }

    public function update(Request $request, $id)
    {
        
        $product = Product::findOrFail($id);
        
        if (\Auth::id() === $product->user_id) {
           
           $product->product_name = $request->product_name;
           $product->roast_level = $request->roast_level;
           $product->price = $request->price;
           $product->store_name = $request->store_name;
           $product->description = $request->description;
           $product->save();
        
            return view('products.show_product', [
                'product' => $product,
            ]); 
            
        }
        return redirect('/');
        
    }

    // deleteでmessages/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        if (\Auth::id() === $product->user_id) {
            
            $product->delete();
            
            return redirect('/');
        }
        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
}
