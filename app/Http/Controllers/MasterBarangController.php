<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterBarangModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MasterBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //proses ambil data dari mysql
        $barang = MasterBarangModel::where('status', 1)->get();
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
        //aturan untuk inputan master barang
        $aturan =[
            'html_kode' => 'required|min:3|max:7|alpha_dash|unique:master_barang,kode',
            'html_nama' => 'required|min:10|max:25',
            'html_deskripsi' => 'required|max:255',
        ];
        //membuat pesan bhs indonesia
        $pesan_indo = [
            'required' => 'Wajib di isi Bos!',
            'min' => 'Minimal :min Karakter',
            'unique' => 'Kode Barang tidak boleh sama',
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
                    'kode'              => strtoupper($request->html_kode),
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
    public function show($id)
    {
        
        $barang = DB::select(
            "SELECT
            mba.*,
            u1.name as dibuat_nama, u1.email as dibuat_email,
            u2.name as diperbarui_nama, u2.email as diperbarui_email
            FROM master_barang as mba
            LEFT JOIN users as u1 ON mba.dibuat_oleh = u1.id
            LEFT JOIN users as u2 ON mba.diperbarui_oleh = u2.id
            WHERE mba.id = ?;", 
            [$id] 
        );           
        return view('master/barang/detail', compact('barang'));
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
    public function destroy(string $id_barang)
    {
        try {
            $update = MasterBarangModel::
            where(['id' => $id_barang])
            ->update([
                'status' => 0,
            ]);
                    
            //jika proses update berhasil
            if ($update) {
                return redirect()
                ->route('master-barang')
                ->with('success', 'Berhasil menghapus barang!');
            }
        } 
        catch(\Throwable $th) {
            return redirect()
            ->route('master-barang')
            ->with('danger', $th->getMessage());
        }
    }
}    