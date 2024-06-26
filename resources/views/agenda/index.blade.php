<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Citas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">

                    <div class="mb-4">
                        <a href="{{ route('agendas.create') }}" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Agregar Cita</a>
                    </div>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ID</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Título</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Descripción</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Estudiante</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Servicio</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Inicio</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Fin</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agendas as $agenda)
                            <tr>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $agenda->id }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $agenda->title }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $agenda->description }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $agenda->student->name }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $agenda->servicio->name }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $agenda->start_time }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $agenda->end_time }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <div class="flex justify-center">
                                        <a href="{{ route('agendas.show', $agenda->id) }}" class="bg-violet-500 dark:bg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 text-white font-bold py-2 px-4 rounded mr-2">Ver</a>
                                        <a href="{{ route('agendas.edit', $agenda->id) }}" class="bg-violet-500 dark:bg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 text-white font-bold py-2 px-4 rounded mr-2">Editar</a>
                                        <form action="{{ route('agendas.destroy', $agenda->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-pink-400 dark:bg-pink-600 hover:bg-pink-500 dark:hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                                        </form>
                                    </div>
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
