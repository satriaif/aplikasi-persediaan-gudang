<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{
   protected $fillable = [
    'role_id',
    'nama',
    'username',
    'email',
    'password',
];
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function role(): BelongsTo
{
    return $this->belongsTo(Role::class);
}
}