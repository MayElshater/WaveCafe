<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Beverage;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    
    ];
    public function beverages()
    {
        return $this->hasMany(Beverage::class);
    }
    
}
