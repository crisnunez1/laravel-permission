<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        //Users
        Permission::create([
            'name'            => 'users.index',
            'action'          => 'Navegar usuarios',
            'description'     => 'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
            'name'            => 'users.show',
            'action'          => 'Ver detalle de usuario',
            'description'     => 'Ver en detalle cada usuario del sistema',
        ]);
        Permission::create([
            'name'            => 'users.edit',
            'action'          => 'Edición de usuario',
            'description'     => 'Editar cualquier dato de un usuario del sistema',
        ]);
        Permission::create([
            'name'            => 'users.destroy',
            'action'          => 'Eliminar usuarios',
            'description'     => 'Eliminar cualquier usuario del sistema',
        ]);

        //Roles
        Permission::create([
            'name'            => 'roles.index',
            'action'          => 'Navegar roles',
            'description'     => 'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
            'name'            => 'roles.show',
            'action'          => 'Ver detalle de rol',
            'description'     => 'Ver en detalle cada rol del sistema',
        ]);
        Permission::create([
            'name'            => 'roles.create',
            'action'          => 'Creación de roles',
            'description'     => 'Crear cualquier rol del sistema',
        ]);
        Permission::create([
            'name'            => 'roles.edit',
            'action'          => 'Edición de rol',
            'description'     => 'Editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
            'name'            => 'roles.destroy',
            'action'          => 'Eliminar roles',
            'description'     => 'Eliminar cualquier rol del sistema',
        ]);

        //Products
        Permission::create([
            'name'            => 'products.index',
            'action'          => 'Navegar Productos',
            'description'     => 'Lista y navega todos los productos del sistema',
        ]);
        Permission::create([
            'name'            => 'products.show',
            'action'          => 'Ver detalle de producto',
            'description'     => 'Ver en detalle cada producto del sistema',
        ]);
        Permission::create([
            'name'            => 'products.create',
            'action'          => 'Creación productos',
            'description'     => 'Crear cualquier producto en sistema',
        ]);
        Permission::create([
            'name'            => 'products.edit',
            'action'          => 'Edición de producto',
            'description'     => 'Editar cualquier dato de un producto del sistema',
        ]);
        Permission::create([
            'name'            => 'products.destroy',
            'action'          => 'Eliminar productos',
            'description'     => 'Eliminar cualquier producto del sistema',
        ]);


        // create roles and assign created permissions

        // this can be done as separate statements
        // Admin Role
        $admin = Role::create([
            'name' => 'Admin',
            'description' => 'System Administrator'
        ]);

        $admin->givePermissionTo(Permission::all());

        //Guest
        $guest = Role::create([
            'name' => 'Guest',
            'description' => 'User or guest without assigned role'
        ]);

        $guest->givePermissionTo([
            'products.index',
            'products.show'
        ]);

        // User Admin
        $user = User::find(1);
        $user->assignRole('Admin');
    }
}
