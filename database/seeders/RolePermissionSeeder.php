<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Créer des permissions
        $permissions = [
            'create-post',
            'edit-post',
            'delete-post',
            'view-post',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Créer des rôles et attribuer des permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(['create-post', 'edit-post', 'delete-post', 'view-post']);

        $editorRole = Role::create(['name' => 'editor']);
        $editorRole->givePermissionTo(['create-post', 'edit-post', 'view-post']);

        $userRole = Role::create(['name' => 'user']);
         $editorRole->givePermissionTo(['create-post', 'edit-post', 'view-post']);
    }
}