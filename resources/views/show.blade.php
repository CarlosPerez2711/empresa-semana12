@extends('layout')
@section('title', 'Persona | ' . $persona->nPerCodigo)

@section('content')
<style>


.action-buttons {
    display: flex;
    align-items: left;
    gap: 10px;
}

.action-button {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 1.5em;
}

.edit-button {
    color: #fcaa5d;
}

.edit-button:hover {
    color: gold; /* Cambia el color cuando el mouse pasa por encima */
}

.delete-button {
    color: red;
}

.delete-button:hover {
    color: darkred; /* Cambia el color cuando el mouse pasa por encima */
}

.action-button i {
    pointer-events: none; /* Asegura que los iconos no capturen eventos del mouse */
}

.card-img-top {
    width: 500px; /* Ajusta el ancho de la imagen */
    height: auto; /* Mantiene la proporción de la imagen */
    display: block;
    margin: 0 auto; /* Centra la imagen horizontalmente */
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
</style>
@auth
<div class="container">
    <div class="header">
        <table class="table mt-3" style="font-size: 0.9em;">
            <tr>
                <td>
                    <h5>Persona <strong>{{$persona->cPerNombre}} {{$persona->cPerApellido}}</strong></h5>
                </td>
                <td class="text-end">
                    <div class="action-buttons">
                        <a href="{{ route('personas.edit', $persona) }}" class="action-button edit-button" title="Editar">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route('personas.destroy', $persona) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-button delete-button" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @if ($persona->image)
                <tr>
                    <td colspan="2" class="text-center">
                        <img src="/storage/{{ $persona->image }}" class="card-img-top" alt="{{ $persona->cPerNombre }}">
                    </td>
                </tr>
            @else
                <tr>
                    <td colspan="2" class="text-center">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="{{ $persona->cPerNombre }}">
                    </td>
                </tr>
            @endif
            <tr>
                <th>Código:</th>
                <td>{{$persona->nPerCodigo}}</td>
            </tr>
            <tr>
                <th>Apellido:</th>
                <td>{{$persona->cPerApellido}}</td>
            </tr>
            <tr>
                <th>Nombre:</th>
                <td>{{$persona->cPerNombre}}</td>
            </tr>
            <tr>
                <th>Dirección:</th>
                <td>{{$persona->cPerDireccion}}</td>
            </tr>
            <tr>
                <th>Fecha de Nacimiento:</th>
                <td>{{$persona->dPerFecNac}}</td>
            </tr>
            <tr>
                <th>Edad:</th>
                <td>{{$persona->nPerEdad}}</td>
            </tr>
            <tr>
                <th>Sexo:</th>
                <td>{{$persona->cPerSexo == 'Masculino' ? 'Masculino' : 'Femenino' }}</td>
            </tr>
            <tr>
                <th>Sueldo:</th>
                <td>{{number_format($persona->nPerSueldo, 2) }}</td>
            </tr>
            <tr>
                <th>RND:</th>
                <td>{{$persona->cPerRnd }}</td>
            </tr>
            <tr>
                <th>Estado:</th>
                <td>{{ $persona->nPerEstado == 1 ? '1' : '2' }}</td>
            </tr>
            <tr>
                <th>Fecha de Creación:</th>
                <td>{{$persona->created_at->diffForHumans() }}</td>
            </tr>
        </table>
    </div>
@endauth
@endsection




