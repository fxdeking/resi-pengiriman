<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resi extends Model
{
    use HasFactory;
    protected $primaryKey="NoResiPengiriman";
    protected $table = "resipengiriman";
    protected $fillable = ['NoResi', 'NamaJasaPengiriman', 'NoTeleponJasaPengiriman', 'TanggalPengiriman', 'Kuantitas', 'NoBarang', 'NoPusat', 'NoPenerima', 'NoPengirim'];

    public function kantor(){
        return $this->hasOne(Kantor::class, 'NoPusat', 'NoPusat');
    }

    public function pengirim(){
        return $this->hasOne(Pengirim::class, 'NoPengirim', 'NoPengirim');
    }

    public function penerima(){
        return $this->hasOne(Penerima::class, 'NoPenerima', 'NoPenerima');
    }

    public function barang(){
        return $this->hasOne(Barang::class, 'NoBarang', 'NoBarang');
    }
}
