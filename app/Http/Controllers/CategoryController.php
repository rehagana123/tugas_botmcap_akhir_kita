<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::get();

        return view('category.index', compact('category'));
    }

    public function add(Request $request)
    {
        if (Auth::user()->role_id != 1) {
            return redirect('/category')->with('fail', 'User tidak bisa akses ini!');
        }

        // dd($request);
        $request->validate([
            'nama' => 'required'
        ], [
            'nama.required' => 'Nama harus diisi!'
        ]);
        $category = new Category;
        $category->nama = $request->nama;
        $category->save();

        return redirect('/category')->with('success', 'Category berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (Auth::user()->role_id != 1) {
            return redirect('/category')->with('fail', 'User tidak bisa akses ini!');
        }

        $category = Category::where('id', $id)->first();

        if ($category == null) {
            return redirect('404');
        }

        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required'
        ], [
            'nama.required' => 'Nama harus diisi!'
        ]);

        Category::where('id', $id)->update([
            'nama' => $request['nama']
        ]);

        return redirect('/category')->with('success', 'Category berhasil diubah!');;
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return response()->json(['status' => 'Category Berhasil dihapus!']);
    }
}
