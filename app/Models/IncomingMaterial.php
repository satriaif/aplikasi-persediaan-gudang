<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IncomingMaterial extends Model
{
     protected $fillable = [
    'material_id',
    'user_id',
   'tanggal_masuk',
    'jumlah',
    'keterangan'
];

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}

}