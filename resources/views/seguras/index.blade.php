@extends('layout.app')
@section('contenido')

<h2>LISTADO DE ZONAS SEGURAS</h2>
<hr style="border:2px solid skyblue">

<a href="{{ route('seguras.create') }}" class="btn btn-success mb-3">
    + Nueva Zona Segura
</a>
&nbsp;&nbsp;
<a href="{{ route('seguras.mapa') }}" class="btn btn-primary mb-3">
    Ver Mapa
</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Radio (m)</th>
            <th>Latitud</th>
            <th>Longitud</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($seguras as $index => $zona)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $zona->nombre }}</td>
                <td>{{ ucfirst(strtolower($zona->tipo)) }}</td>
                <td>{{ $zona->radio }}</td>
                <td>{{ $zona->latitud }}</td>
                <td>{{ $zona->longitud }}</td>
                <td>
                    <a href="{{ route('seguras.edit', $zona->id) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('seguras.destroy', $zona->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar esta zona?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No se han registrado zonas seguras aún.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
