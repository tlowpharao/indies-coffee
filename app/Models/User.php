<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Product;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    public function feed_products(){
        
        return Product::all();
        
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'favorites', 'user_id', 'product_id')->withTimestamps();
    }
    
    public function favorite($productId)
    {
        $exist = $this->is_liking($productId);
        // $its_me = $this->id == $productId;
        // $this->idがどこのidなのかわからん
        // ポストidならProductのクラスのidに繋げないと判定できないか？
        
        // $existがtureならfalseを返して保存されない
        if ($exist) {
            return false;
        } else {
            $this->favorites()->attach($productId);
            return true;
        }
    }
    
    public function unfavorite($productId)
    {
        $exist = $this->is_liking($productId);
        
        if ($exist) {
            $this->favorites()->detach($productId);
            return true;
        } else {
            return false;
        }
    }
    
    public function is_liking($productId)
    {
        return $this->favorites()->where('product_id', $productId)->exists();
    }
    
}
