<?php
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AgendaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('students', StudentController::class);
    Route::resource('servicios', ServiciosController::class);
    Route::resource('agendas', AgendaController::class);

});
