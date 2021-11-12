<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muda extends Model
{
    protected $fillable = ['espécie', 'data_plantação', 'data_germinação', 'número_filhas'];
}
