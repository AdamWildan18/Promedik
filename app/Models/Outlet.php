<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $table = 'master_outlet_jrecare';

    protected $guarded = ['code_outlet'];

    public $timestamps = true;

    protected $primaryKey = 'code_outlet';

    /**
     * Get the provinsi for the outlet.
     */
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'code_provinsi', 'code_provinsi');
    }

    /**
     * Get the kota for the outlet.
     */
    public function kota()
    {
        return $this->belongsTo(Kota::class, 'code_kota', 'code_kota');
    }

    /**
     * Get the cabang for the outlet.
     */
    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'code_cabang', 'code_cabang');
    }
}
