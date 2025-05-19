<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Editar País</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Editar País') }}
          </h2>
      </x-slot>

      <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 text-gray-900">
                      <h1 class="text-2xl font-bold mb-4">Editar País</h1>

                      <form method="POST" action="{{ route('paises.update', ['pais' => $pais->pais_codi]) }}">  
                          @method('PUT')
                          @csrf
                          
                          <div class="mb-3">
                              <label for="id" class="form-label">Código</label>
                              <input type="text" class="form-control" id="id" name="id" value="{{ $pais->pais_codi }}" disabled>
                              <div class="form-text">Código del País</div>
                          </div>

                          <div class="mb-3">
                              <label for="name" class="form-label">Nombre</label>
                              <input type="text" class="form-control" id="name" name="name" value="{{ $pais->pais_nomb }}" required>
                          </div>

                          <div class="mb-3">
                              <label for="capital" class="form-label">Capital</label>
                              <input type="text" class="form-control" id="capital" name="capital" value="{{ $pais->pais_capi }}" required>
                          </div>

                          <div class="mt-3">
                              <button type="submit" class="btn btn-primary">Actualizar</button>
                              <a href="{{ route('paises.index') }}" class="btn btn-warning">Cancelar</a>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </x-app-layout>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
