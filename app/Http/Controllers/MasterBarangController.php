<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterBarangModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MasterBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //proses ambil data dari mysql
        $barang = MasterBarangModel::all();
        return view('master/barang/index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('master/barang/form-tambah');
    }

    public function store(Request $request)
    {
        $aturan =[
            'html_kode' => 'required|min:3|max:7|alpha_dash',
            'html_nama' => 'required|min:10|max:25',
            'html_deskripsi' => 'max:255',
        ];
        //membuat pesan bhs indonesia
        $pesan_indo = [
            'required' => 'Wajib di isi Bos!',
            'min' => 'Minimal :min Karakter',
        ];
        $validator = validator::make($request->all(), $aturan, $pesan_indo);
        try {
            // jika inputan user tidak sesuai dengan aturan validasi
            if ($validator->fails()) {
                return redirect()
                ->route('master-barang-tambah')
                ->withErrors($validator)->withInput();
            } else {
                // jika inputan user sesuai
                //simpan ke database
                $insert = MasterBarangModel::create([
                    'kode'              => $request->html_kode,
                    'nama'              => $request->html_nama,
                    'deskripsi'         => $request->html_deskripsi,
                    'id_kategori'       => null,
                    'id_gudang'         => null,
                    'dibuat_kapan'      => date('Y-m-d H:i:s'),
                    'dibuat_oleh'       => Auth::user()->id,
                    'diperbarui_kapan'  => null,
                    'diperbarui_oleh'   => null,
                ]);
            // jika proses insert berhasil 
            if ($insert) {
                return redirect()
                ->route('master-barang')
                ->with('success', 'Berhasil menambahkan barang baru!');
            }
            }
       
        } catch(\Throwable $th) {
            return redirect()
            ->route('master-barang-tambah')
            ->with('danger', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
