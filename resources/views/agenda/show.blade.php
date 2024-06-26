<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles de la Cita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <div class="mb-4">
                    <strong class="block text-gray-900 dark:text-white">Título:</strong> {{ $agenda->title }}
                </div>
                <div class="mb-4">
                    <strong class="block text-gray-900 dark:text-white">Descripción:</strong> {{ $agenda->description }}
                </div>
                <div class="mb-4">
                    <strong class="block text-gray-900 dark:text-white">Estudiante:</strong> {{ $agenda->student->name }}
                </div>
                <div class="mb-4">
                    <strong class="block text-gray-900 dark:text-white">Servicio:</strong> {{ $agenda->servicio->name }}
                </div>
                <div class="mb-4">
                    <strong class="block text-gray-900 dark:text-white">Hora de Inicio:</strong> {{ $agenda->start_time }}
                </div>
                <div class="mb-4">
                    <strong class="block text-gray-900 dark:text-white">Hora de Fin:</strong> {{ $agenda->end_time }}
                </div>
                <a href="{{ route('agenda.edit', $agenda->id) }}" class="bg-violet-500 dark:bg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 text-white font-bold py-2 px-4 rounded mr-2">Editar</a>
                <form action="{{ route('agenda.destroy', $agenda->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-pink-400 dark:bg-pink-600 hover:bg-pink-500 dark:hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
