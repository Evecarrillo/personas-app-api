<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Añadir Comuna</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Añadir Comuna') }}
          </h2>
      </x-slot>
  
      <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 text-gray-900">
                      <h1 class="text-2xl font-bold mb-4">Añadir Comuna</h1>
                      <form method="POST" action="{{ route('comunas.store') }}"> 
                          @csrf
                          <div class="mb-3">
                              <label for="id" class="form-label">Code</label>
                              <input type="text" class="form-control" id="id" name="id" disabled>
                              <div class="form-text">Commune Code</div>
                          </div>
                          <div class="mb-3">
                              <label for="name" class="form-label">Commune</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Comuna Name" required>
                          </div>
                          <div class="mb-3">
                              <label for="municipality" class="form-label">Municipality</label>
                              <select class="form-select" id="municipality" name="code" required>
                                  <option selected disabled value="">Choose one...</option>
                                  @foreach ($municipios as $municipio)
                                      <option value="{{ $municipio->muni_codi }}">{{ $municipio->muni_nomb}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="mt-3">
                              <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                              <a href="{{ route('comunas.index') }}" class="bg-yellow-500 text-white font-bold py-2 px-4 rounded ml-2">Cancel</a>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </x-app-layout>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>