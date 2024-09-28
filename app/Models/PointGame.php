<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointGame extends Model
{
    use HasFactory;
    protected $table = 'point_game';
    protected $fillable = ['nama_user', 'total_point'];
}
