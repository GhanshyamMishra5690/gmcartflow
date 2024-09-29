<?php 
namespace GMCartFlow\ShoppingCart\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['cart_id', 'product_id', 'quantity', 'price', 'subtotal'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
