<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $guarded = ['code_kota'];

    public $timestamps = true;

    /**
     * Get the outlet that owns the Provinsi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function outlet()
    {
        return $this->hasMany(Outlet::class, 'code_kota', 'code_kota');
    }
}
