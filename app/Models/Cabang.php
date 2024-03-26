<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;

    protected $guarded = ['code_cabang'];

    public $timestamps = true;

    protected $primaryKey = 'code_cabang';
    /**
     * Get the outlet that owns the Provinsi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function outlet()
    {
        return $this->hasMany(Outlet::class, 'code_cabang', 'code_cabang');
    }
}
