<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resi extends Model
{
    use HasFactory;
    protected $primaryKey="NoResiPengiriman";
    protected $table = "resipengiriman";
    protected $fillable = ['NoResi', 'NamaJasaPengiriman', 'NoTeleponJasaPengiriman', 'BarcodeResi', 'NoBarang', 'NoPusat', 'NoPenerima', 'NoPengirim'];

    public function kantor(){
        return $this->belongsTo(Kantor::class);
    }

    public function pengirim(){
        return $this->belongsTo(Pengirim::class);
    }

    public function penerima(){
        return $this->belongsTo(Penerima::class);
    }

    public function barang(){
        return $this->belongsTo(Barang::class);
    }
}
