<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Reporte de proyectos</title>
  </head>
  <body>
    <h1>Gobierno de El Salvador</h1>
    <br>
    <h2>Alcaldía Municipal de El Congo</h2>
    <br>

  <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2">{{ __('Nombre del proyecto') }}</th>
                                    <th class="px-4 py-2">{{ __('Fuente de Fondos') }}</th>
                                    <th class="px-4 py-2">{{ __('Monto Planificado') }}</th>
                                    <th class="px-4 py-2">{{ __('Monto Patrocinado') }}</th>
                                    <th class="px-4 py-2">{{ __('Monto Fondos Propios') }}</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @forelse ($proyectos as $proyectos)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $proyectos->nombreProyecto }}</td>
                                        <td class="border px-4 py-2">{{ $proyectos->fuenteFondos }}</td>
                                        <td class="border px-4 py-2">{{ $proyectos->montoPlanificado }}</td>
                                        <td class="border px-4 py-2">{{ $proyectos->montoPatrocinado }}</td>
                                        <td class="border px-4 py-2">{{ $proyectos->montoFondosPropios }}</td>
                                        <td class="border px-7 py-2" style="width: 300px">

                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>

                        </table>


    </body>
</html>
