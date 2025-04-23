<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use Mpdf\Mpdf;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::paginate(12);
        return view('clientes.index', [
            'clientes' => $clientes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposDocumento = TipoDocumento::all();
        return view('clientes.create', [
            'tiposDocumento' => $tiposDocumento,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'numero_documento' => 'required|string|max:20|unique:clientes',
            'razon_social' => 'required|string|max:200',
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
        $tiposDocumento = TipoDocumento::all();
        return view('clientes.edit', [
            'cliente' => $cliente,
            'tiposDocumento' => $tiposDocumento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'numero_documento' => 'required|string|max:20|unique:clientes,numero_documento,' . $cliente->id,
            'razon_social' => 'required|string|max:200',
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
            ->with('success', 'Cliente eliminado correctamente.');
    }

    /**
     * Export clients list to PDF.
     */
    public function pdf()
    {
  
        $clientes = Cliente::all();
        $html = view('clientes.pdf', compact('clientes'))->render();
        
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'margin_footer' => '3',
        ]);

        $mpdf->SetTitle('Lista de Clientes');
        $mpdf->SetAuthor('Mi App');
        $mpdf->SetCreator('Mi App');
        $mpdf->WriteHTML($html);
        
        return $mpdf->Output('lista_clientes.pdf', 'I');
    }
}
