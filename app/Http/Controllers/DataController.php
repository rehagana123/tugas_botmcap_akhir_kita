<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller

{
    //-------------------CRUD BUKU------------------//
    //CREATE
    public function add()
    {
        if (Auth::user()->role_id != 1) {
            return redirect('/data')->with('fail', 'User tidak bisa akses ini!');
        }

        $category = Category::all();
        return view('book.add', compact('category'));
    }

    public function create(Request $request)
    {
        if (Auth::user()->role_id != 1) {
            return redirect('/data')->with('fail', 'User tidak bisa akses ini!');
        }

        $request->validate(
            [
                'judul_buku' => 'required',
                'kode_buku' => "required|unique:buku",
                'jenis_buku' => 'required',
                'pengarang' => 'required',
                'penerbit' => 'required',
                'tahun' => 'required|integer',
                'jumlah_buku' => 'required|integer',
                'category_id' => 'required',
            ],
            [
                'judul_buku.required' => 'Judul Buku wajib diisi!',
                'kode_buku.required' => 'Kode Buku wajib diisi!',
                'kode_buku.unique' => 'Kode Buku harus beda!',
                'jenis_buku.required' => 'Jenis Buku wajib diisi!',
                'pengarang.required' => 'Pengarang wajib diisi!',
                'penerbit.required' => 'Penerbit wajib diisi!',
                'tahun.required' => 'Tahun wajib diisi!',
                'tahun.integer' => 'Tahun harus berupa angka!',
                'jumlah_buku.required' => 'Jumlah Buku wajib diisi!',
                'jumlah_buku.integer' => 'Jumlah harus berupa angka!',
                'category_id.required' => 'Category Buku wajib diisi!',
            ]
        );

        $buku = new Buku;

        $buku->judul_buku = $request->judul_buku;
        $buku->kode_buku = $request->kode_buku;
        $buku->jenis_buku = $request->jenis_buku;
        $buku->pengarang = $request->pengarang;
        $buku->penerbit = $request->penerbit;
        $buku->tahun = $request->tahun;
        $buku->jumlah_buku = $request->jumlah_buku;
        $buku->category_id = $request->category_id;

        $buku->save();

        return redirect('/data')->with('success', 'Buku berhasil ditambahkan!');
    }

    //READ
    public function read()
    {
        $buku = Buku::get();
        return view('book.index', compact('buku'));
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('book.show', compact('buku'));
    }

    //UPDATE
    public function edit($id)
    {
        if (Auth::user()->role_id != 1) {
            return redirect('/data')->with('fail', 'User tidak bisa akses ini!');
        }

        $data = Buku::findOrFail($id);
        $category = Category::all();

        return view('book.edit', compact('data', 'category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'judul_buku' => 'required',
                'kode_buku' => 'required|unique:buku,kode_buku,' . $id,
                'jenis_buku' => 'required',
                'pengarang' => 'required',
                'penerbit' => 'required',
                'tahun' => 'required|integer',
                'jumlah_buku' => 'required|integer',
                'category_id' => 'required',
            ],
            [
                'judul_buku.required' => 'Judul Buku wajib diisi!',
                'kode_buku.required' => 'Kode Buku wajib diisi!',
                'kode_buku.unique' => 'Kode Buku harus beda!',
                'jenis_buku.required' => 'Jenis Buku wajib diisi!',
                'pengarang.required' => 'Pengarang wajib diisi!',
                'penerbit.required' => 'Penerbit wajib diisi!',
                'tahun.required' => 'Tahun wajib diisi!',
                'tahun.integer' => 'Tahun harus berupa angka!',
                'jumlah_buku.required' => 'Jumlah Buku wajib diisi!',
                'jumlah_buku.integer' => 'Jumlah harus berupa angka!',
                'category_id.required' => 'Category Buku wajib diisi!',
            ]
        );

        Buku::where('id', $id)
            ->update(
                [
                    'judul_buku' => $request->judul_buku,
                    'kode_buku' => $request->kode_buku,
                    'jenis_buku' => $request->jenis_buku,
                    'pengarang' => $request->pengarang,
                    'penerbit' => $request->penerbit,
                    'tahun' => $request->tahun,
                    'jumlah_buku' => $request->jumlah_buku,
                    'category_id' => $request->category_id
                ],
            );
        return redirect('/data')->with('success', 'Buku berhasil diubah!');
    }

    //DELETE
    public function delete($id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return response()->json(['status' => 'Buku Berhasil dihapus!']);
    }
}
