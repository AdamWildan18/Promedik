<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $guarded = ['code_provisi'];

    public $timestamps = true;

    /**
     * Get the outlet that owns the Provinsi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function outlet()
    {
        return $this->hasMany(Outlet::class, 'code_provisi', 'code_provinsi');
    }
}
