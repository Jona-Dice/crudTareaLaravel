<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proyectos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <h1 class="text-2xl font-bold">{{ __('Proyectos') }}</h1>
                       <!-- Modificación -->
                       <a href="{{ route('proyectos.report') }}" class="bg-indigo-500 hover:bg-indigo-700 text-blue font-bold py-2 px-4 rounded">PDF</a>
                       <!-- Fin modificación -->
                        <a href="{{ route('proyectos.create') }}" class="bg-indigo-500 hover:bg-indigo-700 text-blue font-bold py-2 px-4 rounded">Crear proyecto</a>
                    </div>
                    <div class="mt-4">
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
                                            <!-- <a href="{{ route('proyectos.show', $proyectos) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Ver') }}</a> -->
                                            <a href="{{ route('proyectos.edit', $proyectos) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Editar') }}</a>
                                            <form action="{{ route('proyectos.destroy', $proyectos) }}" method="POST" class="inline">

                                                @csrf
                                                @method('DELETE')
                                                <br>
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('¿Borrar?');">{{ __('Eliminar') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-red-400 text-black text-center">
                                        <td colspan="5" class="border px-4 py-2">{{ __('No hay proyectos para mostrar') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
