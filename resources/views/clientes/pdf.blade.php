<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lista de Clientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .date {
            text-align: right;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Lista de Clientes</h1>
    </div>
    
    <div class="date">
        Fecha de generación: {{ now()->format('d/m/Y H:i:s') }}
    </div>

    <table>
        <thead>
            <tr>
                <th>Tipo Documento</th>
                <th>Número Documento</th>
                <th>Razón Social</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->tipo_documento->nombre }}</td>
                    <td>{{ $cliente->numero_documento }}</td>
                    <td>{{ $cliente->razon_social }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 