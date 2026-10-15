<?php

namespace App\Http\Controllers;

class MahasiswaController extends Controller
{
    // Method untuk menampilkan daftar mahasiswa
    public function index()
    {
        $mahasiswa = [
            ['nim' => '12345', 'nama' => 'Andi', 'jurusan' => 'Teknik Informatika'],
            ['nim' => '12346', 'nama' => 'Budi', 'jurusan' => 'Sistem Informasi'],
            ['nim' => '12347', 'nama' => 'Citra', 'jurusan' => 'Teknik Komputer'],
        ];

        if (! view()->exists('mahasiswa.index')) {
            return response()->json($mahasiswa);
        }

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    // Method untuk menampilkan detail mahasiswa berdasarkan NIM
    public function show(string $nim)
    {
        return "Detail mahasiswa dengan NIM: {$nim}";
    }

    // Method untuk menampilkan form
    public function create()
    {
        return view('mahasiswa.create');
    }
}
