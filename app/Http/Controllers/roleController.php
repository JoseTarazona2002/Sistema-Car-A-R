<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class roleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-role|crear-role|editar-role|eliminar-role', ['only' => ['index']]);
        $this->middleware('permission:crear-role', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-role', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-role', ['only' => ['destroy']]);
    }


    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        $permisos = Permission::all();
        return view('role.create', compact('permisos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required'
        ]);

        try {
            DB::beginTransaction();

            $rol = Role::create(['name' => $request->name]);


            $rol->syncPermissions($request->permission);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }


        return redirect()->route('roles.index')->with('success', 'Rol registrado');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Role $role)
    {
        $permisos = Permission::all();
        return view('role.edit', compact('role', 'permisos'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permission' => 'required'
        ]);

        try {
            DB::beginTransaction();

            Role::where('id', $role->id)
                ->update([
                    'name' => $request->name
                ]);

            $role->syncPermissions($request->permission);

            DB::commit();
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
        }

        return redirect()->route('roles.index')->with('success', 'rol editado');
    }

    public function destroy(string $id)
    {
        Role::where('id', $id)->delete();



        return redirect()->route('roles.index')->with('success', 'rol eliminado');
    }
}
