<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route dengan closure (inline function)
Route::get('/', function () {
    return view('welcome');
});

// Route dengan parameter
Route::get('/halo/{nama}', function (string $nama) {
    return "Halo, {$nama}! Selamat datang di praktikum Laravel.";
});

// Route dengan parameter opsional
Route::get('/kampus/{nama?}', function (string $nama = 'Universitas') {
    return "Selamat datang di {$nama}";
});

// Route ke controller methods
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->middleware('log.request');
Route::get('/mahasiswa/create/form', [MahasiswaController::class, 'create']);
Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'show']);

// Route dengan multiple parameter
Route::get('/mahasiswa/{nim}/{nama}', function (string $nim, string $nama) {
    return "NIM: {$nim} | Nama: {$nama}";
});

// Route POST untuk form submission
Route::post('/mahasiswa', function (Request $request) {
    // Untuk sementara, hanya menampilkan data yang dikirim
    return response()->json([
        'message' => 'Data mahasiswa berhasil diterima',
        'data' => [
            'nim' => $request->input('nim'),
            'nama' => $request->input('nama'),
            'jurusan' => $request->input('jurusan')
        ],
    ]);
});
