<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kantor extends Model
{
    use HasFactory;
    protected $primaryKey="NoPusat";
    protected $table = "kantorpusat";
    protected $fillable = ['AlamatKantorPusat', 'NamaKantorPusat'];
}
