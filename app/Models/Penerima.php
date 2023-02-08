<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    use HasFactory;
    protected $primaryKey="NoPenerima";
    protected $table = "penerima";
    protected $fillable = ['NamaPenerima', 'AlamatPenerima'];

    public function resi(){
        return $this->hasMany(Resi::class);
    }
}
