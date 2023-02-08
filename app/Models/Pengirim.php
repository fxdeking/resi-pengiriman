<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengirim extends Model
{
    use HasFactory;
    protected $primaryKey="NoPengirim";
    protected $table = "pengirim";
    protected $fillable = ['NamaPengirim', 'NoTeleponPengirim'];
}
