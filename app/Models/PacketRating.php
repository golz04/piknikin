<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacketRating extends Model
{
    use HasFactory;

    protected $table = 'packet_ratings';
    protected $primaryKey = 'id';
}
