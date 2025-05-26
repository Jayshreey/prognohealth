<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review_category extends Model
{
    use HasFactory;
    protected $table = 'review_category';
    protected $primaryKey = "id";
}
