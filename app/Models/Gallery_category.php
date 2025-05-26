<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Gallery_category extends Model
{
    use HasFactory;
    protected $table = 'gallery_category';
    protected $primaryKey = "id";
}
