@csrf
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Persona</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Crear nueva Persona</h1>
        <form method="POST" action="/ruta-de-tu-formulario" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="customFile">Seleccione archivo</label>
                <input type="file" class="form-control-file" id="customFile" name="image">
            </div>
            <div class="form-group">
                <label for="cPerApellido">Apellido</label>
                <input type="text" class="form-control" id="cPerApellido" name="cPerApellido" value="{{ old('cPerApellido', $persona->cPerApellido) }}">
            </div>
            <div class="form-group">
                <label for="cPerNombre">Nombre</label>
                <input type="text" class="form-control" id="cPerNombre" name="cPerNombre" value="{{ old('cPerNombre', $persona->cPerNombre) }}">
            </div>
            <div class="form-group">
                <label for="cPerDireccion">Dirección</label>
                <input type="text" class="form-control" id="cPerDireccion" name="cPerDireccion" value="{{ old('cPerDireccion', $persona->cPerDireccion) }}">
            </div>
            <div class="form-group">
                <label for="dPerFecNac">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="dPerFecNac" name="dPerFecNac" value="{{ old('dPerFecNac', $persona->dPerFecNac) }}">
            </div>
            <div class="form-group">
                <label for="nPerEdad">Edad</label>
                <input type="text" class="form-control" id="nPerEdad" name="nPerEdad" value="{{ old('nPerEdad', $persona->nPerEdad) }}">
            </div>
            <div class="form-group">
                <label for="nPerSueldo">Sueldo</label>
                <input type="text" class="form-control" id="nPerSueldo" name="nPerSueldo" value="{{ old('nPerSueldo', $persona->nPerSueldo) }}">
            </div>
            <div class="form-group">
                <label for="cPerRnd">Rnd</label>
                <input type="text" class="form-control" id="cPerRnd" name="cPerRnd" value="{{ old('cPerRnd', $persona->cPerRnd) }}">
            </div>
            <div class="form-group">
                <label for="nPerEstado">Estado de Persona</label>
                <select class="form-control" id="nPerEstado" name="nPerEstado">
                    <option value="1" {{ old('nPerEstado', $persona->nPerEstado) == 1 ? 'selected' : '' }}>1</option>
                    <option value="2" {{ old('nPerEstado', $persona->nPerEstado) == 2 ? 'selected' : '' }}>2</option>
                </select>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">{{$btnText}}</button>
            </div>
        </form>
    </div>
    <!-- Incluir Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

