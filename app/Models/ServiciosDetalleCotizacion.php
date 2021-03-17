<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosDetalleCotizacion extends Model
{
    use HasFactory;

    protected $table = 'servicios_detalle_cotizacion';

    protected $fillable = [
        'nombre', 'estado', 'detalle_cotizacion_id'
    ];

    /**
     * Get the cotizacion that owns the ServiciosDetalleCotizacion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cotizacion(): BelongsTo
    {
        return $this->belongsTo(DetalleCotizacion::class, 'detalle_cotizacion_id');
    }
}
