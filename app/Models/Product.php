<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Create relationship of 1 to 1 with Category Model (Category::class)
    public function category()
    {
        // This help us to do in the view with something like this
        // index.blade.php => $product->category->name here category is
        // method we declare above
        return $this->belongsTo(Category::class);
    }

}
