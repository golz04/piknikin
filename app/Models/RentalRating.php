<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalRating extends Model
{
    use HasFactory;

    protected $table = 'rental_ratings';
    protected $primaryKey = 'id';
}
