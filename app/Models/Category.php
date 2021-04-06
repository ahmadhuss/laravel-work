<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model => A Model is a file that describes 1 database table.
// It should be singular form of the database table. It extends
// Model class it means it ties to the Database and ready to use.
class Category extends Model
{
    use HasFactory;
    // The field we want to updatable or creatable
    protected $fillable = ['name'];

}
