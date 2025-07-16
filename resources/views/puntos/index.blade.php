@extends('layout.app')

@section('contenido')
    <div class="container mt-4">
        <h1 class="mb-4">Listado de Puntos</h1>

        {{-- Mensajes de éxito --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('puntos.create') }}" class="btn btn-primary mb-3">➕ Agregar nuevo punto</a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{ url('/puntos/mapa') }}" class="btn btn-success mb-3">Ver Mapa de Puntos</a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Capacidad</th>
                        <th>Responsable</th>
                        <th>Latitud</th>
                        <th>Longitud</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($puntos as $punto)
                        <tr>
                            <td>{{ $punto->id }}</td>
                            <td>{{ $punto->nombre }}</td>
                            <td>{{ $punto->capacidad }}</td>
                            <td>{{ $punto->responsable }}</td>
                            <td>{{ $punto->latitud }}</td>
                            <td>{{ $punto->longitud }}</td>
                            <td>
                                <a href="{{ route('puntos.edit', $punto->id) }}" class="btn btn-sm btn-warning me-1">Editar</a>

                                <form action="{{ route('puntos.destroy', $punto->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este punto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($puntos->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center">No hay puntos registrados.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
