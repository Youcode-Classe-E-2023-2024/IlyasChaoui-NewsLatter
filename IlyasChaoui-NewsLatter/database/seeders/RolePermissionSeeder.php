<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve roles
        $adminRole = Role::where('name', 'admin')->first();
        $editorRole = Role::where('name', 'editor')->first();
        $viewerRole = Role::where('name', 'viewer')->first();

        // Retrieve permissions
        $assignRolesPermission = Permission::where('name', 'assign role')->first();
        $deleteTemplatePermission = Permission::where('name', 'delete template')->first();
        $createTemplatesPermission = Permission::where('name', 'create template')->first();
        $sendTemplatesPermission = Permission::where('name', 'send mail')->first();
        $addMediasPermission = Permission::where('name', 'upload file')->first();
        $deleteFilePermission = Permission::where('name', 'delete file')->first();
        $displayOnly = Permission::where('name', 'display only')->first();

        // Assign permissions to admin role
        $adminRole->givePermissionTo([
            $assignRolesPermission,
            $deleteTemplatePermission,
            $createTemplatesPermission,
            $sendTemplatesPermission,
            $addMediasPermission,
            $deleteFilePermission,
        ]);

        // Assign permissions to viewer role
        $viewerRole->givePermissionTo([
            $displayOnly
        ]);

        // Assign permissions to editor role

        $editorRole->givePermissionTo([
            $deleteTemplatePermission,
            $createTemplatesPermission,
            $sendTemplatesPermission,
            $addMediasPermission,
            $deleteFilePermission,
        ]);
    }
}
