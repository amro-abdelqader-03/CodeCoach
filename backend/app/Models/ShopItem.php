<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ShopItem extends Model
{
    protected $fillable = ['name','type','image','currency','price','is_active'];
    protected function casts(): array { return ['is_active'=>'boolean']; }
}
