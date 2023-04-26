<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTour extends Model
{
    use HasFactory;

    protected $table = 'request_tours';
    protected $primaryKey = 'id';
}
