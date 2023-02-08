<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $primaryKey="NoBarang";
    protected $table = "barang";
    protected $fillable = ['NamaBarang', 'BeratBarang'];

    public function resi(){
        return $this->hasMany(Resi::class);
    }
}
