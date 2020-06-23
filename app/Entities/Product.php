<?php
 
namespace App\Entities;

use App\Entities\Review;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
	protected $fillable = [
        'name', 'detail', 'stock','price','discount','user_id'
    ];
    
    public function reviews()
    {
    	return $this->hasMany(Review::class);
    }
}