<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles & permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /*
        |------------------------------------------------------------------
        | PERMISSIONS
        |------------------------------------------------------------------
        */
        $permissions = [
            // User management
            'user.view', 'user.create', 'user.edit', 'user.delete',

            // Product management
            'product.view', 'product.create', 'product.edit', 'product.delete',

            // Transactions
            'transaction.view', 'transaction.create', 'transaction.void',

            // Reports
            'report.view', 'report.export',

            // Settings
            'setting.view', 'setting.edit',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        /*
        |------------------------------------------------------------------
        | ROLES
        |------------------------------------------------------------------
        */

        // Super Admin — akses semua
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin']);
        $superAdmin->syncPermissions(Permission::all());

        // Admin — tidak bisa manage user & settings sensitif
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->syncPermissions([
            'product.view', 'product.create', 'product.edit', 'product.delete',
            'transaction.view', 'transaction.create', 'transaction.void',
            'report.view', 'report.export',
            'setting.view',
        ]);

        // Kasir — hanya transaksi
        $kasir = Role::firstOrCreate(['name' => 'kasir']);
        $kasir->syncPermissions([
            'product.view',
            'transaction.view', 'transaction.create',
        ]);

        /*
        |------------------------------------------------------------------
        | DEFAULT USERS
        |------------------------------------------------------------------
        */
        $users = [
            [
                'name'     => 'Super Admin',
                'email'    => 'superadmin@kasir.test',
                'password' => Hash::make('password'),
                'role'     => 'super_admin',
            ],
            [
                'name'     => 'Admin Toko',
                'email'    => 'admin@kasir.test',
                'password' => Hash::make('password'),
                'role'     => 'admin',
            ],
            [
                'name'     => 'Kasir 1',
                'email'    => 'kasir@kasir.test',
                'password' => Hash::make('password'),
                'role'     => 'kasir',
            ],
        ];

        foreach ($users as $data) {
            $role = $data['role'];
            unset($data['role']);

            $user = User::firstOrCreate(['email' => $data['email']], $data);
            $user->syncRoles([$role]);
        }

        $this->command->info('Roles, permissions, dan default users berhasil dibuat.');
        $this->command->table(
            ['Email', 'Role', 'Password'],
            collect($users)->map(fn ($u, $i) => [
                $u['email'],
                ['super_admin', 'admin', 'kasir'][$i],
                'password',
            ])->toArray()
        );
    }
}
