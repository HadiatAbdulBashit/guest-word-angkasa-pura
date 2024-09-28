<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKata extends Model
{
    use HasFactory;
    protected $table = 'master_kata';
    protected $fillable = ['kata', 'clue'];
}
