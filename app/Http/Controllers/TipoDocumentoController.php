<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposDocumento = TipoDocumento::paginate(12);
        return view('tiposdocumento.index', [
            'tiposDocumento' => $tiposDocumento,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tiposdocumento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|unique:tipo_documentos',
            'nombre' => 'required|string|max:255|unique:tipo_documentos',
        ]);

        TipoDocumento::create($request->all());

        return redirect()->route('tiposdocumento.index')
            ->with('success', 'Tipo de documento creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoDocumento $tipoDocumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoDocumento $tipoDocumento)
    {
        return view('tiposdocumento.edit', [
            'tipoDocumento' => $tipoDocumento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoDocumento $tipoDocumento)
    {
        $request->validate([
            'id' => 'required|integer|unique:tipo_documentos,id,' . $tipoDocumento->id,
            'nombre' => 'required|string|max:255|unique:tipo_documentos,nombre,' . $tipoDocumento->id,
        ]);

        $tipoDocumento->update($request->all());

        return redirect()->route('tiposdocumento.index')
            ->with('success', 'Tipo de documento actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoDocumento $tipoDocumento)
    {
        $tipoDocumento->delete();

        return redirect()->route('tiposdocumento.index')
            ->with('success', 'Tipo de documento eliminado correctamente.');
    }
}
