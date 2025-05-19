<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de Países</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Listado de Países') }}
          </h2>
      </x-slot>

      <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 text-gray-900">
                      <a href="{{ route('paises.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add</a>
                      <div class="mt-4">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">Code</th>
                                      <th scope="col">País</th>
                                      <th scope="col">Capital</th>
                                      <th scope="col">Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($paises as $p)
                                  <tr>
                                      <th scope="row">{{ $p->pais_codi }}</th>
                                      <td>{{ $p->pais_nomb }}</td>
                                      <td>{{ $p->pais_capi }}</td>
                                      <td>
                                          <a href="{{ route('paises.edit', ['pais' => $p->pais_codi]) }}" class="btn btn-warning">Edit</a>
                                          <form action="{{ route('paises.destroy', ['pais' => $p->pais_codi]) }}" method="POST" style="display: inline-block;">
                                              @method('DELETE')
                                              @csrf
                                              <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('¿Estás seguro de eliminar este país?')">
                                          </form>
                                      </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </x-app-layout>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>