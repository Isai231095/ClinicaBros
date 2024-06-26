<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Cita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <form action="{{ route('agenda.update', $agenda->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="title" class="block text-gray-900 dark:text-white">Título</label>
                        <input type="text" id="title" name="title" class="w-full border border-gray-300 dark:border-gray-700 rounded py-2 px-4" value="{{ $agenda->title }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-900 dark:text-white">Descripción</label>
                        <textarea id="description" name="description" class="w-full border border-gray-300 dark:border-gray-700 rounded py-2 px-4">{{ $agenda->description }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="student_id" class="block text-gray-900 dark:text-white">Estudiante</label>
                        <select id="student_id" name="student_id" class="w-full border border-gray-300 dark:border-gray-700 rounded py-2 px-4" required>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}" {{ $agenda->student_id == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="servicio_id" class="block text-gray-900 dark:text-white">Servicio</label>
                        <select id="servicio_id" name="servicio_id" class="w-full border border-gray-300 dark:border-gray-700 rounded py-2 px-4" required>
                            @foreach($servicios as $servicio)
                                <option value="{{ $servicio->id }}" {{ $agenda->servicio_id == $servicio->id ? 'selected' : '' }}>{{ $servicio->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="start_time" class="block text-gray-900 dark:text-white">Hora de Inicio</label>
                        <input type="datetime-local" id="start_time" name="start_time" class="w-full border border-gray-300 dark:border-gray-700 rounded py-2 px-4" value="{{ $agenda->start_time }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="end_time" class="block text-gray-900 dark:text-white">Hora de Fin</label>
                        <input type="datetime-local" id="end_time" name="end_time" class="w-full border border-gray-300 dark:border-gray-700 rounded py-2 px-4" value="{{ $agenda->end_time }}" required>
                    </div>
                    <button type="submit" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
