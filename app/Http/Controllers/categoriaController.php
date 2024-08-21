<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaracteristicaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\Caracteristica;
use App\Models\Categoria;
use Exception;
use Illuminate\Support\Facades\DB;

class categoriaController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-categoria|crear-categoria|editar-categoria|eliminar-categoria', ['only' => ['index']]);
        $this->middleware('permission:crear-categoria', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-categoria', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-categoria', ['only' => ['destroy']]);
    }


    public function index()
    {
        $categorias = Categoria::with('caracteristica')->latest()->get();

        return view('categoria.index', ['categorias' => $categorias]);
    }

    public function create()
    {
        return view('categoria.create');
    }


    public function store(StoreCaracteristicaRequest $request)
    {
        try {
            DB::beginTransaction();
            $caracteristica = Caracteristica::create($request->validated());
            $caracteristica->categoria()->create([
                'caracteristica_id' => $caracteristica->id
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('categorias.index')->with('success', 'Categoría registrada');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(Categoria $categoria)
    {
        return view('categoria.edit', ['categoria' => $categoria]);
    }

    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        Caracteristica::where('id', $categoria->caracteristica->id)
            ->update($request->validated());

        return redirect()->route('categorias.index')->with('success', 'Categoría editada');
    }

    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria Eliminada');
    }
}
