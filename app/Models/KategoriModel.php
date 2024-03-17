<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriModel extends Model
{
    use HasFactory;
    protected $table = 'm_kategori'; //mendefinisikan nama tabel yg digunakan oleh model
    protected $primaryKey = 'kategori_id'; //mendefinisikan primary key dr tabel yg digunakan
    protected $fillable = ['kategori_kode', 'kategori_nama'];

    public function barang(): HasMany
    {
        return $this->hasMany(BarangModel::class, 'barang_id', 'barang_id');
    }
}
