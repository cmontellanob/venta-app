<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes= Cliente::with('tipoDocumento')->get();
         return view('clientes.index', [
            'clientes' => $clientes,
         ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create', [
            'tiposDocumentos' => TipoDocumento::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'numero_documento' => 'required|string|max:255',
            'razon_social' => 'required|string|max:255',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        $tiposDocumentos = TipoDocumento::all();
        return view('clientes.edit', [
            'cliente' => $cliente,
            'tiposDocumentos' => $tiposDocumentos,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'numero_documento' => 'required|string|max:255',
            'razon_social' => 'required|string|max:255',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')
            ->with('deleted', 'Cliente eliminado correctamente.');
    }
}
