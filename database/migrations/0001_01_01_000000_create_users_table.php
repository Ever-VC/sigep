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
         * TABLE DEFINITIONS FOR THE USER MODULE
         * This migration creates the necessary tables to manage
         * users, employees, branches, contract types, and shifts.
         */

        // TODO: Create roles and permissions table

        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('address')->nullable();
            $table->timestamps();
        });

        Schema::create('contract_types', function (Blueprint $table) {
            $table->id();
            $table->string('description', 100);
            $table->float('base_salary', 8, 2);
            $table->timestamps();
        });

        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->string('description', 100);
            $table->time('entry_time');
            $table->time('exit_time');
            $table->timestamps();
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('dui', 20)->unique();
            $table->string('address')->nullable();
            $table->string('phone', 15)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender', 10)->nullable();
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');
            $table->foreignId('contract_type_id')->constrained('contract_types')->onDelete('cascade');
            $table->foreignId('shift_id')->constrained('shifts')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            // TODO: Add role and permissions fields
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
            $table->timestamps();
        });
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->date('date');
            $table->time('entry_time');
            $table->time('exit_time');
            $table->unique(['employee_id', 'date'], 'unique_attendance');
            $table->timestamps();
        });

        Schema::create('overtimes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->decimal('amount', 8, 2);
            $table->timestamps();
        });

        Schema::create('bonuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('description', 100);
            $table->decimal('amount', 8, 2);
            $table->date('date');
            $table->timestamps();
        });

        Schema::create('loss_deductions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('description', 100);
            $table->decimal('amount', 8, 2);
            $table->date('date');
            $table->unique(['employee_id', 'date', 'description'], 'unique_loss_deduction');
            $table->timestamps();
        });

        Schema::create('advances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->decimal('amount', 8, 2);
            $table->date('date');
            $table->string('description', 100)->nullable();
            $table->unique(['employee_id', 'date'], 'unique_advance');
            $table->timestamps();
        });

        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('total_hours_worked', 8, 2)->default(0);
            $table->decimal('total_overtime_hours', 8, 2)->default(0);
            $table->decimal('total_bonuses', 8, 2)->default(0);
            $table->decimal('total_deductions', 8, 2)->default(0);
            $table->decimal('total_advances', 8, 2)->default(0);
            $table->decimal('gross_salary', 8, 2)->default(0);
            $table->decimal('net_salary', 8, 2)->default(0);
            $table->date('payment_date');
            $table->unique(['employee_id', 'start_date', 'end_date'], 'unique_payroll');
            $table->timestamps();
        });

        Schema::create('tax_obligations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description');
            $table->decimal('percentage', 8, 2);
            $table->timestamps();
        });

        Schema::create('payroll_tax_obligation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payroll_id')->constrained('payrolls')->onDelete('cascade');
            $table->foreignId('tax_obligation_id')->constrained('tax_obligations')->onDelete('cascade');
            $table->decimal('amount', 8, 2);
            $table->unique(['payroll_id', 'tax_obligation_id'], 'unique_payroll_tax_obligation');
            $table->timestamps();
        });

        Schema::create('formulas', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->text('formula');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /**
         * TABLE DELETION
         * This migration drops all the tables created in the 'up' method.
         */
        Schema::dropIfExists('formulas');
        Schema::dropIfExists('payroll_tax_obligation');
        Schema::dropIfExists('tax_obligations');
        Schema::dropIfExists('payrolls');
        Schema::dropIfExists('advances');
        Schema::dropIfExists('loss_deductions');
        Schema::dropIfExists('bonuses');
        Schema::dropIfExists('overtimes');
        Schema::dropIfExists('attendances');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('shifts');
        Schema::dropIfExists('contract_types');
        Schema::dropIfExists('branches');
        // TODO: Drop roles and permissions tables if created
    }
};
