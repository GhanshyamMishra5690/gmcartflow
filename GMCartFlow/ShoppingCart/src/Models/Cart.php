<?php 
namespace GMCartFlow\ShoppingCart\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'session_id', 'status'];

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}
