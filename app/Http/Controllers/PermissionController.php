<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('user-management.permissions.index', compact('permissions'));
    }
    public function create()
    {
        return view('user-management.permissions.create');
    }

    public function store(Request $request)
    {
        if ($request->checked == "on") {
            // get all the basic permissions
            $permissions = [
                'list',
                'create',
                'edit',
                'delete',
                'restore',
                'show',
            ];

            foreach ($permissions as $permission) {
                Permission::updateOrCreate(['name' => $request->name . '_' . $permission]);
            }
        } else {
            Permission::create([
                'name' => $request->name
            ]);
        }

        return redirect()->route('permission.index');
    }
}
