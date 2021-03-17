<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCotizacion extends Model
{
    use HasFactory;

    protected $table = 'detalle_cotizacion';

    protected $fillable = [
        'nombre', 'estado'
    ];

    /**
     * Get all of the servicios for the DetalleCotizacion
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicios(): HasMany
    {
        return $this->hasMany(ServiciosDetalleCotizacion::class, 'detalle_cotizacion_id', 'id');
    }
}
