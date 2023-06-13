<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Editar
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{url('/proyectos/'.$proyectos->nombreProyecto)}}" method="POST">
                        {{method_field('patch')}}

                        <div class="mb-4">
                            <label for="nombreProyecto" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Nombre del Proyecto') }}</label>
                            <input type="text" name="nombreProyecto" id="nombreProyecto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('nombreProyecto', $proyectos->nombreProyecto) }}">
                            @error('name')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="fuenteFondos" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Fuente de Fondos') }}</label>
                            <textarea name="fuenteFondos" id="fuenteFondos" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description', $proyectos->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="montoPlanificado" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Monto Planificado') }}</label>
                            <input type="text" name="montoPlanificado" id="montoPlanificado" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('montoPlanificado', $proyectos->montoPlanificado) }}">
                            @error('name')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="montoPatrocinado" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Monto Patrocinado') }}</label>
                            <input type="text" name="montoPatrocinado" id="montoPatrocinado" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('montoPatrocinado', $proyectos->montoPatrocinado) }}">
                            @error('name')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="montoFondosPropios" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Monto de Fondos Propios') }}</label>
                            <input type="text" name="montoFondosPropios" id="montoFondosPropios" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('montoFondosPropios', $proyectos->montoFondosPropios) }}">
                            @error('name')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('proyectos.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">{{ __('Cancelar') }}</a>
                            <input type="submit" value="editar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

