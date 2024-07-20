<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

class Beverage extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'price',
        'published',
        'special',
        'image',
        'category_id',
        
        
    ];
    public function getPublishedStatus()
    {
        return $this->published ? 'Yes' : 'No';
    }
    public function getspecialStatus()
    {
        return $this->special ? 'Yes' : 'No';
    }
    public function getImagePath()
    {
        // Assuming your images are stored in the 'assets/images' directory
        return asset('assets/images/' . $this->image);
    }

    public function category()
{
    return $this->belongsTo(Category::class);
}
}
