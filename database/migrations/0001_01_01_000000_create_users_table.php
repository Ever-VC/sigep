<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /**
         * DEFINICIÓN DE TABLAS PARA EL MÓDULO DE USUARIOS
         * Esta migración crea las tablas necesarias para gestionar
         * usuarios, empleados, sucursales, tipos de contratos y turnos.
         */

        // FALTA: Crear tabla de roles y permisos

        Schema::create('sucursales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('direccion')->nullable();
        });

        Schema::create('tipo_contratos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 100);
            $table->float('salario_base', 8, 2);
        });

        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 100);
            $table->time('hora_entrada');
            $table->time('hora_salida');
        });

        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->string('dui', 20)->unique();
            $table->string('direccion')->nullable();
            $table->string('telefono', 15)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('genero', 10)->nullable();
            $table->foreignId('sucursal_id')->constrained('sucursales')->onDelete('cascade');
            $table->foreignId('tipo_contrato_id')->constrained('tipo_contratos')->onDelete('cascade');
            $table->foreignId('turno_id')->constrained('turnos')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('contrasenia');
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            //----> FALTA EL ROL Y SUS PERMISOS <------
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados')->onDelete('cascade');
            $table->date('fecha');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->unique(['empleado_id', 'fecha'], 'unique_asistencia'); // Asegura que un empleado no tenga más de una asistencia por día
        });

        Schema::create('horas_extras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados')->onDelete('cascade');
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->decimal('monto', 8, 2); // Se calcula según el tipo de contrato y horas trabajadas
        });

        Schema::create('bonos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados')->onDelete('cascade');
            $table->string('descripcion', 100);
            $table->decimal('monto', 8, 2);
            $table->date('fecha');
        });

        Schema::create('descuentos_por_perdidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados')->onDelete('cascade');
            $table->string('descripcion', 100);
            $table->decimal('monto', 8, 2);
            $table->date('fecha');
            $table->unique(['empleado_id', 'fecha', 'descripcion'], 'unique_descuento_perdida'); // Asegura que no se repita el descuento por la misma pérdida en la misma fecha
        });

        Schema::create('anticipos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados')->onDelete('cascade');
            $table->decimal('monto', 8, 2);
            $table->date('fecha');
            $table->string('descripcion', 100)->nullable();
            $table->unique(['empleado_id', 'fecha'], 'unique_anticipo'); // Asegura que no se repita el anticipo para el mismo empleado en la misma fecha
        });

        Schema::create('planillas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados')->onDelete('cascade');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            /**
             * Los campos siguientes son para almacenar los totales de la planilla
             * y se calcularán automáticamente al generar la planilla, desde la información
             * de asistencias, horas extras, bonos, descuentos y anticipos.
             */
            $table->decimal('total_horas_trabajadas', 8, 2)->default(0);
            $table->decimal('total_horas_extras', 8, 2)->default(0);
            $table->decimal('total_bonos', 8, 2)->default(0);
            $table->decimal('total_descuentos', 8, 2)->default(0);
            $table->decimal('total_anticipos', 8, 2)->default(0);
            $table->decimal('salario_bruto', 8, 2)->default(0);
            $table->decimal('salario_neto', 8, 2)->default(0);
            $table->date('fecha_pago');
            $table->unique(['empleado_id', 'fecha_inicio', 'fecha_fin'], 'unique_planilla'); // Asegura que no se repita la planilla para el mismo empleado en el mismo período
        });

        // Tabla para gestionar las obligaciones tributarias como ISSS, AFP, Renta, etc.
        Schema::create('obligaciones_tributarias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('descripcion');
            $table->decimal('porcentaje', 8, 2);
        });

        /**
         * Tabla pivote para gestionar las relaciones entre planillas y obligaciones tributarias,
         * permitiendo que una planilla pueda tener múltiples obligaciones tributarias
         * y una obligación tributaria pueda aplicarse a múltiples planillas.
         */
        Schema::create('planilla_obligacion_tributaria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('planilla_id')->constrained('planillas')->onDelete('cascade');
            $table->foreignId('obligacion_tributaria_id')->constrained('obligaciones_tributarias')->onDelete('cascade');
            $table->decimal('monto', 8, 2);
            $table->unique(['planilla_id', 'obligacion_tributaria_id'], 'unique_planilla_obligacion'); // Asegura que no se repita la obligación tributaria para la misma planilla
        });

        /**
         * Tabla para gestionar las fórmulas de cálculo de salarios,
         * permitiendo definir fórmulas personalizadas para calcular salarios,
         * horas extras, bonos, descuentos, etc.
         * Esta tabla puede ser utilizada para almacenar fórmulas que se aplican
         * a diferentes tipos de contratos o situaciones específicas o cambios en la legislación laboral.
         */
        Schema::create('formulas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->text('formula');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /**
         * ELIMINACIÓN DE TABLAS
         * Esta migración elimina las tablas creadas en la migración 'up'.
         */
        Schema::dropIfExists('formulas');
        Schema::dropIfExists('planilla_obligacion_tributaria');
        Schema::dropIfExists('obligaciones_tributarias');
        Schema::dropIfExists('planillas');
        Schema::dropIfExists('anticipos');
        Schema::dropIfExists('descuentos_por_perdidas');
        Schema::dropIfExists('bonos');
        Schema::dropIfExists('horas_extras');
        Schema::dropIfExists('asistencias');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('empleados');
        Schema::dropIfExists('turnos');
        Schema::dropIfExists('tipo_contratos');
        Schema::dropIfExists('sucursales');
        // FALTA: Eliminar tablas de roles y permisos si se crean
        // Nota: Asegurarse de eliminar las tablas en el orden correcto para evitar errores de clave foránea
    }
};
