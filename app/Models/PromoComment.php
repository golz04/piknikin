<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoComment extends Model
{
    use HasFactory;

    protected $table = 'promo_comments';
    protected $primaryKey = 'id';
}
