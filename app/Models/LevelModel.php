<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LevelModel extends Model
{
    use HasFactory;
    protected $table = 'm_level'; //mendefinisikan nama tabel yg digunakan oleh model
    protected $primaryKey = 'level_id'; //mendefinisikan primary key dr tabel yg digunakan

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }
}
