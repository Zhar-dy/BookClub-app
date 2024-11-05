<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\IsEmpty;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('user-management.roles.index', compact('roles'));
    }

    public function show($id)
    {
        $role = Role::find($id);
        $permissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();
        return view('user-management.roles.show', compact('role', 'permissions'));
    }
    public function create()
    {
        $permissions = Permission::all();
        return view('user-management.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        $permission = $request->permissions;

        if(!Empty($permission))
        {
            $permissionNames = Permission::whereIn('id', $permission)->pluck('name')->toArray();
            $role->syncPermissions($permissionNames);
        } else {
            $role->syncPermissions([]);
        }
        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('user-management.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->update(['name' => $request->name]);
        $permission = $request->permissions;
        if(!empty($permission)) {
            //fetch permission names by IDs
            $permissionNames = Permission::whereIn('id', $permission)->pluck('name')->toArray();
            $role->syncPermissions($permissionNames);
        } else {
            // If no permissions are provided, remove all permissions from the role
            $role->syncPermissions([]);
        }

        return redirect()->route('roles.index');
    }
}
