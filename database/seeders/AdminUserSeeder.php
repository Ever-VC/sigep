<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use App\Models\Branch;
use App\Models\ContractType;
use App\Models\Shift;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea la sucursal (branch) 
        $branch = Branch::firstOrCreate([
            'name' => 'Oficina Central',
        ], [
            'address' => 'San Miguel, El Salvador',
        ]);

        // Contrato
        $contractType = ContractType::firstOrCreate([
            'description' => 'Contrato indefinido',
        ], [
            'base_salary' => 408.00,
        ]);

        // Crea el turno del admin
        $shift = Shift::firstOrCreate([
            'description' => 'Turno diurno',
        ], [
            'entry_time' => '08:00:00',
            'exit_time' => '17:00:00',
        ]);

        // Crea el empleado
        $employee = Employee::create([
            'first_name' => 'Administrador',
            'last_name' => 'Principal',
            'dui' => '00000000-0',
            'address' => 'Oficinas Centrales',
            'phone' => '70000000',
            'birth_date' => '1990-01-01',
            'gender' => 'Otro',
            'branch_id' => $branch->id,
            'contract_type_id' => $contractType->id,
            'shift_id' => $shift->id,
        ]);

        // Crea el usuario para acceder al sistema
        $user = User::create([
            'email' => 'admin@dominio.com',
            'password' => Hash::make('admin123'),
            'employee_id' => $employee->id,
        ]);

        // Crear rol administrador
        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
        ]);

        // Crear permisos genéricos para el administrador (se debe hacer un crud de permisos y roles)
        $permissions = [
            'ver usuarios',
            'crear usuarios',
            'editar usuarios',
            'eliminar usuarios',
            'ver empleados',
            'crear empleados',
            'editar empleados',
            'eliminar empleados',
            'ver planillas',
            'generar planillas',
            'ver asistencias',
            'registrar asistencias',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Asignar permisos al rol de administrador
        $adminRole->givePermissionTo(Permission::all());

        // Asignar rol al usuario
        $user->assignRole($adminRole);
    }
}
