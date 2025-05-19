<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Nuevo Departamento</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Añadir Departamento') }}
          </h2>
      </x-slot>

      <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 text-gray-900">
                      <h1 class="text-2xl font-bold mb-4">Añadir Departamento</h1>
                      <form method="POST" action="{{ route('departamentos.store') }}">
                          @csrf
                          <div class="mb-3">
                              <label for="id" class="form-label">Code</label>
                              <input type="text" class="form-control" id="id" name="id" disabled>
                              <div class="form-text">Departamento Code</div>
                          </div>
                          <div class="mb-3">
                              <label for="name" class="form-label">Departamento</label>
                              <input type="text" class="form-control" id="name" name="name" 
                                     placeholder="Departamento Name" required>
                          </div>
                          <label for="pais">Pais</label>
                          <select class="form-select" id="pais" name="code" required>
                              <option selected disabled value="">Choose one...</option>
                              @foreach ($pais as $p)
                                  <option value="{{ $p->pais_codi }}">{{ $p->pais_nomb }}</option>
                              @endforeach
                          </select>
                          <div class="mt-3">
                              <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                              <a href="{{ route('departamentos.index') }}" class="bg-yellow-500 text-white font-bold py-2 px-4 rounded ml-2">Cancel</a>
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
