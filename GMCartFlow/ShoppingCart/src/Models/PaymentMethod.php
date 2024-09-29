<?php 
namespace GMCartFlow\ShoppingCart\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = ['name', 'provider', 'details'];
}
