<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Blog_category extends Model
{
    use HasFactory;
    protected $table = 'blog_category';
    protected $primaryKey = "id";
}
