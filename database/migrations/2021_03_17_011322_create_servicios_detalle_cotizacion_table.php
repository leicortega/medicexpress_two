<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosDetalleCotizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios_detalle_cotizacion', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->enum('estado', [0, 1])->default(1);

            $table->foreignId('detalle_cotizacion_id')
                ->constrained('detalle_cotizacion')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios_detalle_cotizacion');
    }
}
