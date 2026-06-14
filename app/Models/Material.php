<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    protected $fillable = [
        'category_id',
        'kode_material',
        'nama_material',
        'satuan',
        'stok',
        'status'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function incomingMaterials(): HasMany
    {
        return $this->hasMany(IncomingMaterial::class);
    }

    public function outgoingMaterials(): HasMany
    {
        return $this->hasMany(OutgoingMaterial::class);
    }
}