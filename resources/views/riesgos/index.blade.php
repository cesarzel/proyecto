@extends('layout.app')
@section('contenido')

<div class="container mt-4">
    <h1 class="mb-4">Listado de Zonas de Riesgo</h1>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('riesgos.create') }}" class="btn btn-primary mb-3">➕ Registrar nueva zona</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ route('riesgos.mapa') }}" class="btn btn-success mb-3">🗺️ Ver Mapa Global</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Nivel de Riesgo</th>
                    <th>Coordenadas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($riesgos as $riesgo)
                    <tr>
                        <td>{{ $riesgo->id }}</td>
                        <td>{{ $riesgo->nombre }}</td>
                        <td>{{ $riesgo->descripcion }}</td>
                        <td class="text-uppercase">
                            <span class="badge bg-{{ $riesgo->nivel_riesgo == 'alto' ? 'danger' : ($riesgo->nivel_riesgo == 'medio' ? 'warning' : 'success') }}">
                                {{ ucfirst($riesgo->nivel_riesgo) }}
                            </span>
                        </td>
                        <td>
                            <small>
                                ({{ $riesgo->latitud1 }}, {{ $riesgo->longitud1 }})<br>
                                ({{ $riesgo->latitud2 }}, {{ $riesgo->longitud2 }})<br>
                                ({{ $riesgo->latitud3 }}, {{ $riesgo->longitud3 }})<br>
                                ({{ $riesgo->latitud4 }}, {{ $riesgo->longitud4 }})
                            </small>
                        </td>
                        <td>
                            <a href="{{ route('riesgos.edit', $riesgo->id) }}" class="btn btn-sm btn-warning">✏️ Editar</a>

                            <form action="{{ route('riesgos.destroy', $riesgo->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Deseas eliminar esta zona de riesgo?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay zonas registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
