<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Method untuk daftar kategori
    public function index()
    {
        $kategori_list = [
            [
                'id' => 1,
                'nama' => 'Programming',
                'deskripsi' => 'Buku pemrograman dan coding',
                'jumlah_buku' => 25
            ],
            [
                'id' => 2,
                'nama' => 'Database',
                'deskripsi' => 'Buku database dan SQL',
                'jumlah_buku' => 18
            ],
            [
                'id' => 3,
                'nama' => 'Jaringan',
                'deskripsi' => 'Buku jaringan komputer',
                'jumlah_buku' => 12
            ],
            [
                'id' => 4,
                'nama' => 'Desain Web',
                'deskripsi' => 'Buku HTML CSS dan UI/UX',
                'jumlah_buku' => 20
            ],
            [
                'id' => 5,
                'nama' => 'Artificial Intelligence',
                'deskripsi' => 'Buku AI dan Machine Learning',
                'jumlah_buku' => 15
            ]
        ];

        return view('kategori.index', compact('kategori_list'));
    }

    // Method detail kategori
    public function show($id)
    {
        $kategori_list = [
            1 => [
                'id' => 1,
                'nama' => 'Programming',
                'deskripsi' => 'Buku pemrograman dan coding',
                'jumlah_buku' => 25
            ],
            2 => [
                'id' => 2,
                'nama' => 'Database',
                'deskripsi' => 'Buku database dan SQL',
                'jumlah_buku' => 18
            ],
            3 => [
                'id' => 3,
                'nama' => 'Jaringan',
                'deskripsi' => 'Buku jaringan komputer',
                'jumlah_buku' => 12
            ],
            4 => [
                'id' => 4,
                'nama' => 'Desain Web',
                'deskripsi' => 'Buku HTML CSS dan UI/UX',
                'jumlah_buku' => 20
            ],
            5 => [
                'id' => 5,
                'nama' => 'Artificial Intelligence',
                'deskripsi' => 'Buku AI dan Machine Learning',
                'jumlah_buku' => 15
            ]
        ];

        // Cek kategori ada atau tidak
        if (!isset($kategori_list[$id])) {
            abort(404, 'Kategori tidak ditemukan');
        }

        $kategori = $kategori_list[$id];

        // Data buku berdasarkan kategori
        $buku_list = [
            [
                'judul' => 'Belajar PHP',
                'pengarang' => 'Budi Raharjo',
                'tahun' => 2023
            ],
            [
                'judul' => 'Laravel Dasar',
                'pengarang' => 'Andi Nugroho',
                'tahun' => 2024
            ],
            [
                'judul' => 'Pemrograman Web Modern',
                'pengarang' => 'Rina Wijaya',
                'tahun' => 2022
            ]
        ];

        return view('kategori.show', compact('kategori', 'buku_list'));
    }

    // Method pencarian kategori
    public function search($keyword)
    {
        $kategori_list = [
            [
                'id' => 1,
                'nama' => 'Programming',
                'deskripsi' => 'Buku pemrograman dan coding',
                'jumlah_buku' => 25
            ],
            [
                'id' => 2,
                'nama' => 'Database',
                'deskripsi' => 'Buku database dan SQL',
                'jumlah_buku' => 18
            ],
            [
                'id' => 3,
                'nama' => 'Jaringan',
                'deskripsi' => 'Buku jaringan komputer',
                'jumlah_buku' => 12
            ],
            [
                'id' => 4,
                'nama' => 'Desain Web',
                'deskripsi' => 'Buku HTML CSS dan UI/UX',
                'jumlah_buku' => 20
            ],
            [
                'id' => 5,
                'nama' => 'Artificial Intelligence',
                'deskripsi' => 'Buku AI dan Machine Learning',
                'jumlah_buku' => 15
            ]
        ];

        // Filter kategori
        $hasil = [];

        foreach ($kategori_list as $kategori) {

            if (
                str_contains(
                    strtolower($kategori['nama']),
                    strtolower($keyword)
                )
            ) {
                $hasil[] = $kategori;
            }
        }

        return view('kategori.search', compact('hasil', 'keyword'));
    }
}