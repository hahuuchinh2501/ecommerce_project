<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 
        'description', 
        'price', 
        'image1', 
        'image2', 
        'image3', 
        'category_id'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
