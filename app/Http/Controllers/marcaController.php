<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaracteristicaRequest;
use App\Http\Requests\UpdateMarcaRequest;
use App\Models\Caracteristica;
use App\Models\Marca;
use Exception;
use Illuminate\Support\Facades\DB;

class marcaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-marca|crear-marca|editar-marca|eliminar-marca', ['only' => ['index']]);
        $this->middleware('permission:crear-marca', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-marca', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-marca', ['only' => ['destroy']]);
    }

    public function index()
    {
        $marcas = Marca::with('caracteristica')->latest()->get();
        return view('marca.index',compact('marcas'));
    }

    public function create()
    {
        return view('marca.create');
    }

    public function store(StoreCaracteristicaRequest $request)
    {
        try {
            DB::beginTransaction();
            $caracteristica = Caracteristica::create($request->validated());
            $caracteristica->marca()->create([
                'caracteristica_id' => $caracteristica->id
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('marcas.index')->with('success', 'Marca registrada');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Marca $marca)
    {
        return view('marca.edit',compact('marca'));
    }

    public function update(UpdateMarcaRequest $request, Marca $marca)
    {
        Caracteristica::where('id', $marca->caracteristica->id)
            ->update($request->validated());

        return redirect()->route('marcas.index')->with('success', 'Marca editada');
    }

    public function destroy(string $id)
    {

        $marca = Marca::find($id);
        $marca->delete();

        return redirect()->route('marcas.index')->with('success', 'Marca Eliminada');
    }
}
