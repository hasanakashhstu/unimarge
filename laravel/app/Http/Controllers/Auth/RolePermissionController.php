<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['roles'] = Role::all();

        return view('auth.role_permissions.role_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['permissions'] = Permission::all()->groupBy('group_name');

        return view('auth.role_permissions.role_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'role_name' => 'required|string|unique:roles,name',
            'permissions' => 'required|array',
        ]);

        // create new role
        $role = Role::create([
            'name' => Str::lower($data['role_name']),
        ]);
        // sync permissions
        $role->syncPermissions($data['permissions']);

        return redirect()->route('auth.roles.index')->with('success', 'Role created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        abort_if($role->name == 'super admin', 404);

        $data['role'] = $role;
        $data['permissions'] = Permission::all()->groupBy('group_name');

        return view('auth.role_permissions.role_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        abort_if($role->name == 'super admin', 404);

        $data = $request->validate([
            'role_name' => 'required|string|unique:roles,name,' . $role->id,
            'permissions' => 'required|array',
        ]);

        // update role
        if ($role->name != 'super admin' && $role->name != 'teacher' && $role->name != 'staff' && $role->name == 'parent' && $role->name != 'student') {
            $role->update([
                'name' => Str::lower($data['role_name']),
            ]);
        }

        // sync permissions
        $role->syncPermissions($data['permissions']);

        return redirect()->route('auth.roles.index')->with('success', 'Role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if ($role->name == 'super admin' || $role->name == 'teacher' || $role->name == 'staff' || $role->name == 'parent' || $role->name == 'student') {
            return redirect()->back()->with('error', 'Can not delete this role!');
        }

        $role->delete();

        return redirect()->back()->with('success', 'Role deleted successfully!');
    }
}
