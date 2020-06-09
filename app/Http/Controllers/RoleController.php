<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('roles.index', [
            'roles' => Role::paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Role $role
     * @return Response
     */
    public function create(Role $role)
    {
        return view('roles.create', [
            'role' => $role,
            'permissions' => Permission::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $role->syncPermissions($request->get('permissions'));

        return redirect()->route('roles.index')->with('info', __('Role saved successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @param User $user
     * @return Response
     */
    public function show(Role $role, User $user)
    {
        return view('roles.show', [
            'user' => $user,
            'role' => $role,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit', [
            'role' => $role,
            'permissions' => Permission::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Role $role
     * @return void
     */
    public function update(Request $request, Role $role)
    {
        $role->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $role->syncPermissions($request->get('permissions'));

        return redirect()->route('roles.edit', $role->id)->with('info', __('Role updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return Response
     * @throws Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return back()->with('info', __('Role deleted successfully'));
    }
}
