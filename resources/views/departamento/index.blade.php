<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de Departamentos</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Lista de Departamentos') }}
        </h2>
      </x-slot>
    
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <a href="{{ route('departamentos.create') }}" 
                class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 py-2 rounded ml-2">
                Add
              </a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Departamentos</th>
                    <th scope="col">Pais</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($departamentos as $departamento)
                  <tr>
                    <th scope="row">{{ $departamento->depa_codi }}</th>
                    <td>{{ $departamento->depa_nomb }}</td>
                    <td>{{ $departamento->pais_codi }}</td>
                    <td>
                      <!-- Botón Editar (Amarillo) -->
                      <a href="{{ route('departamentos.edit', ['departamento' => $departamento->depa_codi]) }}" 
                        class="bg-yellow-500 text-white font-bold py-2 px-4 rounded">
                        Edit
                      </a>
                      <!-- Botón Eliminar (Rojo) -->
                      <form action="{{ route('departamentos.destroy', ['departamento' => $departamento->depa_codi]) }}" 
                            method="POST" style="display:inline-block">
                        @method('delete')
                        @csrf
                        <input class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2"
                               type="submit" value="Delete">
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