<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial_category extends Model
{
    use HasFactory;
    protected $table = 'testimonial_category';
    protected $primaryKey = "id";
}
