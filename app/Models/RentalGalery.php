<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalGalery extends Model
{
    use HasFactory;

    protected $table = 'rental_galeries';
    protected $primaryKey = 'id';
}
